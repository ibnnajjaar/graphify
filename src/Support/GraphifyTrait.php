<?php
namespace Ibnnajjaar\Graphify\Support;

use Spatie\Browsershot\Browsershot;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\InvalidBase64Data;

trait GraphifyTrait
{
    public static function bootGraphifyTrait(): void
    {
        static::created(function (HasGraphify $model){
            $model->generateGraphify();
        });

        static::updated(function (HasGraphify $model) {
            if ($model->isDirty($model->getGraphifyFields()) || empty($model->graphify_image)) {
                $model->generateGraphify();
            }
        });
    }

    public function getGraphifyFields(): array
    {
        if (property_exists($this, 'graphify_fields')) {
            return $this->graphify_fields;
        }

        return [];
    }

    /**
     * @throws FileCannotBeAdded
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     * @throws InvalidBase64Data
     */
    public function generateGraphify(): void
    {
        $view = $this->getGraphifyView();
        $image = Browsershot::html($view)
                            ->windowSize(1200, 630)
                            ->base64Screenshot();

        $this->clearMediaCollection('graphify-image');

        $this->addMediaFromBase64($image)
             ->usingFileName($this->getGraphifyFileName())
             ->toMediaCollection('graphify-image');
    }

    public function getGraphifyView(): View
    {
        $view_path = config('graphify.view_path');
        return view($view_path, [
            'model' => $this
        ]);
    }

    public function getGraphifyFileName(): string
    {
        return $this->slug . '.png';
    }

    public function registerGraphifyMediaCollection(): void
    {
        $this
            ->addMediaCollection('graphify-image')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png',
            ])
            ->singleFile();
    }

    public function graphifyImage(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('graphify-image')
        );
    }
}

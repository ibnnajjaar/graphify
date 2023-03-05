<?php

namespace Ibnnajjaar\Graphify\Support;

use Illuminate\Contracts\View\View;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\InvalidBase64Data;

trait GraphifyTrait
{
    public static function bootGraphifyTrait(): void
    {
        static::created(function (HasGraphify $model) {
            $model->generateGraphify();
        });

        static::updated(function (HasGraphify $model) {
            $image_field = $model->getImageField();
            ray($image_field);
            if ($model->isDirty($model->getGraphifyFields()) || empty($model->{$image_field})) {
                $model->generateGraphify();
            }
        });
    }

    public function getImageField(): string
    {
        return 'og_image_url';
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

        $disk = config('graphify.disk');

        $file_name = Storage::disk($disk)->put($this->getGraphifyFileName(), base64_decode($image));
        $this->og_image_url = $this->getGraphifyFileName();
        $this->save();

        ray($this->graphify_image);
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
            get: function () {
                $file_name = $this->getImageField();
                $disk = config('graphify.disk');
                if (Storage::disk($disk)->exists($this->{$file_name})) {
                    return Storage::disk($disk)->url($this->{$file_name});
                }

                return $this->placeholder_og_image;
            }
        );
    }

    public function placeholderOgImage(): Attribute
    {
        return Attribute::make(
            get: fn () => ''
        );
    }
}

<?php

namespace Ibnnajjaar\Graphify\Support;

use Illuminate\Contracts\View\View;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait GraphifyTrait
{
    public static function bootGraphifyTrait(): void
    {

        if (config('graphify.generate_graphify_on_create')) {
            static::created(function (HasGraphify $model) {
                $model->generateGraphify();
            });
        }

        if (config('graphify.generate_graphify_on_update')) {
            static::updated(function (HasGraphify $model) {
                $og_image_url_field = $model->getOpenGraphImageUrlField();

                if ($model->isDirty($model->getGraphifyFields()) || empty($model->{$og_image_url_field})) {
                    $model->generateGraphify();
                }
            });
        }
    }

    public function getOpenGraphImageUrlField(): string
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

    public function generateGraphify(): void
    {
        $view = $this->getGraphifyView();
        $image = Browsershot::html($view)
                            ->windowSize(1200, 630)
                            ->base64Screenshot();

        $this->saveGraphify($image);
    }

    public function saveGraphify($image): void
    {
        $disk = config('graphify.disk_name');
        $og_image_url_field = $this->getOpenGraphImageUrlField();

        $path = config('graphify.media_prefix') . '/';
        $file_name = $path . $this->getGraphifyFileName();
        Storage::disk($disk)->put($file_name, base64_decode($image));
        $this->{$og_image_url_field} = $this->getGraphifyFileName();
        $this->save();
    }

    public function getGraphifyView(): View
    {
        $view_path = config('graphify.view_path');
        return view($view_path, [
            'model' => $this,
        ]);
    }

    public function getGraphifyFileName(): string
    {
        return $this->slug . '.png';
    }

    public function graphifyImage(): Attribute
    {
        return Attribute::make(
            get: function () {

                $path = config('graphify.media_prefix') . '/';
                $field_name = $this->getOpenGraphImageUrlField();
                $file_name = $path . $this->{$field_name};
                $disk = config('graphify.disk_name');

                if (Storage::disk($disk)->exists($file_name)) {
                    return Storage::disk($disk)->url($file_name);
                }

                return $this->placeholder_og_image;
            }
        );
    }

    public function placeholderOgImage(): Attribute
    {
        return Attribute::make(
            get: fn() => ''
        );
    }
}

<?php

return [

    /*
     * The disk on which to store added files and derived images by default. Choose
     * one of the disks you've configured in config/filesystems.php.
     */
    'disk_name' => env('OG_IMAGE_DISK', 'public'),

    /*
     * The path of the view template file that will
     * be used to generate the open graph image.
     * */
    'view_path' => 'graphify::graphify',

    /*
     * You can specify a prefix for that is used for storing all media. If you set this
     * to `/og-images`, all your media will be stored in a `/og-images` directory.
     */
    'media_prefix' => env('OG_IMAGE_MEDIA_PREFIX', ''),

    /*
     * Determines if a new open graph image will be generated automatically
     * when a new resource is created.
     */
    'generate_graphify_on_create' => true,

    /*
     * Determines if the open graph image will be regenerated automatically
     * when a resource's graphify field is updated.
     */
    'generate_graphify_on_update' => true,
];

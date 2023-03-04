<?php

namespace Ibnnajjaar\Graphify;

use Illuminate\Support\ServiceProvider;

class GraphifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '../config/graphify.php',
            'graphify'
        );
    }
}

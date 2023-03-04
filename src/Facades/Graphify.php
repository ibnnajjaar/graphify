<?php

namespace Ibnnajjaar\Graphify\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ibnnajjaar\Graphify\Graphify
 */
class Graphify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ibnnajjaar\Graphify\Graphify::class;
    }
}

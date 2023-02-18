<?php

namespace HossamMonir\Pioneer\Facades;

use HossamMonir\Pioneer\PioneerServices;
use Illuminate\Support\Facades\Facade;

/**
 * Class Unifonic
 *
 * @mixin \HossamMonir\Pioneer\PioneerServices
 */
class Pioneer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return PioneerServices::class;
    }
}

<?php

namespace Msr\OTP\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Msr\OTP\OTP
 */
class OTP extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Msr\OTP\OTP::class;
    }
}

<?php

namespace Msr\OTP\Generator;

abstract class BaseOTPGenerator
{
    /**
     * generate password for one time password
     *
     * @return $this
     */
    abstract public function generate(): mixed;

    /**
     * number of password chars
     *
     * @return int
     */
    public function digits(): int
    {
        return 6;
    }
}

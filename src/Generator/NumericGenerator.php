<?php

namespace Msr\OTP\Generator;

class NumericGenerator extends BaseOTPGenerator
{
    /**
     * {@inheritDoc}
     *
     * @throws \Exception
     */
    public function generate(): int
    {
        $min = pow(10, $this->digits() - 1);
        $max = pow(10, $this->digits()) - 1;

        return random_int($min, $max);
    }
}

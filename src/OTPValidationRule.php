<?php

namespace Msr\OTP;

use Illuminate\Contracts\Validation\Rule;

class OTPValidationRule implements Rule
{
    private string $otpName;

    public function __construct(string $otpName)
    {
        $this->otpName = $otpName;
    }

    public function passes($attribute, $value): bool
    {
        return OTP::validate($value, $this->otpName);
    }

    public function message()
    {
        // TODO: Implement message() method.
    }
}

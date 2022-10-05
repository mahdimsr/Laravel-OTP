<?php

namespace Msr\OTP;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Lang;

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

    public function message(): string
    {
        return Lang::get('validation.custom.otp');
    }
}

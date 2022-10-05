<?php

use Msr\OTP\Generator\NumericGenerator;
use Msr\OTP\OTP;
use Msr\OTP\OTPValidationRule;

it('check exiting otp passed the validation', function (OTP $otp) {
    $otp->generate(NumericGenerator::class)->save('otp-validation-rule');

    $this->assertTrue((new OTPValidationRule($otp->passwordName()))->passes('otp-code', $otp->generatedPassword()));
})->with('otp');

it('validate not exiting otp', function (OTP $otp) {
    $otp->generate(NumericGenerator::class)->save('otp-not-exiting');

    $this->assertFalse((new OTPValidationRule($otp->passwordName()))->passes('otp-code', '12345'));
})->with('otp');

it('generate otp with expire time', function (OTP $otp) {
    $otp->generate(NumericGenerator::class)->save('feature-otp-expire', 1);

    sleep(2);

    $this->assertFalse((new OTPValidationRule($otp->passwordName()))->passes('otp-code', $otp->generatedPassword()));
})->with('otp');

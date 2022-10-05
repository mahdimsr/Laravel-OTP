<?php


use Msr\OTP\Generator\NumericGenerator;
use Msr\OTP\OTP;
use Msr\OTP\OTPValidationRule;

it('check exiting otp passed the validation', function ()
{
    $otp = new OTP();

    $otp->generate(NumericGenerator::class)->save('otp-validation-rule');

    $this->assertTrue((new OTPValidationRule($otp->passwordName()))->passes('otp-code',$otp->generatedPassword()));
});

it('validate not exiting otp', function ()
{
    $otp = new OTP();

    $otp->generate(NumericGenerator::class)->save('otp-not-exiting');

    $this->assertFalse((new OTPValidationRule($otp->passwordName()))->passes('otp-code','12345'));
});

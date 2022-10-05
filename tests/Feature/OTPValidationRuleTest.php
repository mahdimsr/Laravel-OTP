<?php


use Msr\OTP\OTP;
use Msr\OTP\OTPValidationRule;

it('check exiting otp passed the validation', function ()
{
    $otp = new OTP();

    $otp->generate('123456')->send('0935163029');

    $this->assertTrue((new OTPValidationRule($otp->name()))->passes('otp-code','123456'));
});

it('validate not exiting otp', function ()
{
    $otp = new OTP();

    $otp->generate('123456')->send('09351603029');

    $this->assertFalse((new OTPValidationRule($otp->name()))->passes('otp-code','789'));
});

<?php

use Msr\OTP\Exceptions\PasswordNotGeneratedException;
use Msr\OTP\Generator\NumericGenerator;
use Msr\OTP\OTP;

it('generate otp and assign name to it then get password with its name and compares',function ()
{
    $otp = OTP::generate(NumericGenerator::class)->save('feature-test-otp');

    $this->assertEquals($otp->generatedPassword(),OTP::password('feature-test-otp'));
});

it('try to save not generated password', function ()
{
    $this->expectException(PasswordNotGeneratedException::class);

    OTP::save('expect-error-exception');
});

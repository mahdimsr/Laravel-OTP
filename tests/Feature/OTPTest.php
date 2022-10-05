<?php

use Msr\OTP\Exceptions\PasswordNotGeneratedException;
use Msr\OTP\Generator\NumericGenerator;
use Msr\OTP\OTP;

it('generate otp and assign name to it then get password with its name and compares', function (OTP $otp) {
    $otp->generate(NumericGenerator::class)->save('feature-test-otp');

    $this->assertEquals($otp->generatedPassword(), OTP::password('feature-test-otp'));
})->with('otp');

it('try to save not generated password', function (OTP $otp) {
    $this->expectExceptionMessage((new PasswordNotGeneratedException())->getMessage());

    $otp->save('expect-error-exception');
})->with('otp');

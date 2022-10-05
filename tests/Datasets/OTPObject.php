<?php

use Msr\OTP\OTP;

dataset('otp', [
    fn () => new OTP(),
]);

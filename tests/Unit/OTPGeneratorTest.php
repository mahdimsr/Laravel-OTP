<?php

use Msr\OTP\Generator\NumericGenerator;

it('get number between 100000 and 999999 from numeric generator', function () {
    $numericGenerator = new NumericGenerator();

    $this->assertIsInt($numericGenerator->generate());
    $this->assertLessThanOrEqual(999999, $numericGenerator->generate());
    $this->assertGreaterThanOrEqual(100000, $numericGenerator->generate());
});

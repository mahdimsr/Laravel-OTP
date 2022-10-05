<?php

namespace Msr\OTP;

class OTP
{
    public static function validate($token, $name): bool
    {
        return $token == '123456';
    }

    public function generate(string $token): self
    {
        return $this;
    }

    public function name(): string
    {
        return 'test-name';
    }

    public function send(string $mobile)
    {

    }
}

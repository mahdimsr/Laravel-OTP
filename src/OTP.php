<?php

namespace Msr\OTP;

use Illuminate\Support\Facades\Cache;
use Msr\OTP\Exceptions\PasswordNotGeneratedException;
use Msr\OTP\Generator\BaseOTPGenerator;

class OTP
{
    private static mixed $generatedPassword = null;

    /**
     * generate one time password with passed otp generator
     *
     * @param BaseOTPGenerator $OTPGenerator
     * @return static
     */
    public static function generate(string $OTPGeneratorClassName): self
    {
        $OTPGenerator = new $OTPGeneratorClassName();

        self::$generatedPassword = $OTPGenerator->generate();

        return new self();
    }

    /**
     * save generated password in cache with give name
     *
     * @param string $name
     * @return static
     * @throws \Throwable
     */
    public static function save(string $name): self
    {
        throw_if(self::$generatedPassword == null, new PasswordNotGeneratedException());

        Cache::put($name, self::$generatedPassword);

        return new self();

    }

    /**
     * get one time password from cache with its name
     *
     * @param string $name
     * @return mixed
     */
    public static function password(string $name): mixed
    {
        return Cache::get($name);
    }

    /**
     * get generated password
     *
     * @return mixed
     */
    public function generatedPassword(): mixed
    {
        return self::$generatedPassword;
    }
}

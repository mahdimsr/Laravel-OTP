<?php

namespace Msr\OTP;

use Illuminate\Support\Facades\Cache;
use Msr\OTP\Exceptions\PasswordNotGeneratedException;
use Msr\OTP\Generator\BaseOTPGenerator;

class OTP
{
    private mixed $generatedPassword = null;

    /**
     * generate one time password with passed otp generator
     *
     * @param string $OTPGeneratorClassName
     * @return static
     */
    public function generate(string $OTPGeneratorClassName): self
    {
        $OTPGenerator = new $OTPGeneratorClassName();

        $this->generatedPassword = $OTPGenerator->generate();

        return $this;
    }

    /**
     * save generated password in cache with give name
     *
     * @param string $name
     * @return static
     * @throws \Throwable
     */
    public function save(string $name): self
    {
        throw_if($this->generatedPassword == null, (new PasswordNotGeneratedException())->getMessage());

        Cache::put($name, $this->generatedPassword);

        return $this;
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
        return $this->generatedPassword;
    }
}

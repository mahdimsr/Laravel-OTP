<?php

namespace Msr\OTP\Exceptions;

class PasswordNotGeneratedException extends \Exception
{
    protected $message = 'Password doesnt generated, there isn`t any thing to save';
}

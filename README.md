#  laravel OTP options 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/msr/laravel-otp.svg?style=flat-square)](https://packagist.org/packages/msr/laravel-otp)
[![run-tests](https://github.com/mahdimsr/Laravel-OTP/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/mahdimsr/Laravel-OTP/actions/workflows/run-tests.yml)
[![Fix PHP code style issues](https://github.com/mahdimsr/Laravel-OTP/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/mahdimsr/Laravel-OTP/actions/workflows/fix-php-code-style-issues.yml)

generate OTP and validate it

## Installation

You can install the package via composer:

```bash
composer require msr/laravel-otp
```

## Usage
to generate one time password you should pass a `BaseOTPGenerator` inheritance class:
```php
$otp = new Msr\OTP\OTP();


$otp->generate(Msr\OTP\Generator\NumericGenerator::class);
$otp->save('sth-like-cache-name')

// to get generate password
$otp->generatedPassword();
// to get name that you set for otp
$otp->passwordName();

// to get password with its name
\Msr\OTP\OTP::password('the-name-you-passed-to-save-function-before')
```
### Validation
to validate generated password:
```php
\Msr\OTP\OTP::validate($passwordValue, 'password-name')

// or for validation rule
$request->validate([
    'otp-input-name' => [new \Msr\OTP\OTPValidationRule('password-name')]
])

```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [mohammad mahdi mansouri](https://github.com/mahdimsr)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

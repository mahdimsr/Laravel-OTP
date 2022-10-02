<?php

namespace Msr\OTP;

use Msr\OTP\Commands\OTPCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OTPServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-otp')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-otp_table')
            ->hasCommand(OTPCommand::class);
    }
}

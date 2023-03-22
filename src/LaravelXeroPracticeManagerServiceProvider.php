<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelXeroPracticeManagerServiceProvider extends PackageServiceProvider
{
	public function configurePackage(Package $package): void
	{
		/*
		 * This class is a Package Service Provider
		 *
		 * More info: https://github.com/spatie/laravel-package-tools
		 */
		$package
			->name('laravel-xero-practice-manager')
			->hasConfigFile();
	}
}

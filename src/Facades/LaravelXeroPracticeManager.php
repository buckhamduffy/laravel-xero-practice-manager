<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Facades;

use Illuminate\Support\Facades\Facade;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

/**
 * @see \BuckhamDuffy\LaravelXeroPracticeManager\LaravelXeroPracticeManager
 *
 * @method static XeroPracticeManagerConnector make(string $token, string $tenant_id)
 *
 */
class LaravelXeroPracticeManager extends Facade
{
	protected static function getFacadeAccessor()
	{
		return \BuckhamDuffy\LaravelXeroPracticeManager\LaravelXeroPracticeManager::class;
	}
}

<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager;

class LaravelXeroPracticeManager
{
	public function make(string $token, string $tenant_id): XeroPracticeManagerConnector
	{
		return new XeroPracticeManagerConnector($token, $tenant_id);
	}
}

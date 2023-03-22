<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Support;

use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

abstract class AbstractResource
{
	public function __construct(protected XeroPracticeManagerConnector $connector)
	{
	}
}

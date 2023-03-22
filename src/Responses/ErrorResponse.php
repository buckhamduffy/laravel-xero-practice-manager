<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class ErrorResponse extends AbstractResponse
{
	public ?string $Status = null;
	public ?string $ErrorDescription = null;

	public function getDescription()
	{
		return $this->ErrorDescription ?: '';
	}
}

<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects;

use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class RelatedData extends AbstractResponse
{
	public ?string $UUID = null;
	public ?string $Name = null;

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

	public function getName(): ?string
	{
		return $this->Name;
	}
}

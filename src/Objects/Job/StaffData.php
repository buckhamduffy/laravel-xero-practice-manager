<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job;

use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class StaffData extends AbstractResponse
{
	public ?string $UUID = null;
	public ?string $Name = null;
	public ?string $AllocatedMinutes = null;

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

	public function getName(): ?string
	{
		return $this->Name;
	}

	public function getAllocatedMinutes(): ?string
	{
		return $this->AllocatedMinutes;
	}
}

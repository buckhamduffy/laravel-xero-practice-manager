<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job;

use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class MilestoneData extends AbstractResponse
{
	public ?string $UUID = null;
	public ?string $Date = null;
	public ?string $Description = null;
	public ?bool $Completed = null;

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

	public function getDate(): ?string
	{
		return $this->Date;
	}

	public function getDescription(): ?string
	{
		return $this->Description;
	}

	public function getCompleted(): ?bool
	{
		return $this->Completed;
	}
}

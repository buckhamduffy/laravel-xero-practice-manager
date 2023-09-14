<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job;

use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class CommentData extends AbstractResponse
{
	public ?string $UUID = null;
	public ?string $Text = null;
	public ?string $Date = null;
	public ?string $CreatedBy = null;

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

	public function getText(): ?string
	{
		return $this->Text;
	}

	public function getDate(): ?string
	{
		return $this->Date;
	}

	public function getCreatedBy(): ?string
	{
		return $this->CreatedBy;
	}
}

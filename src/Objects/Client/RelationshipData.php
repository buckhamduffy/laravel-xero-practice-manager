<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client;

use BuckhamDuffy\LaravelXeroPracticeManager\Objects\RelatedData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class RelationshipData extends AbstractResponse
{
	public ?string $UUID = null;
	public ?string $Type = null;
	public ?RelatedData $RelatedClient = null;
	public ?string $NumberOfShares = null;
	public ?string $Percentage = null;
	public ?string $StartDate = null;
	public ?string $EndDate = null;

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

	public function getType(): ?string
	{
		return $this->Type;
	}

	public function getRelatedClient(): ?RelatedData
	{
		return $this->RelatedClient;
	}

	public function getNumberOfShares(): ?string
	{
		return $this->NumberOfShares;
	}

	public function getPercentage(): ?string
	{
		return $this->Percentage;
	}

	public function getStartDate(): ?string
	{
		return $this->StartDate;
	}

	public function getEndDate(): ?string
	{
		return $this->EndDate;
	}
}

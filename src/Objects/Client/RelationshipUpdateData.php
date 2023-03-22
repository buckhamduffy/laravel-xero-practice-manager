<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client;

class RelationshipUpdateData
{
	public function __construct(
		private readonly string $UUID,
		private readonly ?string $StartDate = null,
		private readonly ?string $EndDate = null,
		private readonly ?string $NumberOfShares = null,
		private readonly ?string $Percentage = null,
	) {
	}

	public function getUUID(): string
	{
		return $this->UUID;
	}

	public function getStartDate(): ?string
	{
		return $this->StartDate;
	}

	public function getEndDate(): ?string
	{
		return $this->EndDate;
	}

	public function getNumberOfShares(): ?string
	{
		return $this->NumberOfShares;
	}

	public function getPercentage(): ?string
	{
		return $this->Percentage;
	}
}

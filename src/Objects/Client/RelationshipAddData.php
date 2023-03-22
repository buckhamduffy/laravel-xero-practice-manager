<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client;

use BuckhamDuffy\LaravelXeroPracticeManager\Enums\ClientRelationEnum;

class RelationshipAddData
{
	public function __construct(
		private readonly string $ClientUUID,
		private readonly string $RelatedClientUUID,
		private readonly ClientRelationEnum $Type,
		private readonly ?string $StartDate = null,
		private readonly ?string $EndDate = null,
		private readonly ?string $NumberOfShares = null,
		private readonly ?string $Percentage = null,
	) {
	}

	public function getClientUUID(): string
	{
		return $this->ClientUUID;
	}

	public function getRelatedClientUUID(): string
	{
		return $this->RelatedClientUUID;
	}

	public function getType(): ClientRelationEnum
	{
		return $this->Type;
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

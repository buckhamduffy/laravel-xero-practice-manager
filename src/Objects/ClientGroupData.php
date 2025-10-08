<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects;

use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class ClientGroupData extends AbstractResponse
{
	public static ?string $unwrap = 'Group';
	public string $UUID;
	public string $Name;
	public ?string $Taxable = null;

	/** @var null|array<int, RelatedData> */
	public ?array $Clients = null;

	public function getUuid(): string
	{
		return $this->UUID;
	}
}

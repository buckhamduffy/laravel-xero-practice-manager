<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class ClientGroupData extends AbstractResponse
{
	public static ?string $unwrap = 'Group';

	public string $UUID;
	public string $Name;
	public ?string $Taxable = null;

	#[DataCollectionOf(RelatedData::class)]
	public ?DataCollection $Clients = null;

	public function getUuid(): string
	{
		return $this->UUID;
	}
}

<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class ClientCollectionResponse extends AbstractResponse
{
	/**
	 * @var DataCollection<int, ClientData>
	 */
	#[DataCollectionOf(ClientData::class)]
	public ?DataCollection $Clients;
	public string $Status;

	/**
	 * @return DataCollection<int, ClientData>
	 */
	public function getClients(): DataCollection
	{
		return $this->Clients ?: ClientData::collection([]);
	}

	public function getStatus(): string
	{
		return $this->Status;
	}
}

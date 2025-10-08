<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Illuminate\Support\Collection;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class ClientCollectionResponse extends AbstractResponse
{
	/** @var null|ClientData[] */
	public ?array $Clients = null;

	public string $Status;
	public static array $relations = ['Clients'];

	/**
	 * @return Collection<int, ClientData>
	 */
	public function getClients(): Collection
	{
		return ClientData::collect($this->Clients ?? [], Collection::class);
	}

	public function getStatus(): string
	{
		return $this->Status;
	}
}

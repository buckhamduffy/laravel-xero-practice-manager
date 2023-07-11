<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientData;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientGroupData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class ClientGroupCollectionResponse extends AbstractResponse
{
	/**
	 * @var null|DataCollection<int, ClientGroupData>
	 */
	#[DataCollectionOf(ClientGroupData::class)]
	public ?DataCollection $Groups = null;

	public string $Status;

	public static array $relations = ['Groups'];

	/**
	 * @return DataCollection<int, ClientGroupData>
	 */
	public function getGroups(): DataCollection
	{
		return $this->Groups ?: ClientData::collection([]);
	}

	public function getStatus(): string
	{
		return $this->Status;
	}
}

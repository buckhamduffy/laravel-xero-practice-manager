<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Illuminate\Support\Collection;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientGroupData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class ClientGroupCollectionResponse extends AbstractResponse
{
	/** @var null|ClientGroupData[] */
	public ?array $Groups = null;

	public string $Status;
	public static array $relations = ['Groups'];

	/**
	 * @return Collection<int, ClientGroupData>
	 */
	public function getGroups(): Collection
	{
		return ClientGroupData::collect($this->Groups ?? [], Collection::class);
	}

	public function getStatus(): string
	{
		return $this->Status;
	}
}

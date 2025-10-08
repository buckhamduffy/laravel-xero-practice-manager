<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Illuminate\Support\Collection;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client\ClientCustomFieldData;

class ClientCustomFieldsCollectionResponse extends AbstractResponse
{
	/** @var null|ClientCustomFieldData[] */
	public ?array $CustomFields = null;

	public static array $relations = ['CustomFields'];

	/**
	 * @return Collection<int, ClientCustomFieldData>
	 */
	public function getCustomFields(): Collection
	{
		return ClientCustomFieldData::collect($this->CustomFields ?? [], Collection::class);
	}
}

<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Illuminate\Support\Collection;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\CustomFieldData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class CustomFieldCollectionResponse extends AbstractResponse
{
	/** @var null|CustomFieldData[] */
	public ?array $CustomFieldDefinitions = null;

	public static array $relations = ['CustomFieldDefinitions'];

	/**
	 * @return Collection<int, CustomFieldData>
	 */
	public function getCustomFields(): Collection
	{
		return CustomFieldData::collect($this->CustomFieldDefinitions ?? [], Collection::class);
	}
}

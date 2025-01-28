<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\CustomFieldData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class CustomFieldCollectionResponse extends AbstractResponse
{
	/**
	 * @var null|DataCollection<int, CustomFieldData>
	 */
	#[DataCollectionOf(CustomFieldData::class)]
	public ?DataCollection $CustomFieldDefinitions = null;

	public static array $relations = ['CustomFieldDefinitions'];

	/**
	 * @return DataCollection<int, CustomFieldData>
	 */
	public function getCustomFields(): DataCollection
	{
		return $this->CustomFieldDefinitions ?: CustomFieldData::collection([]);
	}

}

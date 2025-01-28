<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client\ClientCustomFieldData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class ClientCustomFieldsCollectionResponse extends AbstractResponse
{
	/**
	 * @var null|DataCollection<int, ClientCustomFieldData>
	 */
	#[DataCollectionOf(ClientCustomFieldData::class)]
	public ?DataCollection $CustomFields = null;

	public static array $relations = ['CustomFields'];

	/**
	 * @return DataCollection<int, ClientCustomFieldData>
	 */
	public function getCustomFields(): DataCollection
	{
		return $this->CustomFields ?: ClientCustomFieldData::collection([]);
	}

}

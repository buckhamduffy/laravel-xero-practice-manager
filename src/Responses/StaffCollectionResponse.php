<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\StaffData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class StaffCollectionResponse extends AbstractResponse
{
	/**
	 * @var null|DataCollection<int, StaffData>
	 */
	#[DataCollectionOf(StaffData::class)]
	public ?DataCollection $StaffList = null;

	public string $Status;

	public static array $relations = ['StaffList'];

	/**
	 * @return DataCollection<int, StaffData>
	 */
	public function getStaff(): DataCollection
	{
		return $this->StaffList ?: StaffData::collection([]);
	}

	public function getStatus(): string
	{
		return $this->Status;
	}
}

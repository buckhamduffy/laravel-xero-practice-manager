<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\JobData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class JobCollectionResponse extends AbstractResponse
{
	/**
	 * @var null|DataCollection<int, JobData>
	 */
	#[DataCollectionOf(JobData::class)]
	public ?DataCollection $Jobs = null;

	public string $Status;

	public static array $relations = ['Jobs'];

	/**
	 * @return DataCollection<int, JobData>
	 */
	public function getJobs(): DataCollection
	{
		return $this->Jobs ?: JobData::collection([]);
	}

	public function getStatus(): string
	{
		return $this->Status;
	}
}

<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Illuminate\Support\Collection;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\JobData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class JobCollectionResponse extends AbstractResponse
{
	/** @var null|JobData[] */
	public ?array $Jobs = null;

	public string $Status;
	public static array $relations = ['Jobs'];

	/**
	 * @return Collection<int, JobData>
	 */
	public function getJobs(): Collection
	{
		return JobData::collect($this->Jobs ?? [], Collection::class);
	}

	public function getStatus(): string
	{
		return $this->Status;
	}
}

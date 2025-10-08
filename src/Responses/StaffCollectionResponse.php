<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Responses;

use Illuminate\Support\Collection;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\StaffData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class StaffCollectionResponse extends AbstractResponse
{
	/** @var null|array<int, StaffData> */
	public ?array $StaffList = null;

	public string $Status;
	public static array $relations = ['StaffList'];

	/**
	 * @return Collection<int, StaffData>
	 */
	public function getStaff(): Collection
	{
		return StaffData::collect($this->StaffList, Collection::class);
	}

	public function getStatus(): string
	{
		return $this->Status;
	}
}

<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class TaskData extends AbstractResponse
{
	public static array $relations = ['Assigned'];

	public ?string $UUID = null;
	public ?string $TaskUUID = null;
	public ?string $Name = null;
	public ?string $Description = null;
	public ?string $EstimatedMinutes = null;
	public ?string $ActualMinutes = null;
	public ?bool $Completed = null;
	public ?bool $Billable = null;

	public ?string $StartDate = null;
	public ?string $DueDate = null;

	#[DataCollectionOf(StaffData::class)]
	public ?DataCollection $Assigned = null;

	public static function getRelations(): array
	{
		return self::$relations;
	}

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

	public function getTaskUUID(): ?string
	{
		return $this->TaskUUID;
	}

	public function getName(): ?string
	{
		return $this->Name;
	}

	public function getDescription(): ?string
	{
		return $this->Description;
	}

	public function getEstimatedMinutes(): ?string
	{
		return $this->EstimatedMinutes;
	}

	public function getActualMinutes(): ?string
	{
		return $this->ActualMinutes;
	}

	public function getCompleted(): ?bool
	{
		return $this->Completed;
	}

	public function getBillable(): ?bool
	{
		return $this->Billable;
	}

	public function getStartDate(): ?string
	{
		return $this->StartDate;
	}

	public function getDueDate(): ?string
	{
		return $this->DueDate;
	}

	public function getAssigned(): DataCollection
	{
		return $this->Assigned ?: StaffData::collection([]);
	}
}

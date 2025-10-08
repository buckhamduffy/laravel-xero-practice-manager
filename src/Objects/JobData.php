<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects;

use Illuminate\Support\Collection;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job\NoteData;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job\TaskData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job\MilestoneData;

class JobData extends AbstractResponse
{
	public static ?string $unwrap = 'Job';
	public static array $relations = ['Assigned', 'Tasks', 'Milestones'];
	public ?string $UUID = null;
	public ?string $ID = null;
	public ?string $Name = null;
	public ?string $Description = null;
	public ?string $State = null;
	public ?string $ClientOrderNumber = null;
	public ?string $Budget = null;
	public ?string $Type = null;
	public ?string $StartDate = null;
	public ?string $DueDate = null;
	public ?string $CompletedDate = null;
	public ?RelatedData $Client = null;
	public ?RelatedData $Contact = null;
	public ?RelatedData $Manager = null;
	public ?RelatedData $Partner = null;

	/** @var null|RelatedData[] */
	public ?array $Assigned = null;

	/** @var null|TaskData[] */
	public ?array $Tasks = null;

	/** @var null|MilestoneData[] */
	public ?array $Milestones = null;

	/** @var null|NoteData[] */
	public ?array $Notes = null;

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

	public function getID(): ?string
	{
		return $this->ID;
	}

	public function getName(): ?string
	{
		return $this->Name;
	}

	public function getDescription(): ?string
	{
		return $this->Description;
	}

	public function getState(): ?string
	{
		return $this->State;
	}

	public function getClientOrderNumber(): ?string
	{
		return $this->ClientOrderNumber;
	}

	public function getBudget(): ?string
	{
		return $this->Budget;
	}

	public function getType(): ?string
	{
		return $this->Type;
	}

	public function getStartDate(): ?string
	{
		return $this->StartDate;
	}

	public function getDueDate(): ?string
	{
		return $this->DueDate;
	}

	public function getCompletedDate(): ?string
	{
		return $this->CompletedDate;
	}

	public function getClient(): ?RelatedData
	{
		return $this->Client;
	}

	public function getContact(): ?RelatedData
	{
		return $this->Contact;
	}

	public function getManager(): ?RelatedData
	{
		return $this->Manager;
	}

	public function getPartner(): ?RelatedData
	{
		return $this->Partner;
	}

	/**
	 * @return Collection<int, RelatedData>
	 */
	public function getAssigned(): Collection
	{
		return RelatedData::collect($this->Assigned ?? [], Collection::class);
	}

	/**
	 * @return Collection<int, TaskData>
	 */
	public function getTasks(): Collection
	{
		return TaskData::collect($this->Tasks ?? [], Collection::class);
	}

	/**
	 * @return Collection<int, MilestoneData>
	 */
	public function getMilestones(): Collection
	{
		return MilestoneData::collect($this->Milestones ?? [], Collection::class);
	}

	/**
	 * @return Collection<int, NoteData>
	 */
	public function getNotes(): Collection
	{
		return NoteData::collect($this->Notes ?? [], Collection::class);
	}
}

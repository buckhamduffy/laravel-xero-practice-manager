<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job\NoteData;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job\TaskData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job\MilestoneData;

class JobData extends AbstractResponse
{
	public static ?string $unwrap = 'Job';

	public static array $relations = ['Assigned', 'Tasks', 'Milestones'];

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

	#[DataCollectionOf(RelatedData::class)]
	public ?DataCollection $Assigned = null;

	#[DataCollectionOf(TaskData::class)]
	public ?DataCollection $Tasks = null;

	#[DataCollectionOf(MilestoneData::class)]
	public ?DataCollection $Milestones = null;

	#[DataCollectionOf(NoteData::class)]
	public ?DataCollection $Notes = null;

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

	public function getAssigned(): ?DataCollection
	{
		return $this->Assigned;
	}

	public function getTasks(): ?DataCollection
	{
		return $this->Tasks;
	}

	public function getMilestones(): ?DataCollection
	{
		return $this->Milestones;
	}

	public function getNotes(): ?DataCollection
	{
		return $this->Notes;
	}
}

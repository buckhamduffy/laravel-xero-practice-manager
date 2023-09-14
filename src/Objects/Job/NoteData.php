<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class NoteData extends AbstractResponse
{
	public static array $relations = ['Comments'];

	public ?string $UUID = null;
	public ?string $Title = null;
	public ?string $Text = null;
	public ?string $Date = null;
	public ?string $CreatedBy = null;

	#[DataCollectionOf(CommentData::class)]
	public ?DataCollection $Comments = null;

	public static function getRelations(): array
	{
		return self::$relations;
	}

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

	public function getTitle(): ?string
	{
		return $this->Title;
	}

	public function getText(): ?string
	{
		return $this->Text;
	}

	public function getDate(): ?string
	{
		return $this->Date;
	}

	public function getCreatedBy(): ?string
	{
		return $this->CreatedBy;
	}

	public function getComments(): DataCollection
	{
		return $this->Comments ?: CommentData::collection([]);
	}
}

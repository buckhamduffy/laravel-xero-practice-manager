<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects\Job;

use Illuminate\Support\Collection;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class NoteData extends AbstractResponse
{
	public static array $relations = ['Comments'];
	public ?string $UUID = null;
	public ?string $Title = null;
	public ?string $Text = null;
	public ?string $Date = null;
	public ?string $CreatedBy = null;

	/** @var null|CommentData[] */
	public ?array $Comments = null;

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

	/**
	 * @return Collection<int, CommentData>
	 */
	public function getComments(): Collection
	{
		return CommentData::collect($this->Comments ?? [], Collection::class);
	}
}

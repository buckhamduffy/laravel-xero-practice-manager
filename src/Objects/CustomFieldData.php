<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects;

use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class CustomFieldData extends AbstractResponse
{

    public ?string $UUID = null;
    public ?string $Name = null;
    public ?string $Type = null;
    public ?string $LinkUrl = null;
    public ?string $Options = null;
    public ?bool $UseClient = null;
    public ?bool $UseContact = null;
    public ?bool $UseJob = null;
    public ?bool $UseJobTask = null;
    public ?bool $UseJobCost = null;
    public ?bool $UseJobTime = null;
    public ?string $ValueElement = null;

    public function getUUID(): ?string
    {
        return $this->UUID;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function getLinkUrl(): ?string
    {
        return $this->LinkUrl;
    }

    public function getOptions(): ?string
    {
        return $this->Options;
    }

    public function getUseClient(): ?bool
    {
        return $this->UseClient;
    }

    public function getUseContact(): ?bool
    {
        return $this->UseContact;
    }

    public function getUseJob(): ?bool
    {
        return $this->UseJob;
    }

    public function getUseJobTask(): ?bool
    {
        return $this->UseJobTask;
    }

    public function getUseJobCost(): ?bool
    {
        return $this->UseJobCost;
    }

    public function getUseJobTime(): ?bool
    {
        return $this->UseJobTime;
    }

    public function getValueElement(): ?string
    {
        return $this->ValueElement;
    }
}

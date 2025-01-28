<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client;

use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;

class ClientCustomFieldData extends AbstractResponse
{

	public ?string $UUID = null;
    public ?string $Name = null;

    public ?string $Text = null;
    public ?string $Date = null;
    public ?string $Number = null;
    public ?string $Decimal = null;
    public ?bool $Boolean = null;

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function getDate(): ?string
    {
        return $this->Date;
    }

    public function getNumber(): ?string
    {
        return $this->Number;
    }

    public function getDecimal(): ?string
    {
        return $this->Decimal;
    }

    public function getBoolean(): ?bool
    {
        return $this->Boolean;
    }

}

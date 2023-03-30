<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects;

use Spatie\LaravelData\Data;

class StaffData extends Data
{
	public ?string $UUID = null;
	public ?string $Name = null;
	public ?string $Email = null;
	public ?string $Mobile = null;
	public ?string $Phone = null;
	public ?string $Address = null;
	public ?string $PayrollCode = null;

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

	public function getName(): ?string
	{
		return $this->Name;
	}

	public function getEmail(): ?string
	{
		return $this->Email;
	}

	public function getMobile(): ?string
	{
		return $this->Mobile;
	}

	public function getPhone(): ?string
	{
		return $this->Phone;
	}

	public function getAddress(): ?string
	{
		return $this->Address;
	}

	public function getPayrollCode(): ?string
	{
		return $this->PayrollCode;
	}
}

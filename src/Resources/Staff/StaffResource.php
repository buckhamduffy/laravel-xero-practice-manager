<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Staff;

use BuckhamDuffy\LaravelXeroPracticeManager\Objects\StaffData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResource;

class StaffResource extends AbstractResource
{
	public function list(): StaffListRequest
	{
		return new StaffListRequest($this->connector);
	}

	public function get(string $uuid): StaffGetResource
	{
		return new StaffGetResource($this->connector, $uuid);
	}

	public function delete(string $uuid): StaffDeleteResource
	{
		return new StaffDeleteResource($this->connector, $uuid);
	}

	public function enable(string $uuid): StaffEnableResource
	{
		return new StaffEnableResource($this->connector, $uuid);
	}

	public function disable(string $uuid): StaffDisableResource
	{
		return new StaffDisableResource($this->connector, $uuid);
	}

	public function create(StaffData $staffData): StaffCreateResource
	{
		return new StaffCreateResource($this->connector, $staffData);
	}

	public function update(StaffData $staffData): StaffUpdateResource
	{
		return new StaffUpdateResource($this->connector, $staffData);
	}

	public function forgottenPassword(string $uuid): StaffForgottenPasswordResource
	{
		return new StaffForgottenPasswordResource($this->connector, $uuid);
	}
}

<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Staff;

use Saloon\Enums\Method;
use Illuminate\Support\Arr;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\StaffData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class StaffCreateResource extends AbstractRequest
{
	protected Method $method = Method::POST;

	public function __construct(XeroPracticeManagerConnector $connector, private readonly StaffData $staffData)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/staff.api/add';
	}

	protected function defaultBody(): ?string
	{
		return $this->xmlResponse(
			Arr::except($this->staffData->toArray(), ['UUID']),
			'Staff'
		);
	}
}

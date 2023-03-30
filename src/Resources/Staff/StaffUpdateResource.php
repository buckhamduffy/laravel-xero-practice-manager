<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Staff;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\StaffData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class StaffUpdateResource extends AbstractRequest
{
	protected Method $method = Method::PUT;

	public function __construct(XeroPracticeManagerConnector $connector, private readonly StaffData $staffData)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/staff.api/update';
	}

	protected function defaultBody(): ?string
	{
		return $this->xmlResponse(
			$this->staffData->toArray(),
			'Staff'
		);
	}
}

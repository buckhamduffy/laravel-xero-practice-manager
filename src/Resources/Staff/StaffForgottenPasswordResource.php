<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Staff;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\StaffData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class StaffForgottenPasswordResource extends AbstractRequest
{
	protected Method $method = Method::POST;
	protected ?string $responseModel = StaffData::class;

	public function __construct(XeroPracticeManagerConnector $connector, private readonly string $uuid)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/staff.api/forgottenpassword';
	}

	protected function defaultBody(): ?string
	{
		return $this->xmlResponse(
			['UUID' => $this->uuid],
			'Staff'
		);
	}
}

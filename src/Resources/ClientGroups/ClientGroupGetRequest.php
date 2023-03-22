<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\ClientGroups;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientGroupData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class ClientGroupGetRequest extends AbstractRequest
{
	protected Method $method = Method::GET;
	protected ?string $responseModel = ClientGroupData::class;

	public function __construct(XeroPracticeManagerConnector $connector, private string $uuid)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/clientgroup.api/get/' . $this->uuid;
	}
}

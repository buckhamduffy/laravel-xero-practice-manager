<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use Saloon\Enums\Method;
use Illuminate\Support\Arr;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class ClientUpdateRequest extends AbstractRequest
{
	protected Method $method = Method::PUT;

	protected ?string $responseModel = ClientData::class;

	public function __construct(XeroPracticeManagerConnector $connector, private readonly ClientData $clientData)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/client.api/update';
	}

	protected function defaultBody(): ?string
	{
		return $this->xmlResponse(
			Arr::whereNotNull($this->clientData->toArray()),
			'Client'
		);
	}
}

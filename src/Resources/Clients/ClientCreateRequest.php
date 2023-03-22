<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use Saloon\Enums\Method;
use Illuminate\Support\Arr;
use Spatie\ArrayToXml\ArrayToXml;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class ClientCreateRequest extends AbstractRequest
{
	protected Method $method = Method::POST;
	protected ?string $responseModel = ClientData::class;

	public function __construct(XeroPracticeManagerConnector $connector, private ClientData $clientData)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/client.api/add';
	}

	protected function defaultBody(): ?string
	{
		return ArrayToXml::convert(
			Arr::whereNotNull($this->clientData->toArray()),
			'Client'
		);
	}
}

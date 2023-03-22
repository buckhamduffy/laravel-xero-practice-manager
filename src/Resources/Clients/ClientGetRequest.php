<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class ClientGetRequest extends AbstractRequest
{
	protected Method $method = Method::GET;

	protected ?string $responseModel = ClientData::class;

	public function __construct(XeroPracticeManagerConnector $connector, private string $xeroId)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/client.api/get/' . $this->xeroId;
	}
}

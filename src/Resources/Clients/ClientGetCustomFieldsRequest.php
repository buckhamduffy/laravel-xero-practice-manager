<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\ClientCustomFieldsCollectionResponse;

class ClientGetCustomFieldsRequest extends AbstractRequest
{
	protected Method $method = Method::GET;
	protected ?string $responseModel = ClientCustomFieldsCollectionResponse::class;

	public function __construct(XeroPracticeManagerConnector $connector, private readonly string $xeroId)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/client.api/get/' . $this->xeroId . '/customfield';
	}
}

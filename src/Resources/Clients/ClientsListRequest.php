<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\ClientCollectionResponse;

class ClientsListRequest extends AbstractRequest
{
	protected Method $method = Method::GET;
	protected ?string $responseModel = ClientCollectionResponse::class;
	protected string $collectionKey = 'Clients';

	public function resolveEndpoint(): string
	{
		return '/client.api/list';
	}
}

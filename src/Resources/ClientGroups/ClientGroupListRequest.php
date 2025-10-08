<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\ClientGroups;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\ClientGroupCollectionResponse;

class ClientGroupListRequest extends AbstractRequest
{
	protected Method $method = Method::GET;
	protected ?string $responseModel = ClientGroupCollectionResponse::class;
	protected string $collectionKey = 'Groups';

	public function __construct(XeroPracticeManagerConnector $connector)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/clientgroup.api/list';
	}
}

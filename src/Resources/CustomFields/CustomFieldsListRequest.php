<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\CustomFields;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\CustomFieldCollectionResponse;

class CustomFieldsListRequest extends AbstractRequest
{
	protected Method $method = Method::GET;
	protected ?string $responseModel = CustomFieldCollectionResponse::class;
	protected string $collectionKey = 'CustomFieldDefinitions';

	public function __construct(
		XeroPracticeManagerConnector $connector,
	) {
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/customfield.api/definition';
	}

	protected function defaultQuery(): array
	{
		return [];
	}
}

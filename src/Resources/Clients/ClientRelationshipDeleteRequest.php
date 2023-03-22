<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;

class ClientRelationshipDeleteRequest extends AbstractRequest
{
	protected Method $method = Method::POST;

	public function __construct(\BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector $connector, private string $uuid)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/client.api/updaterelationship';
	}

	protected function defaultBody(): ?string
	{
		return $this->xmlResponse(
			[
				'UUID' => $this->uuid
			],
			'Relationship'
		);
	}
}

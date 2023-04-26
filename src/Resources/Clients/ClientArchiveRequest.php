<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class ClientArchiveRequest extends AbstractRequest
{
	protected Method $method = Method::PUT;

	public function __construct(XeroPracticeManagerConnector $connector, private readonly string $uuid)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/client.api/archive';
	}

	protected function defaultBody(): ?string
	{
		return $this->xmlResponse(
			[
				'UUID' => $this->uuid
			],
			'Client'
		);
	}
}

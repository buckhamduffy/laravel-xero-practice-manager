<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\ClientGroups;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientGroupData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class ClientGroupCreateRequest extends AbstractRequest
{
	protected Method $method = Method::POST;
	protected ?string $responseModel = ClientGroupData::class;

	public function __construct(XeroPracticeManagerConnector $connector, private readonly string $name, private readonly string $clientUuid)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/clientgroup.api/add';
	}

	protected function defaultBody(): ?string
	{
		return $this->xmlResponse(
			[
				'Name'       => $this->name,
				'ClientUUID' => $this->clientUuid,
			],
			'Group'
		);
	}
}

<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client\RelationshipUpdateData;

class ClientRelationshipUpdateRequest extends AbstractRequest
{
	public Method $method = Method::PUT;

	public function __construct(XeroPracticeManagerConnector $connector, private readonly RelationshipUpdateData $payload)
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
				'UUID'           => $this->payload->getUUID(),
				'StartDate'      => $this->payload->getStartDate(),
				'EndDate'        => $this->payload->getEndDate(),
				'NumberOfShares' => $this->payload->getNumberOfShares() ?: '0',
				'Percentage'     => $this->payload->getPercentage() ?: '0',
			],
			'Relationship'
		);
	}
}

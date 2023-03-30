<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client\RelationshipAddData;

class ClientRelationshipAddRequest extends AbstractRequest
{
	public Method $method = Method::POST;

	public function __construct(XeroPracticeManagerConnector $connector, private readonly RelationshipAddData $payload)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/client.api/addrelationship';
	}

	protected function defaultBody(): ?string
	{
		return $this->xmlResponse(
			[
				'ClientUUID'        => $this->payload->getClientUUID(),
				'RelatedClientUUID' => $this->payload->getRelatedClientUUID(),
				'Type'              => $this->payload->getType()->value,
				'StartDate'         => $this->payload->getStartDate(),
				'EndDate'           => $this->payload->getEndDate(),
				'NumberOfShares'    => $this->payload->getNumberOfShares() ?: '0',
				'Percentage'        => $this->payload->getPercentage() ?: '0',
			],
			'Relationship'
		);
	}
}

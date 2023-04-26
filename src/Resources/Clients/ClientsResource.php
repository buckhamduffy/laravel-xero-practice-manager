<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResource;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client\RelationshipAddData;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client\RelationshipUpdateData;

class ClientsResource extends AbstractResource
{
	public function list(bool $detailed = false): ClientsListRequest
	{
		return new ClientsListRequest($this->connector);
	}

	public function search(): ClientsSearchRequest
	{
		return new ClientsSearchRequest($this->connector);
	}

	public function save(ClientData $clientData): ClientCreateRequest|ClientUpdateRequest
	{
		if ($clientData->getUUID()) {
			return new ClientUpdateRequest($this->connector, $clientData);
		}

		return new ClientCreateRequest($this->connector, $clientData);
	}

	public function find(string $xeroId): ClientGetRequest
	{
		return new ClientGetRequest($this->connector, $xeroId);
	}

	public function addRelationship(RelationshipAddData $request): ClientRelationshipAddRequest
	{
		return new ClientRelationshipAddRequest($this->connector, $request);
	}

	public function deleteRelationship(string $uuid): ClientRelationshipDeleteRequest
	{
		return new ClientRelationshipDeleteRequest($this->connector, $uuid);
	}

	public function updateRelationship(RelationshipUpdateData $request): ClientRelationshipUpdateRequest
	{
		return new ClientRelationshipUpdateRequest($this->connector, $request);
	}

	public function archive(string $uuid): ClientArchiveRequest
	{
		return new ClientArchiveRequest($this->connector, $uuid);
	}
}

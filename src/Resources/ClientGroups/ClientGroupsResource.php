<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\ClientGroups;

use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResource;

class ClientGroupsResource extends AbstractResource
{
	public function find(string $uuid): ClientGroupGetRequest
	{
		return new ClientGroupGetRequest($this->connector, $uuid);
	}

	public function updateMembers(string $groupUuid, array $add = [], array $remove = []): ClientGroupUpdateMembersRequest
	{
		return new ClientGroupUpdateMembersRequest($this->connector, $groupUuid, $add, $remove);
	}

	public function create(string $name, string $clientUuid): ClientGroupCreateRequest
	{
		return new ClientGroupCreateRequest($this->connector, $name, $clientUuid);
	}
}

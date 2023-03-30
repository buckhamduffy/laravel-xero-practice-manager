<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager;

use Saloon\Http\Connector;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\Staff\StaffResource;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients\ClientsResource;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\ClientGroups\ClientGroupsResource;

class XeroPracticeManagerConnector extends Connector
{
	public function __construct(private string $token, private string $tenantId)
	{
		$this->withTokenAuth($this->token);
	}

	public function resolveBaseUrl(): string
	{
		return 'https://api.xero.com/practicemanager/3.1/';
	}

	protected function defaultHeaders(): array
	{
		return [
			'Accept'         => 'application/xml',
			'Xero-tenant-id' => $this->tenantId
		];
	}

	public function clients(): ClientsResource
	{
		return new ClientsResource($this);
	}

	public function clientGroups(): ClientGroupsResource
	{
		return new ClientGroupsResource($this);
	}

	public function staff(): StaffResource
	{
		return new StaffResource($this);
	}
}

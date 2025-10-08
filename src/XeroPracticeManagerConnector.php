<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager;

use Saloon\Http\Response;
use Saloon\Http\Connector;
use Saloon\RateLimitPlugin\Limit;
use Illuminate\Support\Facades\Cache;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\RateLimitPlugin\Traits\HasRateLimits;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Stores\LaravelCacheStore;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\Jobs\JobsResource;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\Staff\StaffResource;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients\ClientsResource;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\ClientGroups\ClientGroupsResource;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\CustomFields\CustomFieldsResource;

class XeroPracticeManagerConnector extends Connector
{
	use HasRateLimits;

	private string $version = '3.1';

	public function __construct(private string $token, private string $tenantId)
	{
		$this->authenticate(new TokenAuthenticator($this->token));
		$this->rateLimitingEnabled = (bool) config('xero-practice-manager.rate_limit.enable');
	}

	public function resolveBaseUrl(): string
	{
		return \sprintf('https://api.xero.com/practicemanager/%s/', $this->version);
	}

	protected function defaultHeaders(): array
	{
		return [
			'Accept'         => 'application/xml',
			'Xero-tenant-id' => $this->tenantId,
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

	public function jobs(): JobsResource
	{
		return new JobsResource($this);
	}

	public function customFields(): CustomFieldsResource
	{
		return new CustomFieldsResource($this);
	}

	public function withVersion(string $version): self
	{
		$this->version = $version;

		return $this;
	}

	protected function resolveLimits(): array
	{
		return [];
	}

	protected function resolveRateLimitStore(): RateLimitStore
	{
		return new LaravelCacheStore(
			Cache::store(
				config('xero-practice-manager.rate_limit.cache_driver', 'array')
			)
		);
	}

	protected function handleTooManyAttempts(Response $response, Limit $limit): void
	{
		if ($response->status() !== 429) {
			return;
		}

		$limit->exceeded(
			releaseInSeconds: (int) $response->header('Retry-After')
		);

		$type = $response->header('X-Rate-Limit-Problem');

		if ($type) {
			$limit->name($type . '_limit_exceeded');
		}
	}
}

<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager;

use Saloon\Http\Response;
use Saloon\Http\Connector;
use Saloon\RateLimitPlugin\Limit;
use Illuminate\Support\Facades\Cache;
use Saloon\RateLimitPlugin\Traits\HasRateLimits;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Stores\LaravelCacheStore;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\Staff\StaffResource;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients\ClientsResource;
use BuckhamDuffy\LaravelXeroPracticeManager\Resources\ClientGroups\ClientGroupsResource;

class XeroPracticeManagerConnector extends Connector
{
	use HasRateLimits;

	public function __construct(private string $token, private string $tenantId)
	{
		$this->withTokenAuth($this->token);
		$this->rateLimitingEnabled = (bool) config('xero-practice-manager.rate_limit.enable');
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

<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Support;

use Saloon\Http\Request;
use Spatie\ArrayToXml\ArrayToXml;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasXmlBody;
use Illuminate\Support\Facades\Cache;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

/**
 * @template T
 */
abstract class AbstractRequest extends Request implements Cacheable, HasBody
{
	use HasCaching;
	use HasXmlBody;

	/**
	 * @var null|class-string<T>
	 */
	protected ?string $responseModel = null;

	public function __construct(protected XeroPracticeManagerConnector $connector)
	{
		if (!\config('xero-practice-manager.cache')) {
			$this->disableCaching();
		}
	}

	public function send(): Response
	{
		return new Response(
			$this->connector->send($this),
			$this->responseModel
		);
	}

	public function resolveCacheDriver(): Driver
	{
		return new LaravelCacheDriver(Cache::store());
	}

	public function cacheExpiryInSeconds(): int
	{
		return 60 * 15;
	}

	protected function xmlResponse(array $payload, string $root)
	{
		return (new ArrayToXml($payload, $root))
			->dropXmlDeclaration()
			->toXml();
	}
}

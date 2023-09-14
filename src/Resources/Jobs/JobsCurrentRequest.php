<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Jobs;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\JobCollectionResponse;

class JobsCurrentRequest extends AbstractRequest
{
	protected Method $method = Method::GET;

	protected ?string $responseModel = JobCollectionResponse::class;
	protected string $collectionKey = 'Jobs';

	public function __construct(
		XeroPracticeManagerConnector $connector,
		private bool $detailed = false
	) {
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/job.api/current';
	}

	protected function defaultQuery(): array
	{
		return [
			'detailed' => $this->detailed ? 'true' : 'false',
		];
	}
}

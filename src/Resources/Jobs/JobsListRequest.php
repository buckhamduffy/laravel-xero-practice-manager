<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Jobs;

use Saloon\Enums\Method;
use Illuminate\Support\Carbon;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\JobCollectionResponse;

class JobsListRequest extends AbstractRequest
{
	protected Method $method = Method::GET;
	protected ?string $responseModel = JobCollectionResponse::class;
	protected string $collectionKey = 'Jobs';

	public function __construct(
		XeroPracticeManagerConnector $connector,
		private Carbon $from,
		private Carbon $to,
		private bool $detailed = false
	) {
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/job.api/list';
	}

	protected function defaultQuery(): array
	{
		return [
			'from'     => $this->from->format('Ymd'),
			'to'       => $this->to->format('Ymd'),
			'detailed' => $this->detailed ? 'true' : 'false',
		];
	}
}

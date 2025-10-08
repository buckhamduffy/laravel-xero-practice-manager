<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Clients;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\ClientCollectionResponse;

class ClientsSearchRequest extends AbstractRequest
{
	protected Method $method = Method::GET;
	private array $where = [];
	protected ?string $responseModel = ClientCollectionResponse::class;

	public function resolveEndpoint(): string
	{
		return '/client.api/search';
	}

	public function where(string $key, mixed $value)
	{
		$this->where = [
			'key'   => $key,
			'value' => $value,
		];

		return $this;
	}

	/**
	 * @return array{query: mixed}
	 */
	protected function defaultQuery(): array
	{
		$query = '';

		if ($this->where) {
			$query = $this->where['value'];
		}

		return [
			'query' => $query,
		];
	}
}

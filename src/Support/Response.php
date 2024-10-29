<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Support;

use Saloon\Http\Response as SaloonResponse;
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\ErrorResponse;

/**
 * @template T
 */
class Response extends SaloonResponse
{
	/**
	 * @param null|class-string<T> $responseModel
	 */
	public function __construct(SaloonResponse $response, private readonly ?string $responseModel = null)
	{
		parent::__construct(
			$response->getPsrResponse(),
			$response->getPendingRequest(),
			$response->getPsrRequest(),
			$response->getSenderException()
		);
	}

	/**
	 * @return null|ErrorResponse|T
	 */
	public function getDto(): mixed
	{
		if ($this->status() > 302) {
			return null;
		}

		if ($this->hasError()) {
			return ErrorResponse::from($this->body());
		}

		return $this->responseModel::from($this->body());
	}

	public function successful(): bool
	{
		if ($this->status() >= 200 && $this->status() < 300) {
			if (((string) $this->xml()->Status) === 'OK') {
				return true;
			}

			return !$this->hasError();
		}

		return false;
	}

	public function hasError(): bool
	{
		return ((string) $this->xml()->Status) === 'ERROR';
	}

	public function getError(): ErrorResponse
	{
		return ErrorResponse::from($this->body());
	}
}

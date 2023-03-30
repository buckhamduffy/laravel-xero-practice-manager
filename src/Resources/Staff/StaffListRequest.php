<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Staff;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\StaffCollectionResponse;

class StaffListRequest extends AbstractRequest
{
	protected Method $method = Method::GET;

	protected ?string $responseModel = StaffCollectionResponse::class;
	protected string $collectionKey = 'StaffList';

	public function resolveEndpoint(): string
	{
		return '/staff.api/list';
	}
}

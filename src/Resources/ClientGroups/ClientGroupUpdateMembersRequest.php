<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\ClientGroups;

use Saloon\Enums\Method;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientGroupData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class ClientGroupUpdateMembersRequest extends AbstractRequest
{
	protected Method $method = Method::PUT;
	protected ?string $responseModel = ClientGroupData::class;

	public function __construct(
		XeroPracticeManagerConnector $connector,
		private readonly string $groupUuid,
		private readonly array $add = [],
		private readonly array $remove = []
	) {
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/clientgroup.api/members';
	}

	protected function defaultBody(): ?string
	{
		$array = [
			'UUID' => $this->groupUuid
		];

		foreach ($this->add as $key => $value) {
			$array['__custom:add:' . $key] = ['_attributes' => ['uuid' => $value]];
		}

		foreach ($this->remove as $key => $value) {
			$array['__custom:remove:' . $key] = ['_attributes' => ['uuid' => $value]];
		}

		return $this->xmlResponse($array, 'Group');
	}
}

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
		private string $groupUuid,
		private array $add = [],
		private array $remove = []
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

		return \Spatie\ArrayToXml\ArrayToXml::convert($array, 'Group');
	}
}

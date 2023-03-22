<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\ClientGroups;

use Saloon\Enums\Method;
use Spatie\ArrayToXml\ArrayToXml;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\ClientGroupData;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractRequest;
use BuckhamDuffy\LaravelXeroPracticeManager\XeroPracticeManagerConnector;

class ClientGroupCreateRequest extends AbstractRequest
{
	protected Method $method = Method::POST;
	protected ?string $responseModel = ClientGroupData::class;

	public function __construct(XeroPracticeManagerConnector $connector, private string $name)
	{
		parent::__construct($connector);
	}

	public function resolveEndpoint(): string
	{
		return '/clientgroup.api/add';
	}

	protected function defaultBody(): ?string
	{
		return ArrayToXml::convert([
			'Name' => $this->name,
		], 'Group');
	}
}

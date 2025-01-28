<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\CustomFields;

use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResource;

class CustomFieldsResource extends AbstractResource
{
	public function list(): CustomFieldsListRequest
	{
		return new CustomFieldsListRequest($this->connector);
	}
}

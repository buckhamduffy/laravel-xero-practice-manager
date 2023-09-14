<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Resources\Jobs;

use Illuminate\Support\Carbon;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResource;

class JobsResource extends AbstractResource
{
	public function current(bool $detailed = false): JobsCurrentRequest
	{
		return new JobsCurrentRequest($this->connector, $detailed);
	}

	public function list(Carbon $from, Carbon $to, bool $detailed = false): JobsListRequest
	{
		return new JobsListRequest($this->connector, $from, $to, $detailed);
	}
}

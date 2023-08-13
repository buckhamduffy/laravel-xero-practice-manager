<?php

// config for BuckhamDuffy/laravel-xero-practice-manager
return [
	'cache'      => false,
	'rate_limit' => [
		'enable'       => true,
		'cache_driver' => config('cache.default')
	]
];

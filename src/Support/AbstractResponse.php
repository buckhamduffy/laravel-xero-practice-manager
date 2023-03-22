<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Support;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

abstract class AbstractResponse extends Data
{
	public string $xml = '';
	public static ?string $unwrap = null;
	public static array $relations = [];

	public static function from(mixed ...$payloads): static
	{
		$payload = $payloads[0] ?? null;

		if (!is_string($payload)) {
			return parent::from(...$payloads);
		}

		$data = simplexml_load_string($payload);
		$data = json_decode(json_encode($data), true);

		if (static::$unwrap) {
			$data = $data[static::$unwrap];
		}

		foreach (static::$relations as $key) {
			if (is_array($data[$key]) && count($data[$key]) === 1) {
				$data[$key] = Arr::first($data[$key]);
			}
		}

		$data = array_filter($data, function($item): bool {
			if (is_array($item)) {
				return $item !== [];
			}

			return true;
		});

		$data['xml'] = $payload;

		return static::from($data);
	}
}

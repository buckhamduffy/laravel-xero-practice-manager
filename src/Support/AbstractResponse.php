<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Support;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

abstract class AbstractResponse extends Data
{
	public string $xml = '';
	public static ?string $unwrap = null;
	public static array $relations = [];

	public static function from(mixed ...$payloads): static
	{
		$payload = count($payloads) === 1 ? Arr::first($payloads) : $payloads;

		if (!is_string($payload)) {
			return parent::from($payloads);
		}

		if (!Str::startsWith($payload, ['<?xml', '<Resp'])) {
			return parent::from($payloads);
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

		return parent::from($data);
	}
}

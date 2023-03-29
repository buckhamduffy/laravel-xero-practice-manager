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

		if (is_array($payload)) {
			$payload = array_filter($payload, function($item): bool {
				if (is_array($item)) {
					return $item !== [];
				}

				return true;
			});

			return parent::from($payload);
		}

		if (!is_string($payload)) {
			return parent::from(...$payloads);
		}

		if (!Str::startsWith($payload, ['<?xml', '<Resp'])) {
			return parent::from(...$payloads);
		}

		$data = simplexml_load_string($payload);
		$data = json_decode(json_encode($data), true);

		if (static::$unwrap) {
			$data = $data[static::$unwrap];
		}

		$isAssocArray = function(array $array) {
			foreach ($array as $value) {
				if (!is_array($value)) {
					return false;
				}
			}

			return true;
		};

		foreach (static::$relations as $key) {
			if (array_key_exists($key, $data) && count($data[$key]) === 1) {
				$relation = Arr::first($data[$key]);
				$data[$key] = $isAssocArray($relation) ? array_values($relation) : [$relation];
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

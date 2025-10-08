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
		$payload = \count($payloads) === 1 ? Arr::first($payloads) : $payloads;

		if (\is_array($payload)) {
			$payload = self::cleanValues($payload);

			return parent::from($payload);
		}

		if (!\is_string($payload)) {
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

		foreach (static::$relations as $key) {
			if (\array_key_exists($key, $data) && \count($data[$key]) === 1) {
				$relation = Arr::first($data[$key]);
				$data[$key] = static::isAssoc($relation) ? array_values($relation) : [$relation];
			}
		}

		$data = self::cleanValues($data);

		$data['xml'] = $payload;

		return parent::from($data);
	}

	protected static function cleanValues(array $data): array
	{
		return array_map(function($item): mixed {
			if (\is_array($item)) {
				if (\count($item) > 0) {
					return static::cleanValues($item);
				}

				return null;
			}

			return $item;
		}, $data);
	}

	protected static function isAssoc(array $array): bool
	{
		foreach ($array as $value) {
			if (!\is_array($value)) {
				return false;
			}
		}

		return true;
	}

	protected static function isList(array $array): bool
	{
		$keys = array_keys($array);

		return array_keys($keys) !== $keys;
	}
}

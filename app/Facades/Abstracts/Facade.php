<?php

namespace App\Facades\Abstracts;

abstract class Facade
{
	protected static $container;

	protected static $resolve;

	public static function __callStatic($method, $args)
	{
		$instance = static::getFacadeInstance();

		return $instance->$method(...$args);
	}

	public static function getFacadeInstance()
	{
		$accessor = static::getFacadeAccessor();

		if ($resolved = static::$resolve[$accessor]) {
			return $resolved;
		}

		return static::$resolve[$accessor] = static::$container[$accessor];
	}

	public static function setContainer($container)
	{
		static::$container = $container;
	}
}
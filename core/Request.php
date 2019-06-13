<?php

namespace Hyh\Core;

class Request
{
	private static $request = null;

	
	public static function init(...$params)
	{
		echo "Request"."<br>";
		if (!self::$request instanceof self) {
			self::$request = new self();
		}
	}
}
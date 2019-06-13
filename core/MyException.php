<?php

namespace Hyh\Core;

class MyException extends \Exception
{
	public function __construct($m, $c)
	{
		parent::__construct($m, $c);
		echo 1111111111111111111111111111111111111;
	}
}
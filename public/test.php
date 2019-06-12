<?php

class A
{
	public static function testA(...$a)
	{
		echo "TestA";
		Core::br();
		print_r($a);
		Core::br();
		Core::br();
	}
}

class B
{
	public static function testB(...$b)
	{
		echo "TestB";
		Core::br();
		print_r($b);
		Core::br();
	}
}

class C
{
	public static $instance = null;
	private function __construct()
	{
		echo "Single C";;
		Core::br();
	}

	public static function getInstance()
	{
		if (!self::$instance instanceof self) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function testC(...$params)
	{
		echo "testC";
		Core::br();
		print_r($params);
		Core::br();
	}
}

class D
{
	public function testD(...$d)
	{
		echo "TestD";
		Core::br();
		print_r($d);
		Core::br();
		Core::br();
	}
}
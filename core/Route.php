<?php

namespace Hyh\Core;

class Route
{	
	private static $routing;
	private $app;
	private $model;
	private $fun;

	private function __construct(){}

	public static function init()
	{
		if (!self::$routing) {
			self::$routing = new self();
		}

		self::$routing->setRouting();
	}

	private function setRouting()
	{
		$this->app = $_GET['app'] ?? '';
		$this->model = $_GET['model'] ?? '';
		$this->fun = $_GET['action'] ?? '';
	}

	public static function getApp()
	{
		return self::$routing->app;
	}
	
	public static function getModel()
	{
		return self::$routing->model;
	}

	public static function getAction()
	{
		return self::$routing->fun;
	}
}
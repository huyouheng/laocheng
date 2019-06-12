<?php

class Core
{
	const _OBJECT = 1;
	const _STATIC = 2;
	const _SINGLE = 3;

	protected static $actList = [];

	public static function br()
	{
		echo "<br/>";
	}

	public static function listen():bool
	{
		if (count(self::$actList) > 0) {
			return true;
		}
		return false;
	}

	/**
	*
	*/
	public static function push($className, $function, $params = [], $type)
	{
		self::$actList[] = [$className, $function, $params, $type];
	}

	public function unshift($className, $function, $params = [], $type)
	{
		array_unshift(self::$actList, [$className, $function, $params, $type]);
	}

	public static function doAction()
	{
		$arr = array_shift(self::$actList);
		$className = $arr[0];
		$function = $arr[1];
		$params= $arr[2];
		$type = $arr[3];
		if ($type == self::_STATIC) {
			call_user_func_array([$className, $function], $params);
		} elseif ($type == self::_OBJECT) {
			$className = new $className();
			call_user_func_array([$className, $function], $params);
		} elseif ($type == self::_SINGLE) {
			$className = $className::getInstance();
			call_user_func_array([$className, $function], $params);
		}
	}

	public static function run()
	{
		while(self::listen()){
			self::doAction();
		}
	}
}
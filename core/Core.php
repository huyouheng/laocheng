<?php

namespace Hyh\Core;

class Core
{
	const _OBJECT = 1;
	const _STATIC = 2;
	const _SINGLE = 3;
	const _NOTHING = 4;

	public static $config = [];

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
	public static function push($className, $function = 'init', $params = [], $type = self::_OBJECT)
	{
		self::$actList[] = [$className, $function, $params, $type];
	}

	public function unshift($className, $function = 'init', $params = [], $type = slef::_OBJECT)
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
		include BASE_PATH.DS.'core'.DS.$className.'.php';
		
		$className = '\Hyh\Core\\'.$className;

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

	public static function clear()
	{
		self::$actList = [];
	}

	public static function run()
	{
		while(self::listen()){
			self::doAction();
		}
	}

	public static function config($params)
	{
		$data = explode('.', $params);
		$file = $data[0] ?? null;

		if (!$file) {
			throw new Exception("Error File Config", 1);
		} 
		$fileName = BASE_PATH.DS.'config'.DS.$file.'.php';
		if (!file_exists($fileName)) {
			throw new \Exception("$file Config Not Exists!", 404);
		}
		$fileContent = include $fileName;

		if (!array_key_exists($file, self::$config)) {
			self::$config[$file] = $fileContent;
		}

		array_shift($data);

		return self::handleConfig($data, self::$config[$file]);
	}

	private static function handleConfig($key, $data)
	{
		static $result = '';
		if  (!$key || !is_array($data)) {
			return '';
		}		
		foreach ($key as $k => $value) {
			if (is_array($data) && array_key_exists($value, $data)) {
				array_shift($key);
				$data = $data[$value];
				$result = $data;
				self::handleConfig($key, $data);
			} else {
				if (!array_key_exists($value, $data)) {
					$result = '';
					break;
				}
			}
		}
		return $result;
	}


}
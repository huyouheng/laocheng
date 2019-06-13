<?php

namespace Hyh\Core;

class Action
{
	public static function init()
	{
		echo "Action<br>";
		$app = Route::getApp();
		$model = Route::getModel();
		$action = Route::getAction();

		include APP_PATH.DS.$app.DS.'Controller'.DS.$model.'.php';
		$className = '\\'.$model;

		$obj = new $className();
		$obj->$action();

	}
}
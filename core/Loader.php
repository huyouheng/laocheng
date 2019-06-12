<?php

//

class Loader
{
	public static function init(...$params)
	{
		echo 'Loader'."<br>";
		print_r($params);
		Core::br();
		Core::br();
	}
}
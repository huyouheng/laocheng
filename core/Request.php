<?php

class Request
{
	public function init(...$params)
	{
		echo "Request"."<br>";
		print_r($params);
		Core::br();
		Core::br();
	}
}
<?php

define('BASE_PATH', dirname(__DIR__));

include BASE_PATH.'/core/Core.php';
include BASE_PATH.'/core/Loader.php';
include BASE_PATH.'/core/Request.php';





Core::push('Loader', 'init', ['Loader init'], Core::_STATIC);
Core::push('Request', 'init', ['Request init'], Core::_OBJECT);


Core::run();

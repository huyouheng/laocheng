<?php

define('BASE_PATH', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', BASE_PATH.DS.'app');

include BASE_PATH.'/core/Core.php';

use Hyh\Core\Core;

Core::push('Request');
Core::push('Route', 'init', [], Core::_STATIC);
Core::push('Permit');
Core::push('Cache');
Core::push('Action');
Core::push('Response');
Core::push('Log');



Core::run();

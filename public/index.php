<?php

defined('DIR_BASE_NAME') || define('DIR_BASE_NAME', dirname(__DIR__));
require DIR_BASE_NAME . '/vendor/autoload.php';

// require DIR_BASE_NAME . '/core/helpers.php';

use src\core\Router;
use src\core\Request;

Router::load(DIR_BASE_NAME . '/src/routes.php')
        ->direct(Request::uri(), Request::method());
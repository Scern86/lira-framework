<?php

declare(strict_types=1);
const DS = DIRECTORY_SEPARATOR;
define('ROOT_DIR', dirname(dirname(__FILE__)));

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);

require_once ROOT_DIR.DS.'loader.php';
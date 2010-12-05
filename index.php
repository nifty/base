<?php
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));

define('BASE_PATH', realpath(dirname(__FILE__)) . '/');
define('APP_PATH', BASE_PATH . 'app/');

require_once BASE_PATH . 'init.php';
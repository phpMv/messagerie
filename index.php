<?php

use \Ubiquity\controllers\Startup;
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath('app').DS);

$config=include_once ROOT.'config/config.php';

require_once ROOT.'./../vendor/autoload.php';

if(@$config["debug"]===false)
	error_reporting(0);
@\set_exception_handler(array ('Ubiquity\controllers\Startup','errorHandler' ));
require_once ROOT.'config/services.php';
Startup::run($config,$_GET["c"]);
//apcu_store("test", "bloppppppp");
//apcu_store("test2", "blopppppppssssssssss");
//var_dump(apcu_cache_info());
//print_r(apcu_cache_info()['cache_list']);
//CacheManager::getInstance('Mongodb')->clear();
<?php

defined('YII_DEBUG') || define('YII_DEBUG', true);
defined('YII_ENV') || define('YII_ENV', $_ENV['YII_ENV'] ??  'test');
defined('YII_APP_BASE_PATH') || define('YII_APP_BASE_PATH', dirname(__DIR__, 2));

require_once YII_APP_BASE_PATH . '/vendor/autoload.php';
require_once YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php';
require_once YII_APP_BASE_PATH . '/common/config/bootstrap.php';
require_once YII_APP_BASE_PATH . '/frontend/config/bootstrap.php';

$_SERVER['HTTP_HOST'] = 'http://localhost:3000';
ob_start();
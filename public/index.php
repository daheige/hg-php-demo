<?php
// 应用入口文件
// 检测PHP环境
if (version_compare(PHP_VERSION, '5.4.0', '<')) {
    die('require PHP > 5.4.0 !');
}

defined('ROOT_PATH') || define('ROOT_PATH', dirname(__DIR__) . '/');
define("APP_ENV", isset($_SERVER['APP_ENV']) ? strtolower($_SERVER['APP_ENV']) : 'local');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', in_array(APP_ENV, ['local', 'testing']));

require_once ROOT_PATH . 'vendor/autoload.php'; //自动加载文件设置

// 引入框架入口文件
require_once ROOT_PATH . 'vendor/heige/hg-php/ThinkPHP.php';

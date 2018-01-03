<?php
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
define('BASE_DOMAIN', 'hgtp.com');

defined('ASSETS_DOMAIN') or define('ASSETS_DOMAIN', '/assets/');
defined('UPLOAD_IMAGE_URL') or define('UPLOAD_IMAGE_URL', '/data/uploads');
// 系统版本
defined('SYS_VERSION') or define('SYS_VERSION', '1.0.0');
// 插件目录
defined('APP_LIB_PATH') or define('APP_LIB_PATH', APP_PATH . 'Library' . DS);

// 附件保存地址
defined('UPLOAD_PATH') or define("UPLOAD_PATH", ASSETS_DOMAIN . 'uploads' . DS);
defined('IMAGE_DOMAIN') or define('IMAGE_DOMAIN', '/uploads/');

<?php
// 应用入口文件
header("Content-Type:text/html;charset=utf-8");
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录常量
define('APP_PATH','./Application/');

//定义管理员公共目录常量
define('ADMIN_COMMON_PATH',APP_PATH.'Admin/Common/');

require_once ADMIN_COMMON_PATH.'functions.php';

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
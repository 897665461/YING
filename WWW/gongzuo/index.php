<?php
define('ROOT',pathinfo(__FILE__,PATHINFO_DIRNAME));//定义入口文件路径

spl_autoload_register('auto_load');
function auto_load($class){
    require_once ROOT.'\\'.$class.'.php';
}

$path = ltrim($_SERVER['PATH_INFO'],'/');
$path = explode('/',$path);
$controller = empty($path[0])?'controller':$path[0];
$action = empty($path[1])?'zhuyemian':$path[1];
$controller = 'controller\\'.$controller;

session_start();//开启会话

$object = new $controller();
$object->$action();

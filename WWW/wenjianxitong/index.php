<?php
spl_autoload_register('auto_load');
define('ROOT',pathinfo(__FILE__,PATHINFO_DIRNAME));//定义入口文件路径

function auto_load($class){
    require_once ROOT.'/controller/'.$class.'.php';
}

$path = ltrim($_SERVER['PATH_INFO'],'/');
$path = explode('/',$path);
$controller = empty($path[0])?'Controller':$path[0];
$action = empty($path[1])?'zhuyemian':$path[1];

$object = new $controller();
$object->$action();
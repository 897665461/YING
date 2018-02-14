<?php
define('ARRT',str_replace('\\','/',__FILE__));

spl_autoload_register('auto_load');//自动调用函数的注册

function auto_load($class)
{
   require_once('controller\\'.$class.'.php');      //只用包含控制器文件就行，控制器文件负责调用
}

$pathinfo = substr($_SERVER['PATH_INFO'],1);          //路由
$shuzu = explode('/',$pathinfo);

//初始化调用的实例
$shuzu[0] = empty($shuzu[0])||!in_array($shuzu[0],array('controller','upload')) ? 'upload' : $shuzu[0] ;

$object = new $shuzu[0]();

//初始化调用的方法
$shuzu[1] = empty($shuzu[1])||!in_array($shuzu[1],array('show','handle')) ? 'show' : $shuzu[1] ;

//初始化传递的变量
$wenjian = empty($_SERVER['QUERY_STRING'])||!in_array($_SERVER['QUERY_STRING'],array('biaodan1','biaodan2'))?
    'biaodan1':$_SERVER['QUERY_STRING'];

$object->$shuzu[1]($wenjian);
aaa()
?>

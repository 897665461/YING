<!DOCTYPE html>
<html>
<head>
    <meta  http-equiv="content-type" content="text/html" charset="UTF-8" />
    <title>Title</title>
    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?php
$pathinfo = substr($_SERVER['PATH_INFO'],1);
$array = explode('/',$pathinfo);
list($controller,$action) = $array;

if($controller == ''){
    $controller = 'IndexController';

}
if($action == ''){
    $action = 'index';
}
//var_dump( 'mvc/controller/' . $controller . '.php');mvc/controller/' . $controller . '.php
//包含相关的控制器文件
require_once ('controller/'.  $controller.'.php');

//实例化控制器(路由过程)
$class = new $controller();
//调用控制器中方法
$class->$action();

?>
</body>
</html>




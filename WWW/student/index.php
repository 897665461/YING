<!DOCTYPE html>
<html>
<head>
    <meta  http-equiv="content-type" content="text/html" charset="UTF-8" />
    <title>Title</title>
    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?php

//ini_set("error_reporting","E_ALL & ~E_NOTICE");//禁止提示未定义类的notice
$pathinfo = substr($_SERVER['PATH_INFO'],1);
$shuzu = explode('/',$pathinfo);
$controller = $shuzu['0'];
$action = $shuzu['1'];
if(!$controller)
{
    $controller = 'zhucecontroller';

}
if(!$action)
{
    $action = 'index';
}

require_once('controller/'.$controller.'.php');

$object = new $controller();

$object->$action ();

?>
</body>
</html>

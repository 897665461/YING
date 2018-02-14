<?php

   $pathinfo = trim($_SERVER['PATH_INFO'],'/');                                 //得到控制器名和方法名  trim里的参数，第一个是字符，第二个是要删除的两边的字符
   $array = explode('/',$pathinfo);
   list($controller,$action) = $array;
                                                                                 //设定初始条件
   if($controller == ''){
       $controller = 'IndexController';
   }
   if($action == ''){
       $action = 'index';
   }

   require_once('/controller/'.$controller.'.php');                       //包含调用控制器文件   最好使用相对路径，便于移植，即使使用绝对路径也要用计算机的绝对路径

    $con = new $controller();
    $con->$action();






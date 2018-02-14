<?php
spl_autoload_register('auto_load');               //注册自动加载函数
function auto_load($class_path)                   //当新建类时，会自动运行此函数。接受的参数是类的命名空间加上类明
{
    require_once("$class_path.php");
}

//$q = new Factory();
//$w = $q->yingshe(1);
//echo $w->pid;
$stack = new splStack();
$stack->push('wq');
$stack->push('qq');


$q = $stack->pop();
echo $q;

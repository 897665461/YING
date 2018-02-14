<?php
require_once('Zhuceqi.php');
require_once('yingshe.php');
class Factory
{
    public function diaoyong()
    {
        $object = new Show();              //工厂方法所用的类的调用都从工厂类中，方便以后的修改
        Zhuceqi::set('shiyan',$object);
        return $object;
    }
    public function yingshe($id)
    {
        $yingshe = new yingshe($id);
        return $yingshe;
    }
}
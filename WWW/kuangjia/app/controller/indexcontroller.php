<?php
namespace app\controller;
//use core\imooc;

class indexcontroller extends \core\imooc      //继承之后就可以直接调用imooc类中的方法了，很方便
{
    public function index()
    {
        /*
        $obj = new \core\lib\model();
        $sql = 'select * from php';
        $res = $obj->qu($sql);
        var_dump($res);
        var_dump($res->fetch(\PDO::FETCH_ASSOC));//很巧妙
        */
        //$obj = new imooc();
        $b = \core\lib\conf::get('db','dbname');
        $c = \core\lib\conf::get('db','password');
        $this->assign('m',$b);
        $this->assign('l',$c);
        $this->dispiay('zhu.html');

    }
}
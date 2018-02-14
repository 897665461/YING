<?php
namespace imooc;
class Loader
{

    static function autoloadl($q)
    {echo '1'.$q.'1';

        require_once('../'.str_replace('\\','/',$q).'.php');//要把\的方向进行替换，相对路径只能用/这个写
       // echo '../'.str_replace('\\','/',$q).'.php';
        echo $q;

    }
}
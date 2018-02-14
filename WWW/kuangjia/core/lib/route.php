<?php
namespace core\lib;
class route{
    public $conreoller;
    public $action;
    public function __construct()
    {
        $arr =  $_SERVER['REQUEST_URI'];
        $arr = trim($arr,'/');
        $array = explode('/',$arr);
        if(isset($array[2]) and isset($array[3])){
            $this->conreoller = $array[2];
            $this->action = $array[3];
        }else{
            if(isset($array[2])){
                $this->conreoller = $array[2];
                $this->action = 'index';
            }else{
                $this->conreoller = 'index';
                $this->action = 'index';
            }
        }
        array_shift($array);
        array_shift($array);
        array_shift($array);
        array_shift($array);
        $number = count($array);
        $biaozhi = $number / 2;
        if(!is_int($biaozhi))
        {
            array_pop($array);
        }
        $number = count($array);
        for($i=0;$i<$number;)
        {
            $_GET[$array[$i]] = $array[$i+1];
            $i = $i+2;

        }
        unset($array);//非常的重要  重要不然下一次重新载入数组的值还会保留上一次的，会对路由造成影响
    }

}
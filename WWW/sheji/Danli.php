<?php
class Danli
{
    static public $db;                           //储存实例的路径
    private function __construct()              //禁止私自调用
    {
    }
    public static function ziji()
    {
        if(self::$db)
        {
            return self::$db;
            echo '复制以前的实例化';
        }else {
            self::$db = new self();
            echo '第一次实例化';
            return self::$db;
        }
    }
    public function check()
    {
        echo '已经成功实例化';
    }
}
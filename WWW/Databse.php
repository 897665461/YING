<?php
class database
{
   static  public $db;
    private function __construct()//外层不能新建实例，只能在类的内部新建实例
    {
    }

    static function lianjie($db)
    {

        if (self::$db) {
            echo '复制了实例';
            return self::$db;
        } else {
            self::$db = new database();
            echo '新建了实例';

            return database::$db;
        }

    }

    public function check()
    {


        echo '孙梦宽';

    }


}
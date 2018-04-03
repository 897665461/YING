<?php
class Db
{
    protected static $db;
    private function __construct()
    {
        $this->db = 1;
    }                                 //十分的注意，静态方法只能调用静态变量
    public static function db()    //十分的注意，静态方法只能调用静态变量
    {                                 //十分的注意，静态方法只能调用静态变量
        if(self::$db){
            echo 2;
            return self::$db;
        }else{
            echo 1;
            self::$db = new self();
            return self::$db;
        }
    }
}
$db = Db::db();
$db->db();
$db = Db::db();
$db->db();
$db = Db::db();
$db->db();
$db = Db::db();
$db->db();
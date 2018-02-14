<?php
class Zhuceqi
{
    public static $objects;
     static function set($key,$object)
    {
        self::$objects[$key] = $object;

    }
    function _unset($key)
    {
        unset(self::$objects[$key]);
    }
}
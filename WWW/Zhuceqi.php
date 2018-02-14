<?php
class zhuceqi
{
    protected static $objects;

    static function  set($q,$w)
    {
        self::$objects[$q] = $w;
    }
    function _unset()
    {
    unset(self::$ob);
    }
}
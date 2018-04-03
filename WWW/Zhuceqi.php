<?php
class zhuceqi
{
    protected static $zhuceqi;
    public static function set($leiming)
    {
        self::$zhuceqi["$leiming"] = new $leiming();
    }
    public static function get($leiming)
    {
        if(isset(self::$zhuceqi[$leiming])){
            return self::$zhuceqi["$leiming"];
        }else{
            echo '未注册';
        }
    }
    public static function _unset($leiming)
    {
        unset(self::$zhuceqi["$leiming"]);
    }
}

class shiyan
{
    public $nianling;
    public $xingbie;
    public $xingming;
    public function jiedhou($nianling,$xingbie,$mingzi)
    {
        $this->nianling = $nianling;
        $this->xingbie = $xingbie;
        $this->xingming = $mingzi;

    }
    public function shuchu()
    {
        print_r($this->nianling);
    }
}

//zhuceqi::set('shiyan');
$shiyan = zhuceqi::get('shiyan');
$shiyan->nianling = 11;
$shiyan->shuchu();
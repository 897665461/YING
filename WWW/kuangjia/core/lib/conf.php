<?php
namespace core\lib;
class conf
{
    static public $conf = array();
    static public function get($file,$name)
    {
        //文件是否存在
        //配置是否存在
        //缓存的配置

        var_dump(self::$conf);
        if(isset(self::$conf[$file])){
            echo 1;
            return self::$conf[$file][$name];
        }
        $filepath = 'core/lib/'.$file.'.php';
        if(is_file($filepath)){
            echo 2;
            $conf = require $filepath;
            if(isset($conf[$name])){
                self::$conf[$file] = $conf;
                return $conf[$name];

            }else{
                return false;
            }
        }else{
            return false;
        }

    }



}
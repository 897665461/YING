<?php
namespace core;
class imooc
{
    static public $classmap = array();
     public $assign = array();
    static public function run()
    {
        $object = new \core\lib\route();
        $conreoller = $object->conreoller.'controller';
        $action = $object->action;

        $conreoller =  "\app\controller\\".$conreoller;

        $obj = new $conreoller();//类会自动载入，只要写的是完整的命名空间就可以载入成功，也会自动检测类是否正确
        $obj->$action();
    }

    static public function  auto_load($class)
    {
        if(is_file(IMOOC . '\\' . $class . '.php'))
        {
            require_once IMOOC . '\\' . $class . '.php';

        } else {
            return false;
        }
    }
    public function assign($name,$value)
    {
        $this->assign["$name"] = $value;
    }
    public function dispiay($file)
    {
        $file = 'app/view/'.$file;
        if(is_file($file)){
            extract($this->assign);
            require_once $file;
        }else{

        }

    }
}
<?php
class yingshe
{
    public $id;                   //不声明此类变量也可以在类内直接使用，那么声明你的意义是什么？
    public $pid;
    public $mysqli;

    public function __construct($id)
    {
        $mysqli = new mysqli('localhost','root','root','shiyan');
        $this->mysqli = $mysqli;                                            //这种变量的作用域类内
        $stmt = $mysqli->query("select * from shiyan_shuju WHERE id = $id");
        $data = $stmt->fetch_array();
        $this->id = $data['id'];
        $this->pid = $data['pid'];
    }
    public function __destruct()
    {
         //调用了，类级的变量
        $this->mysqli->query("update shiyan_shuju set pid = $this->pid where id = $this->id");
    }

}
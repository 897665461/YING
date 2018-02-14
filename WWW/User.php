<?php
class user                 //对象映射模式
{
    public $id;
    public $pid;
    public $qq;
    protected static $con;
    function __construct($id)
    {
        //连接数据库 mysqli
        $con = mysqli_connect('127.0.0.1','root','root','shiyan');
        if($con)
        {
            echo '依旧成功';
        }
        self::$con = $con;
        $res =  mysqli_query($con,"select * from q  where id = 2");
        $data = mysqli_fetch_assoc($res);
        $this->id = $data['id'];
        $this->pid = $data['pid'];
        $this->qq = $data['qq'];
    }


    function __destruct()
    {
        $con = self::$con;

        echo $this->id;
        $pid = $this->pid;
        $res = mysqli_query($con,"update q set pid =  $this->pid,qq = $this->qq where id=$this->id");//set   两个命令之间是有都好的
        if($res)
        {
            echo "添加成功";
        }
    }



}
<?php
require_once('controller/denglucontroller.php');

class Database
{
    public function dengluchuli()
    {
        if($_POST['mima'] == 897)
        {
            $w = new denglucontroller();
            $w->guanliyuan();
        }
        else
        {
            echo "shibai";
        }
    }
    public function quchuxinxi()
    {
        $dsn = "mysql:host=localhost;dbname=toupiao";
        $pdo = new PDO($dsn,"root","root");
        $stmt = $pdo->query('select * from toupiao_xinxi');
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;                                                //返回数据库的所有信息
    }
    public function shanchu()
    {

        $dsn = "mysql:host=localhost;dbname=toupiao";
        $pdo = new PDO($dsn,"root","root");
        $id = $_GET['id'];
        echo $id;
        $result = $pdo->exec("delete from toupiao_xinxi where id=$id");        //这里要写双引号，这样才可以解析变量

    }
    public function toupiao()
    {
        $id=$_GET['id'];
        $dsn = "mysql:host=localhost;dbname=toupiao";
        $pdo = new PDO($dsn,"root","root");
      $result =  $pdo->exec("update toupiao_xinxi set piaoshu=piaoshu+1 where id=$id");
        return $result;


    }
    public function tianjiaxiangmu()
    {
        $dsn = "mysql:host=localhost;dbname=toupiao";
        $pdo = new PDO($dsn,"root","root");
        $xiangmu = $_POST['xinxiangmu'];
        $pdo->exec("insert into toupiao_xinxi VALUES ('','0','$xiangmu','0')");
    }

    public function xiugai()
    {
        $id = $_POST['id'];
        $xiangmu = $_POST['xiangmu'];
        $piaoshu = $_POST['piaoshu'];
        $dsn = "mysql:host=localhost;dbname=toupiao";
        $pdo = new PDO($dsn,"root","root");

        $pdo->exec("update toupiao_xinxi set xiangmu=$xiangmu,piaoshu=$piaoshu where id=$id");

    }
}
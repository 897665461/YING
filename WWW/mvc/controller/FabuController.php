<?php
class FabuController
{   //调用添加课程页面
    public function fabu()
    {
        require_once('view/index.html');
    }
    //将添加课程中页面的信息传入数据库
    public function fabuchuli()

   {
         require_once('C:\phpStudy\PHPTutorial\WWW\mvc\model\Database.php');  //包含model层的数据库的相关文件
       $kechengmingcheng = $_POST['name'];                                              //接受传进来的信息
       $kechengjiage     = $_POST['price'];
       $suoshufangxiang  = $_POST['type'];
       $kechengjianjie   = $_POST['content'];
       $kechengjibie     = $_POST['level'];
       $q = new Database();                                                                //调用类以及属性方法
       $q->tianjiakecheng ($kechengmingcheng,$kechengjiage,$suoshufangxiang,$kechengjianjie,$kechengjibie);//总是报未定义
       require_once('file:///C:/phpStudy/PHPTutorial/WWW/mvc/view/index.html');//调用添加课程页面                                                                    //页面跳转到哪里？
   }

}

$q = new fabucontroller();
$q->fabu();





?>
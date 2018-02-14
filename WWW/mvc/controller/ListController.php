<?php
class ListController
{
    public function listt()
    {
        require_once('C:\phpStudy\PHPTutorial\WWW\mvc\model\Database.php');    //包含model的文件
        $q = new Database();                                                             //从数据库取出数据列表的信息
        $q->zhanshikecheng();

        require_once('file:///C:/phpStudy/PHPTutorial/WWW/mvc/view/list.html');//接受信息并展示课程列表
        $q->fenye();                                                                      //调用分页系统
    }

}


?>
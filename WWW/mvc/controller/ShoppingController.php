<?php
class ShoppingController
{
    public function shopping()
    {
        require_once('C:\phpStudy\PHPTutorial\WWW\mvc\model\Database.php');  //包含model层文件
        $q = new Database();
        $q->jiarugouwuche();                                                            //将课程列表的信息加入购物车

        $q->zhanshigouwuche();                                                          //将数据表mall_gouwuche中的信息取出来
        require_once('file:///C:/phpStudy/PHPTutorial/WWW/mvc/view/shopping_list.html');//展示前端文件
    }
    //清空购物车  提交订单 跳转课程列表界面
   public function dingdanchuli()
   {

       require_once('C:\phpStudy\PHPTutorial\WWW\mvc\model\Database.php');  //包含model层文件
       $q = new Database();

       $q->tijiaodingdan();                                                          //提交订单

       //$q->qingkonggouwuche();  异步处理了                                         //清空购物车


   }
}


?>
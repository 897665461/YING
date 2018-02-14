<?php
class ZhuceController
{
       //显示主页面
       public function index ()
       {
           require_once('model/Database.php');

           $object = new database();
           $object->yonghuxinxi();

           require_once('view/index.html');

       }

     //显示注册页面
      public function zhuce()
      {
          require_once('view/register.html');
      }
      //将注册信息传入到数据库
      public function zhucechuli()
      {
          require_once('model/Database.php');       //包含数据库模型
          $object = new database();
          $object->zhucexinxi();

      }
    //显示登陆界面
    public function denglu()
    {
        require_once('model/Database.php');

        $object = new database();
        $object->yonghuxinxi();
        require_once('view/denglu.html');

    }
    public function dengluchuli()
    {
        session_start();
        require_once('model/Database.php');
        $object = new database();
        $object->denglujiancha();
    }
    public function tuichu()
    {
        require_once('model/Database.php');
        $object = new database();
        $object->tuichuxiaohui();


        $object ->yonghuxinxi();
        require_once('view/index.html');
    }
    public function sousuo()
    {
        require_once('model/Database.php');
        $object = new database();
        $object->sousuochuli();
        require_once('view/index.html');
    }
    public function zhuanzhang()
    {
        require_once('model/Database.php');
        $object = new database();
        $object->zhuanzhangchuli();

    }

}




?>
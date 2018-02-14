<?php
require_once('model/database.php');                     //包含model层的文件
class DengluController
{
    //登陆界面
    public function index()
    {
        require_once('view/denglujiebian.html');
    }

    //检查登陆是否成功
    public function denglutiao()
    {
        $q = new database();
        $q->dengluchuli();
    }

    //游客投票界面
    public function toupiaochuli()
    {
        $q = new database();
        $data =  $q->quchuxinxi();                //从数据库取出相关参数
        require_once('view/toupiao.html');
    }

    //游客投票结果处理
    public function jieguochuli()
    {
        if(isset($_COOKIE['istou']))
        {
            echo "<script>alert('你已经投票了')</script>";
            $w = new denglucontroller();
            $w->toupiaochuli();
        }
        else
        {
            setcookie('istou',md5(8),time()+5);
            $q = new database();
            $jieguo = $q->toupiao();
            if($jieguo==1)
            {
                echo "<script>alert('投票成功')</script>";
                $w = new denglucontroller();
                $w->toupiaochuli();
            }
            else
            {
                echo '失败';
            }
        }

    }

    //管理员页面
    public function guanliyuan()
    {
           $q = new database();
           $data =  $q->quchuxinxi();                //从数据库取出相关参数
           require_once('view/gunali.html');    //展示页面
    }

    //删除数据库数据
    public function shanchuchuli()
    {
        $q = new database();
        $data =  $q->shanchu();
        echo "<script>alert('删除成功')</script>";

        $q = new database();
        $data =  $q->quchuxinxi();                //从数据库取出相关参数
        require_once('view/gunali.html');    //展示页面
    }

     //修改处理
    public function x()
    {
        $id = $_GET['id'];
        require_once('view/xiugai.html');

     }
    public function y()
    {
        $q = new database();
        $q->xiugai();

    }

    //添加新项目
    public function tianjia()
    {
        $q = new database();
        $q->tianjiaxiangmu();
        echo "<script>alert('添加成功')</script>";

        $q = new database();
        $data =  $q->quchuxinxi();                //从数据库取出相关参数
        require_once('view/gunali.html');    //展示页面
    }

}
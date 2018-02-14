<?php
namespace controller;
require_once 'model/Db.php';
class Controller extends \model\Db
{
    public function zhuyemian()
    {
        require_once ROOT.'/view/zhuyemian.html';
    }
    public function denglu()
    {
        require_once ROOT.'/view/denglu.html';
    }
    public function dengluhou()
    {
        $user = $_POST['user'];
        $password = $_POST['password'];
        if($this->password($user,$password)){
            $this->huihua($user);
            require_once ROOT.'/view/dengluhou.html';
        }else{
            echo "<script>alert('登录失败，请重新登陆');window.location.href='/gongzuo/index.php/controller/denglu';</script>";
        }
    }

    public function zhuce()
    {
        $this->jiancha();
        $user = $_POST['user'];
        $password = $_POST['password'];
        if($this->cunru($user,$password)){
            echo "<script>alert('注册成功');window.location.href='/gongzuo/index.php/controller/gzhuyemian';</script>";
        }else{
            echo "<script>alert('用户名已经存在,请重新输入');window.location.href='/gongzuo/index.php/controller/chongzhuce';</script>";
        }
    }

    public function chongzhuce()
    {
        $this->jiancha();
        require_once ROOT.'/view/dengluhou.html';
    }

    public function gzhuyemian()
    {
        $this->jiancha();

        $women = $this->quwomen();
        extract($women);

        require_once ROOT.'/view/gzhuyemian.html';
    }

    public function gguanyu()
    {
        $this->jiancha();
        $jianjie = file_get_contents('./wenjian/jianjie.txt');
        //$jianjie = $this->qujianjie();

        $women = $this->quwomen();
        extract($women);

        require_once ROOT.'/view/guanyu.html';
    }
    public function gguanyuhou()
    {
        $this->jiancha();
       $jianjie = $_POST['neirong'];
        $b = file_put_contents('./wenjian/jianjie.txt','7748445');
        //$this->cunjianjie($jianjie);
        //echo"<script>alert('修改成功');window.location.href='/gongzuo/index.php/controller/gguanyu'</script>";

    }


    public function gchanpin()
    {
        $this->jiancha();

        $women = $this->quwomen();//联系我们的信息
        extract($women);         //联系我们的信息

        $yema = empty($_GET['yema'])?1:$_GET['yema'];
        $chanpin = $this->quchanpin($yema);
        $yeshu = array_shift($chanpin);

        $tupian = $this->tupian($chanpin);


//var_dump($tupain);
       require_once ROOT.'/view/chanpin.html';

    }
    public function tianchanpin()
    {
        $this->jiancha();
        require_once ROOT.'/view/tianjiachanpin.html';

    }
    public function shouchanpin()
    {
        $this->jiancha();
        date_default_timezone_set('PRC');
        $biaoti = $_POST['biaoti'];
        $laiyuan = $_POST['laiyuan'];
        $shijian = date('Y-m-d,H:i:s');
        $cishu = 1;
        $neirong = $_POST['neirong'];
        $guanjianzi = $_POST['guanjianzi'];
        $leibie = $_POST['leibie'];
        $tumingzi = $this->jieshoutupian($_FILES['tupian']);
        $this->cunchanpin($biaoti,$laiyuan,$shijian,$cishu,$neirong,$guanjianzi,$leibie,$tumingzi);
    }

    public function gxinwen()
    {
        $this->jiancha();
        $yema = isset($_GET['yema'])?$_GET['yema']:1;
        $xinwen = $this->quxinwen($yema);
        $yeshu = array_shift($xinwen);

        $women = $this->quwomen();
        extract($women);

       require_once ROOT.'/view/xinwen.html';
    }
    public function gwenzhang()
    {
        $this->jiancha();
        $id = intval($_GET['id']);
        $wenzhangz = $this->quwenzhang($id);
        $wenzhangq = $wenzhangz[0];
        $wenzhang = $wenzhangz[1];
        $wenzhangh = $wenzhangz[2];

        $xiangguan = $this->xiangguan(2);
       // var_dump($xiangguan);

        $women = $this->quwomen();
        extract($women);

        require_once ROOT.'/view/wenzhang.html';

    }
    public function tianjiaxinwen()
    {
        $this->jiancha();
        require_once ROOT.'/view/tianjiaxinwen.html';
    }
    public function shouxinwen()
    {
        $this->jiancha();

        date_default_timezone_set('PRC');
        $biaoti = $_POST['biaoti'];
        $laiyuan = $_POST['laiyuan'];
        $shijian = date('Y-m-d,H:i:s');
        $cishu = 1;
        $neirong = $_POST['neirong'];
        $guanjianzi = $_POST['guanjianzi'];
        $leibie = $_POST['leibie'];
        $tumingzi = $this->jieshoutupian($_FILES['tupian']);
        $this->cunxinwen($biaoti,$laiyuan,$shijian,$cishu,$neirong,$guanjianzi,$leibie,$tumingzi);
    }
    public function chafankui()
    {
        $this->jiancha();
        $fankui = $this->qufankui();
        require_once ROOT.'/view/chafankui.html';

    }
    public function gqiyexinwen()
    {
        $this->jiancha();

        $women = $this->quwomen();
        extract($women);

        require_once ROOT.'/view/qiyexinwen.html';


    }
    public function gzizhi()
    {
        $this->jiancha();

        $women = $this->quwomen();
        extract($women);

        require_once ROOT.'/view/zizhi.html';

    }
    public function gxiaoshou()
    {
        $this->jiancha();

        $women = $this->quwomen();
        extract($women);

        require_once ROOT.'/view/xiaoshou.html';

    }
    public function gkefu()
    {
        $this->jiancha();

        $women = $this->quwomen();
        extract($women);

        require_once ROOT.'/view/kehu.html';
    }
    public function shoufankui()
    {
        $this->jiancha();
        $wenti = $_POST['wenti'];
        $neirong = $_POST['neirong'];
        $lianxiren = $_POST['lianxiren'];
        $lianfangshi = $_POST['lianxifangshi'];
        $res = $this->cunfankui($wenti,$neirong,$lianxiren,$lianfangshi);
        if($res)
        {
            echo"<script>alert('反馈成功');window.location.href='/gongzuo/index.php/controller/gkefu'</script>";
        }
    }
    public function glianxi()
    {
        $this->jiancha();

        $women = $this->quwomen();
        extract($women);
        require_once ROOT.'/view/lianxi.html';

    }
    public function shouwomen()
    {
        $this->jiancha();
        extract($_POST);
        //Strom无法感知的变量，没关系
        $this->cunwomen($mingzi,$dianhua,$shouji1,$shouji2,$chuanzhen,$lianxiren,$youxiang,$wangzhi,$dizhi);
        echo"<script>alert('修改成功');window.location.href='/gongzuo/index.php/controller/glianxi'</script>";
    }
    public function gditu()
    {
        $this->jiancha();

        $women = $this->quwomen();
        extract($women);

        require_once ROOT.'/view/ditu.html';
    }


}
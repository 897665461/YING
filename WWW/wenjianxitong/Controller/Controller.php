<?php
require_once('model/model.php');
class Controller
{
    public function zhuyemian(){
        $dir = 'wenjian';
        $obj = new model\Model();
        $obj->open($dir);

    }
    public function fanhui()
    {
        $lujing = $_GET['lujing'];
        $obj = new model\Model();
        $obj->back($lujing);
    }

    public function open()
    {
        $wen = $_GET['wen'];
        $obj = new model\Model();
        $obj->jinru($wen);

    }
    public function baocun()
    {
        $content = $_POST['neirong'];
        $wen = $_POST['wenjian'];
        $obj = new model\Model();
        $obj->cun($wen,$content);
    }

    public function delete()
    {
        $wenjina = $_GET['wen'];
        $obj = new model\Model();
        $obj->del($wenjina);
    }


    public function chongmingming()
    {
        $lujing = $_POST['dangqianlujing'];
        $xinmingzi = $_POST['xinmingzi'];
        $jiumingzi = $_POST['jiumingzi'];

        $obj = new model\Model();
        $obj->chongming($lujing,$jiumingzi,$xinmingzi);


    }
    public function xinjian()
    {
        $xinwenjianming = $_POST['xinwenjian'];
        $dangqianlujing = $_POST['dangqianlujing'];
        $obj = new model\Model();
        $obj->xinjian($dangqianlujing,$xinwenjianming);
    }
    public function cop()
    {
        $jiumingzi = $_POST['jiumingzi'];
        $lujing = $_POST['dangqianlujing'];

        $wenjian = 'C:/phpStudy/PHPTutorial/WWW/wenjianxitong/'.$lujing.'/'.$jiumingzi;

        if(is_file($wenjian)) {
            $lujing = 'C:/phpStudy/PHPTutorial/WWW/wenjianxitong/'.$lujing.'/'.$_POST['lujing'].$jiumingzi;
            $obj = new model\Model();
            $obj->fuzhi($wenjian, $lujing);
        }else{
            $lujing = 'C:/phpStudy/PHPTutorial/WWW/wenjianxitong/'.$lujing.'/'.$_POST['lujing'];
            $obj = new model\Model();
            $obj->fuzhidir($wenjian, $lujing);
            echo "<script>location.href='/wenjianxitong/index.php/Controller/open?wen=$lujing';</script>";
        }

    }
    public function jian()
    {

    }
    public  function daxiao($dir)
    {
        global $size;
        $size=0;
        $obj = new model\Model();
        $w =  $obj->size($dir);
        return $obj->geshihua($w);
    }



}
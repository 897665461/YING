<?php
namespace model;
class Model
{
    public function open($dir)
    {
        $handle = opendir($dir);
        while(($res = readdir($handle))!==false){
            $dangqian = $dir;
            if($res!='.' and $res!='..')
            {
                $arr[] =$res;
                $arrpath[] = $dir.'/'.$res;
            }
        }
        require_once'View/zhuyemian.html';
    }
    public function back($lujing)
    {

        if($lujing=='wenjian'){
            echo "<script>alert('禁止返回');location.href='/wenjianxitong/index.php';</script>";
        }else {
            $lujing = dirname($lujing);
            $this->open($lujing);
        }
    }
    public function size($wenjian)
    {
        global $size;
        if(is_dir($wenjian)) {
            $handle = opendir($wenjian);
            while (($res = readdir($handle)) !== false) {
                if ($res != '.' and $res != '..') {
                    if (is_file($wenjian . '/' . $res)) {
                        $size = $size + filesize($wenjian . '/' . $res);
                    } else {
                        $res = $wenjian . '/' . $res;
                        $this->size($res);
                    }
                }
            }
        }else{
            if (is_file($wenjian)) {
                $size = $size + filesize($wenjian);
            }
        }
        return $size;
    }
    public  function geshihua($daxiao)
    {
        $size = 0;
        $danwei = array('b','kb','mb','gb');
        $i=0;
        while($daxiao>1024)
        {
            $daxiao = round($daxiao/1024,2);
            $i=$i+1;
        }
        return $daxiao.$danwei[$i];
    }
    public function jinru($wen)
    {
        if(is_file($wen)){
            $neirong = file_get_contents($wen);
            $html = '<form name="xiugai" method="post" action="/wenjianxitong/index.php/Controller/baocun">
                          <textarea name="neirong">'.$neirong.'</textarea>
                          <input type="hidden" name="wenjian" value='.$wen.'>
                          <input type="submit" value="提交">
                      </form>';
            echo $html;
        }else{
            $handle = opendir($wen);
            while($res = readdir($handle)){
                $dangqian = $wen;
                if($res!='.' and $res!='..')
                {
                    $arr[] =$res;
                    $arrpath[] = $wen.'/'.$res;
                }
            }
            if(empty($arr[0])){
                $wen = dirname($wen);
                var_dump($wen);
                echo "<script>alert('无文件');</script>";
                require_once 'View/zhuyemian.html';
            }else {
                require_once 'View/zhuyemian.html';
            }
        }
    }
    public function xinjian($dangqianlujing,$xinwenjianming)
    {
        if(is_dir($dangqianlujing.'/'.$xinwenjianming)){
            echo "<script>alert('文件已存在');location.href='/wenjianxitong/index.php/Controller/open?wen=$dangqianlujing';</script>";
        }else{
            if(mkdir($dangqianlujing.'/'.$xinwenjianming))
            {
                echo "<script>alert('创建成功');location.href='/wenjianxitong/index.php/Controller/open?wen=$dangqianlujing';</script>";
            }else{
                echo"<script>alert('创建失败');location.href='/wenjianxitong/index.php/Controller/open?wen=$dangqianlujing';</script>";
            }
        }
    }
    public function chongming($lujing,$jiumingzi,$xinmingzi)
    {
        if(rename($lujing.'/'.$jiumingzi,$lujing.'/'.$xinmingzi))
        {
            echo "<script>alert('重命名成功');location.href='/wenjianxitong/index.php';</script>";
        }else{
            echo "<script>alert('重命名失败');location.href='/wenjianxitong/index.php';</script>";
        }
    }
    public function del($wenjina)
    {
        if(is_dir($wenjina)) {
            if(rmdir($wenjina)){
                echo "<script>alert('删除成功');location.href='/wenjianxitong/index.php';</script>";
            }else{
                echo "<script>alert('删除失败');location.href='/wenjianxitong/index.php';</script>";
            }
        }else{
            if(unlink($wenjina)){
                echo "<script>alert('删除成功');location.href='/wenjianxitong/index.php';</script>";
            }else{
                echo "<script>alert('删除失败');location.href='/wenjianxitong/index.php';</script>";
            }
        }
    }

    public function cun($wen,$content)
    {
        if(file_put_contents($wen,$content)){
            echo "<script>alert('修改成功');location.href='/wenjianxitong/index.php/Controller/open?wen={$wen}';</script>";
        }
    }
    public function fuzhi($wenjian,$lujing)       //复制文件
    {
        if(is_file($wenjian)) {
            if (copy($wenjian, $lujing)){
                echo "<script>alert('复制成功');location.href='/wenjianxitong/index.php';</script>";
            } else {
                echo "<script>alert('复制失败');location.href='/wenjianxitong/index.php';</script>";
            }
        }else{
            echo "<script>alert('复制失败');location.href='/wenjianxitong/index.php';</script>";
        }
    }

    public function fuzhidir($jiulujing,$xinlujing)                  //复制路径
    {
        if(!is_dir($jiulujing)){
            echo '旧路径是错误的';
        }
        $arr = explode('/',$jiulujing);
        $i = count($arr)-1;
        $wenjianjia = $arr[$i];
        if(!mkdir($xinlujing.'/'.$wenjianjia))
        {
            echo '创建新文件夹失败';
        }
        $handle = opendir($jiulujing);
        while(($res=readdir($handle))!==false){
            if($res!=='.' and $res!=='..' and $res!=='')
            {
                if(is_file($jiulujing.'/'.$res))
                {
                    $res1 = $jiulujing.'/'.$res;
                    $res2 = $xinlujing.'/'.$wenjianjia.'/'.$res;
                    copy($res1, $res2);

                }else
                {
                    $res1 = $jiulujing.'/'.$res;
                    $res2 = $xinlujing.'/'.$wenjianjia;
                   $this->fuzhidir($res1,$res2);
                }
            }
        }
    }

    public function jianqie($wenjian,$lujing)
    {
        if(is_file($wenjian)) {
            if (copy($wenjian, $lujing)){
                echo "<script>alert('复制成功');location.href='/wenjianxitong/index.php';</script>";
            } else {
                echo "<script>alert('复制失败');location.href='/wenjianxitong/index.php';</script>";
            }
        }else{
            echo "<script>alert('复制失败');location.href='/wenjianxitong/index.php';</script>";
        }
    }



}
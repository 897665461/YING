<?php

function lianjie()
{
    $dsn = 'mysql:host=127.0.0.1;dbname=image';
    $pdo = new \PDO($dsn, 'root', 'root');
    return $pdo;

}
/*
 * 将图片上传到指定文件夹
 * */
function jieshoutupian($tupianxinxi)
{
    $wenjian = '';
    if ($tupianxinxi['error'] > 0) {
        switch ($tupianxinxi['error']) {
            case 1;
                echo '图片' . "上传的文件过大";
                break;
            case 2;
                echo '图片' . "上传的文件过大";
                break;
            case 3;
                echo '图片' . "网络出现问题";
                break;
            case 4;
                echo '图片' . "未选中";
                break;
        }
        }else{
            $file = $tupianxinxi['name'];
            move_uploaded_file($tupianxinxi['tmp_name'],'.\wenjian\\'.$file);
            $wenjian = $file;
        }
    return $wenjian;
}
/*
 * 给图片加水印
 * */
function shuiyin($wenjian)
{
    $lujing = 'wenjian/'.$wenjian;
    $tuxinxi = getimagesize($lujing);

    $w = $tuxinxi[0]-80;
    $h = $tuxinxi[1]-30;
    $shuiyin = imagecreatefrompng('wenjian\shuiyin.png');
   switch($tuxinxi[2])
   {
       case 1:

           $im = imagecreatefrompng($lujing);
           imagecopymerge($im,$shuiyin,$w,$h,0,0,80,30,50);
           imagegif($im,$lujing);
           break;
       case 2:
           $im = imagecreatefromjpeg($lujing);
           imagecopymerge($im,$shuiyin,$w,$h,0,0,80,30,50);
           imagejpeg($im,$lujing);
           break;
       case 3:
           $im = imagecreatefrompng($lujing);
           imagecopymerge($im,$shuiyin,$w,$h,0,0,80,30,50);
           imagepng($im,$lujing);
           break;
   }

}
/*
 * 调整图片的长宽比例
 * */
function bili($wenjian,$bizhi)
{
    $lujing = 'wenjian/'.$wenjian;
    $tuxinxi = getimagesize($lujing);
    $hl = $tuxinxi['1'];
    $wl = $tuxinxi['0'];

    $bizhi = explode('*',$bizhi);
    $h = $bizhi['0'];
    $w = $bizhi['1'];
    $im = imagecreatetruecolor($w,$h);

    switch($tuxinxi[2])
    {
        case 1:

            $imy = imagecreatefrompng($lujing);
            imagecopyresampled($im,$imy,$w,$h,0,0,$w,$h);
            imagegif($im,$lujing);
            break;
        case 2:
            $imy = imagecreatefromjpeg($lujing);
            imagecopyresampled($im,$imy,0,0,0,0,$w,$h,$wl,$hl);
            imagejpeg($im,$lujing);
            break;
        case 3:
            $imy = imagecreatefrompng($lujing);
            imagecopyresampled($imy,$imy,$w,$h,0,0,$w,$h);
            imagepng($im,$lujing);
            break;
    }
}
function db($mingzi,$miaoshu)
{
    $sql = "insert into im VALUES ('','$mingzi','$miaoshu')";
    $pdo = lianjie();
    $res =  $pdo->query($sql);
    if(!$res)
    {
        echo "<script>alert('保存失败');</script>";
    }
    echo "<script>alert('保存成功');window.location.href='/i/index.php';</script>";

}

$tupianxinxi = $_FILES['upload'];
$filename = jieshoutupian($tupianxinxi);//上传到指定文件夹

if($_POST['mark']==1){                 //加水印程序
    shuiyin($filename);
}

bili($filename,$_POST['scale']);       //调整文件大小

db($filename,$_POST['info']);


echo "<script>alert('上传成功');window.location.href='/i/index.php'</script>";

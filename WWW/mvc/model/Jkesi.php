<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");//禁止提示未定义类的notice
$id = $_GET['id'];
$shuliang = intval($_GET['shuliang']);

$host = '127.0.0.1';
$username = 'root';
$password = 'root';
$dbname = 'mall';
$connid = mysqli_connect($host,$username,$password,$dbname);
if($connid)
{
    //echo '连接数据库成功';
}



if($_GET['zhiling'] =='update')
{

    $result = mysqli_query($connid, "update mall_gouwuche set shuliang='$shuliang' where id='$id'");

    if ($result)
    {
        echo '添加成功';
    }
}

if($_GET['zhiling'] =='jianyi')//这样写就可以可以，要是和上面共用一个if里的内容就不可以
{


    $result = mysqli_query($connid, "update mall_gouwuche set shuliang='$shuliang' where id='$id'");

    if ($result)
    {
        echo '更改成功';
    }
}

if($_GET['zhiling'] =='shanchu') {

           $result = mysqli_query($connid, "delete from mall_gouwuche where id='$id'");
           if ($result)
           {
               echo '删除成功';
           }
}
//如果下面的语句下在下面会提示50 行的语法错误，致命的
/*
if($_GET['zhiling'] =='shanchusss') {
    echo 99999999;
    $result = mysqli_query($connid, "delete from mall_gouwuche");
    if ($result)
    {
        echo '删除成功';
    }
*/







?>
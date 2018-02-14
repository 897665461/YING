<?php
$host = '127.0.0.1';
$username = 'root';
$password = 'root';
$dbname = 'mall';
$connid = mysqli_connect($host,$username,$password,$dbname);
if($connid)
{
    //echo '连接数据库成功';
}



    $result = mysqli_query($connid, "delete from mall_gouwuche");
    if ($result)
    {
        echo '提交订单成功1';
    }




?>
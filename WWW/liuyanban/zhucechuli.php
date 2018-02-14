<meta charset="utf-8">
<?php
//连接数据库
$host = '127.0.0.1';
$username = 'root';
$password = 'root';
$dbname = 'yonghu';
$connid = mysqli_connect($host,$username,$password,$dbname);
if($connid)
{

}

//获取注册信息
$yonghuming = $_POST['yonghuming'];
$mima = $_POST['mima'];
$info = mysqli_query($connid,"select * from mima where yonghuming ='$yonghuming'");
var_dump($info);
 $result = mysqli_fetch_array($info);
var_dump($result);

if($result)
{  echo 00;
       echo "<script>alert('用户名已存在');location.href='zhuce.php'</script>";
}
else
{
    $r = mysqli_query($connid,"insert into mima values('$yonghuming','$mima')");
    echo 0;
    if($r)
    {
        echo "<script>alert('注册成功');location.href='../liuyanban/denglu.php'</script>";
    }
//登录信息

}



?>
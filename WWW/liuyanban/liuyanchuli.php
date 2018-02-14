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
    echo '连接数-据库成功';
}

//留言内容上传数据库
$yonghuming = $_COOKIE['yonghuming'];
$content = $_POST['content'];
$title = $_POST['title'];
$r = mysqli_query($connid,"insert into yonghubiao values('$yonghuming','$title','$content')");
//从数据库中调出留言内容

echo"<script>alert('留言成功');location.href='index.php'</script>";

?>
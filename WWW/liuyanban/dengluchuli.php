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

//登陆处理


    $yonghuming = $_POST['yonghuming'];
    $mima = $_POST['mima'];
    setcookie(yonghuming, $yonghuming);
    setcookie(mima, $mima);


    echo '<br>';
    $info = mysqli_query($connid, "select * from mima where yonghuming='$yonghuming'");
    $info2 = mysqli_query($connid, "select * from mima where mima='$mima'");
    $result = mysqli_fetch_array($info2);
    if ($yonghuming && $mima) {
        if ($info) {
            if ($result[1] == $mima) {
                echo "<script>alert('登陆成功');location.href = 'index.php'</script>";
            } else {
                echo "<script>alert('登陆失败');location.href = 'denglu.php'</script>";
            }
        } else {
            echo "<script>alert('登陆失败');location.href = 'denglu.php'</script>";
        }
    } else {
        echo "<script>alert('登陆失败');location.href = 'denglu.php'</script>";
    }

?>

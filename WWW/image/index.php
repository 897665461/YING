<?php
define('ROOT',pathinfo(__FILE__,PATHINFO_DIRNAME));//定义入口文件路径

function lianjie()
{
    $dsn = 'mysql:host=127.0.0.1;dbname=image';
    $pdo = new \PDO($dsn, 'root', 'root');
    return $pdo;

}

/*
 * 取出指定页码的数据
 * */
function qutupian($yema)
{

    $pdo = lianjie();
    $sql = "select * from im";
    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $tiaoshu = count($data);
    $yeshu = ceil($tiaoshu/9);
    $xinwen['tiaoshu'] = $yeshu;

    $kaishi = ($yema-1)*9;
    $sql = "select * from im ORDER BY id DESC limit $kaishi,9 ";
    $stmt = $pdo->query($sql);
    while($data = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $xinwen[] =$data;
    }
    return $xinwen;
}
function sousuo($miaoshu)
{
    $pdo = lianjie();
    $sql = "select * from im where miaoshu=$miaoshu";
    $stmt = $pdo->query($sql);
    while($data = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $xinwen[] =$data;
    }return $xinwen;
}

$yema = empty($_GET['yema'])?1:$_GET['yema'];
var_dump($yema);

$xinxi = qutupian($yema);
$yeshu = array_shift($xinxi);
$tupian = $xinxi;

if(isset($_GET['key'])) {
    $tupian = sousuo($_GET['key']);
    if(empty($tupian))
    {
        echo "<script>alert('搜索内容为空');window.location.href='/i/index.php'</script>";
    }

}
require_once ROOT.'\index.html';

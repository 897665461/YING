<?php
//图像的显示以及旋转
$imagelist = array('./1.png',
    './2.jpg',
    './3.jpg',
    './4.png',
    './5.png',
    './6.jpg',
    './7.jpg');

$imagekey =  array_rand($imagelist);//随机取得数组的键名

$image = $imagelist[$imagekey];
$info = getimagesize($image);

switch ($info['2'])
{
    case 1:
        $im = imagecreatefromgif($image);
        break;
    case 2;
        $im = imagecreatefromjpeg($image);
        break;
    case 3:
        $im = imagecreatefrompng($image);
        break;
    case 4;
        echo '文件不支持';
        break;
}
$back = imagecolorallocate($im,100,100,100);
$im = imagerotate($im,mt_rand(0,360),$back);

ob_clean();
header('Content-type:'.$info['mime']);

switch ($info['2'])
{
    case 1:
        imagegif($im);
        break;
    case 2;
        imagejpeg($im);
        break;
    case 3:
        imagepng($im);
        break;
    case 4;
        echo '文件不支持';
        break;
}
//imagejpeg($im); $image = './2.jpg';
$im =  imagecreatefromjpeg($image);
$eight = imagesx($im);
$height = imagesy($im);
$w = $weight*0.1;
$h = $height*0.1;
$des = imagecreatetruecolor($w,$h);
$desq = imagecreatetruecolor($w,$h);
imagecopyresampled($desq,$im,0,0,0,0,$w,$h,$weight,$height)
imagecopyresampled($des,$im,0,0,0,0,$w,$h,$weight,$height);
header('Content type:image/jpeg');
//imagejpeg($desq,null,75);
header('Content type:image/png');
imagepng($des,'897.png',7);
 $im = imagecreatefromjpeg('./2.jpg');
$q = imagecreatefrompng('./4.png');
imagecopymerge($im,$q,230,300,20,20,100,100,50);
header('Content type:image/png');
imagepng($im,null,7);
 $image =  imagecreatetruecolor(500,500);//创建画布

  $q = imagecolorallocate($image,mt_rand(0,255),100,100);//在画布上创建颜色

  $w = imagecolorallocate($image,mt_rand(0,255),20,20) ;//在画布上创建颜色

  imagefill($image,0,0,$q);//在画布上画满颜色

  imagestring($image,10,0,0,mt_rand(0,500),$w);//画布上写字

header('Content:type:image/png');
imagepng($image);//显示在浏览器中
for($i=1;$i<100000;$i++) {
    imagesetpixel($im, mt_rand(50, 400), mt_rand(50, 400), $black);
}$im = imagecreatetruecolor(mt_rand(100,800),mt_rand(100,800));
$back = imagecolorallocate($im,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
imagefill($im,0,0,$back);
for($i=1;$i<120;$i++) {
    imagesetthickness($im,mt_rand(0,10));
    $black = imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));

    $style = array($back,$black);//自定义线段的格式的数组
    imagesetstyle($im,$style);//设定线段的格式
    imageline($im, mt_rand(0, 400), mt_rand(0, 400), mt_rand(0, 400), mt_rand(0, 400),IMG_COLOR_STYLED);//使用自定义的线段
}
header('Content type:image/png');
imagepng($im); $im = imagecreatetruecolor(mt_rand(100,800),mt_rand(100,800));

$back = imagecolorallocate($im,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
imagefill($im,0,0,$back);
$black = imagecolorallocate($im,50,50,50);
imagerectangle($im,0,0,mt_rand(20,400),100,$black);
imageellipse($im,mt_rand(20,400),100,mt_rand(20,400),50,$black);
header('Content type:image/png');
imagepng($im);class GD
{
    protected static $_cheack;
    protected static function check()
    {
        //检查GD库是否加载
        if(!function_exists("gd_info"))
        {
            throw new\Exception('GD is not exists');

        }
    }
}
class CaptchA extends GD//验证码类库
{
    protected $_width = 60;//宽度
    protected $_height = 25;//高度
    protected $code = 'ASDFSFRETRETTTREYRTgdfgdfgdfgfdgfd45454545654';


    public function __construct()
    {
        self::check();
    }

    public function create($width,$height)//创建画布函数
    {
        $this->_width = is_numeric($width)?$width:$this->_width;

        $this->_height = is_numeric($height)?$height:$this->_height;

        $im = imagecreatetruecolor($this->_width,$this->_height);

        $back = imagecolorallocate($im,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));

        imagefill($im,0,0,$back);

        $this->_im = $im;
    }

    public function string($lenth = 4,$fontsize = 30)
    {
        for($i=0;$i<$lenth;$i++)
        {
            $q = substr($this->code,mt_rand(0,strlen($this->code)),1);
            $this->auth_code.=$q;

            $strcolor = imagecolorallocate($this->_im,50,50,50);
            $font_file = './89.ttf';
            imagefttext($this->_im,$fontsize,mt_rand(0,10),(15*$i),20,$strcolor,$font_file,$q);//画布 字号 角度 位置x 位置y 颜色 字体 字符串

        }
    }

    public function moll($time)
    {
        for($i=0;$i<$time;$i++)
        {
            $strcolor = imagecolorallocate($this->_im, 50, 50, 50);
            imagesetpixel($this->_im, mt_rand(0, 60), mt_rand(0, 25),$strcolor);
            imageline($this->_im, mt_rand(0, 60), mt_rand(0, 25), mt_rand(0, 60), mt_rand(0, 25), $strcolor);
        }
    }

    public function show()
    {
        header('Content type:image/png');
        imagepng($this->_im);
    }
}
$q = new CaptchA;
$q->create('t','y');
$q->string();//写字
$q->moll(3);//防伪  即加入点和线
$q->show();//显示
?>

<!DOCTYPE html>
<html>
<head>
    <meta  http-equiv="content-type" content="text/html" charset="UTF-8" />
    <title>Title</title>//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要
    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>//这个网址很重要
</head>//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要
<body>//这个网址很重要<title>Title</title>//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>//这个网址很重要
</head>//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要
<body>//这个网址很重要<title>Title</title>//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>//这个网址很重要
</head>//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要//这个网址很重要
<body>//这个网址很重要
<table id='ta4ble' cellspacing="0" cellpadding="0" border="1");
">
<tr>
    <th>ID</th>
    <th>标题</th>
    <th>内容</th>
    <th>留言者</th>
</tr>
<?php
$host = '127.0.0.1';
$username = 'root';
$password = 'root';
$dbname = 'yonghu';
$connid = mysqli_connect($host,$username,$password,$dbname);
if($connid)
{
}
$result = mysqli_query($connid,"select * from yonghubiao limit 1,3");
while( $jieguo = mysqli_fetch_array($result) )
{
    ?>
    <tr>
        <td><?php

            ?>
        </td>
        <td><?php
            echo $jieguo['biaoti'];
            ?>
        </td>
        <td><?php
            echo $jieguo['neitong'];
            ?></td>
        <td><?php
            echo $jieguo['yonghuming'];
            ?></td>
    </tr>
<?php } ?>
</table>
<button id="dian">加载更多</button>
<button id="show" onmousemove="javascript: var su = ($('tr').length-1);
    alert(su);">显示条数</button>

<script>

    $('#dian').click(function() {
        var su = ($('tr').length-1);
        $.get('/qwe.php', {name: su}, function (date) {

            alert(date);
            $('table').append(date);

        }, 'json');
    });

</script>
</body>
</html><?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
    $host = '127.0.0.1';
    $username = 'root';
    $password = 'root';
    $dbname = 'yonghu';
    $connid = mysqli_connect($host,$username,$password,$dbname);
   $b = $_GET['name'];
   $c = ($b+3);

    if($connid)
    {

        $result = mysqli_query($connid,"select * from yonghubiao limit $b,$c");
        while( $jieguo = mysqli_fetch_array($result) )
        {
            $q.='<tr><td></td><td>'.$jieguo['biaoti'].'</td><td>'.$jieguo['neitong'].' </td><td>'.$jieguo['yonghuming']. '</td></tr>';
        }
    }
echo json_encode($q);
?>
<!DOCTYPE html>
<html>
<head>
    <meta  http-equiv="content-type" content="text/html" charset="UTF-8" />
    <title>Title</title>
    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?php
//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统
//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统
//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统
//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统
//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统
//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统
//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统
//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统
//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统//简易的分页系统
$host = '127.0.0.1';//简易的分页系统
$username = 'root';
$password = 'root';
$dbname = 'yonghu';
$connid = mysqli_connect($host,$username,$password,$dbname);
if($connid)
{

}

if(isset($_GET['yeshu'])){$yeshu = $_GET['yeshu']; }else{$yeshu = 1;}
$q = $yeshu*3;
$w = $q-2;
$result = mysqli_query($connid,"select * from yonghubiao limit $w,3");
if($result)
{
    echo '<table><tr><td>用户名</td><td>标题</td><td>内容</td></tr>';
    while($jieguo = mysqli_fetch_array($result))
    {
        echo "<tr><td>".$jieguo['yonghuming']."</td><td>".$jieguo['biaoti']."</td><td>".$jieguo['neirong']."</td> </tr>";
    }
    echo '</table>';
}
?>
<a href='index.php?yeshu=<?php echo 1; ?>'>第一页</a>
<a href='index.php?yeshu=<?php echo ($yeshu-1); ?>'>上一页</a>
<a href='index.php?yeshu=<?php echo ($yeshu+1); ?>'>下一页</a>
<a href='index.php?yeshu=<?php echo 5; ?>'>最后一页</a>
</body>
</html>
$dsn = "mysql:host=localhost;dbname=mall";   //用pdo的方式链接数据库
$pdo = new PDO($dsn,'root','root');

$pdo->exec('set names utf8');                   //设置字符集

$sql = 'SELECT * FROM mall_kecheng';             //查询信息的语句

$reult = $pdo->query($sql);                        //执行语句 存放到变量中

while($date = $reult->fetch())
{
echo '<pre>';
var_dump($date);
echo '</pre>';
}$result = $mysqli->query('select * from mall_kecheng');
while($shuzu = $result->fetch_array(MYSQLI_ASSOC))          //设置成关联数组，默认是混合数组
{
echo '<pre>';
    var_dump($shuzu);
    echo '</pre>';
}

<?php   //有问题的
$mysqli = new  mysqli('localhost','root','root','mall');
$mysqli->autocommit(false);
$result = $mysqli->query("insert into mall_gouwuche values('','1','1','2')");
var_dump($result);
$mysqli->rollback();
$mysqli->commit();
?>
<?php  //预处理的查询操作/预处理的查询操作/预处理的查询操作/预处理的查询操作/预处理的查询操作/预处理的查询操作/预处理的查询操作/预处理的查询操作/预处理的查询操作/预处理的查询操作/预处理的查询操作/预处理的查询操作
$mysqli = new mysqli('localhost','root','root','mall');

$sql = "insert into mall_gouwuche value('',?,?,?)";
$stmt = $mysqli->prepare($sql);

$q = '1';
$w = '1';
$e = 1;
$stmt->bind_param('ssi',$q,$w,$e);

$q = '9';
$w = '9';
$e =91;

$stmt->bind_param('ssi',$q,$w,$e);

$stmt->execute();

?>
$mysqli = new mysqli('localhost','root','root','mall');    //连接数据库

$sql = "select * from mall_gouwuche limit ?";                 //将要执行的数据库语句

$stmt = $mysqli->prepare($sql);                                 //执行数据库语句

$number = 9;

$stmt->bind_param('i',$number);

$stmt->bind_result($id,$name,$price,$quantity);

$stmt->execute();

while($stmt->fetch()) {
var_dump($id);
echo '<br/>';
}
$pdo = new PDO("mysql:host=localhost;dbname=student","root","root");
if($pdo)
{
echo "连接成功";
}

$pdo->beginTransaction();

$pdo->exec("insert into qwe VALUES ('90')");
$pdo->commit();
$shuzu1=[1,2,3];
$shuzu2=[4,5,6];
$shuzu3=[7 ,8,9];
qw($shuzu1,$shuzu2,$shuzu3);

function qw()
{
$shuzu = func_get_args();
$q = count($shuzu[0]);
for($i=0;$i<$q;$i++)
{
$sum[$i]=$shuzu[0][$i];
}

$cishu = count($shuzu);
for($j=1;$j<$cishu;$j++)
{
$q = count($sum);
$w = count($shuzu[$j]);

for($i=$q;$i<$q+$w;$i++)
{
$sum[$i]=$shuzu[$j][$i-$q];
}
}
var_dump($sum);
}
<?php

/*

print_r($_SERVER['SERVER_ADDR']); echo '<br/>';
print_r($_SERVER['SERVER_NAME']);echo '<br/>';
print_r($_SERVER['REQUEST_TIME']);echo '<br/>';
print_r($_SERVER['REQUEST_URI']);echo '<br/>';
//print_r($_SERVER['HTTP_REFERER']);
print_r($_SERVER['REMOTE_ADDR']);echo '<br/>';
print_r($_SERVER['PATH_INFO']);echo '<br/>';
print_r($_SERVER['QUERY_STRING']);
*/
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type"  content="text/html"; charset="UTF-8">
    <title>实验</title>
    <script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js">
    </script>
</head>
<body>
<form name="wenjian" enctype="multipart/form-data" method="post" action="image.php">
    选择文件:<input type="file" name="wenjian">
    <input type="submit" value="提交">
</form>

</body>
</html>
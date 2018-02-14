<?php
class Database
{
    function zhucexinxi()
    {
        //连接数据库
        $mysqli = new mysqli('localhost','root','root','student');
        if($mysqli)
        {
          //  echo '连接成功';
        }

        $xingming  =  $_POST['xingming'];
        $xuehao   = $_POST['xuehao'];
        $youxiang =  $_POST['youxiang'];
        $jinqian  = $_POST['jinqian'];
        $touxiang = $_POST['t'];                       //图片的信息传递不过来，是怎么回事？
        var_dump($_POST['t']);
        $jianjie  =  $_POST['jianjie'];

       $result =  $mysqli->query("insert into student_xinxi values ('','$xingming','$xuehao','$youxiang','$jinqian','$touxiang','$jianjie')");

       if($result)
       {
           echo "<script>alert('添加成功')</script>";
       }


        $_SESSION['name'] = $xingming;
        echo "<script>alert('登陆成功')</script>";
        require_once('model/Database.php');       //包含数据库模型
        $object = new database();
        $object->yonghuxinxi();

        require_once('view/index.html');


    }
    function denglujiancha()
    {

        //连接数据库
        $mysqli = new mysqli('localhost','root','root','student');
        if($mysqli)
        {
             //echo '连接成功';
        }
        $xingming = $_POST['xingming'];
        $result = $mysqli->query("select xuehao from student_xinxi where xingming='$xingming'");
        $jieguo = $result->fetch_array();

        if($_POST['xuehao']==$jieguo['xuehao'] )
        {
            echo "<script>alert('登陆成功')</script>";
           // require_once('view/index.html');

            $_SESSION['name'] = $xingming;
            setcookie('name',$xingming);

            require_once('model/Database.php');       //包含数据库模型
            $object = new database();
            $object->yonghuxinxi();
            require_once('view/index.html');
        }
        else
        {
            echo "<script>alert('登陆失败')</script>";
            require_once('view/denglu.html');
        }
    }
    function tuichuxiaohui()
    {
        unset($_SESSION['name']);
        echo "<script>alert('成功退出');</script>";
    }
    function yonghuxinxi()
    {
        //连接数据库
        $mysqli = new mysqli('localhost','root','root','student');
        if($mysqli)
        {
            //  echo '连接成功';
        }

       $result = $mysqli->query("select * from student_xinxi");

        $_SESSION['result'] = $result;
        $_SESSION['resultq'] = $result;

    }
    function sousuochuli()
    {
        //连接数据库
        $mysqli = new mysqli('localhost','root','root','student');
        if($mysqli)
        {
            // echo '连接成功';
        }
        $xingming = $_GET['sousuo'];
       $_SESSION['result'] =  $mysqli->query("select * from student_xinxi where xingming='$xingming'");
    }
    //转账的处理
    function zhuanzhangchuli()
    {
        //var_dump($_SESSION['name']);   //老师，直接这样写为什么不能显示出来？

        var_dump($_POST['jine']);  //钱数
        var_dump($_POST['renming']);//收钱人
        var_dump($_COOKIE['name']);//出钱人

        $qianshu = $_POST['jine'];
        $chuqian = $_COOKIE['name'];
        $shouqian = $_POST['renming'];

       $pdo = new PDO("mysql:host=localhost;dbname=student","root","root");

        $pdo->beginTransaction();

        $result = $pdo->query("select jinqian from student_xinxi  where xingming= '$chuqian' ");

        $res1 = $result->fetch(PDO::FETCH_ASSOC);
        $chuqianq= $res1['jinqian'];
        $result = $pdo->query("select jinqian from student_xinxi  where xingming= '$shouqian' ");

        $res2 = $result->fetch(PDO::FETCH_ASSOC);
        $shouqianq = $res2['jinqian'];

        $shouqianq = intval($shouqianq)+intval($qianshu);
        $chuqianq =intval($chuqianq)+intval($qianshu);




        $result1 = $pdo->exec("update student_xinxi set jinqian='$chuqianq' where xingming= '$chuqian'");
        $result2 = $pdo->exec("update student_xinxi set jinqian='$shouqianq' where xingming= '$shouqian'");
        if($result1 && $result2)
        {
            $pdo->commit();
        }
       else
       {
           $pdo->rollBack();
       }

    }
}



?>
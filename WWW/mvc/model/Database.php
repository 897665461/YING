<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");//禁止提示未定义类的notice
class Database
{    //将添加课程页面中的信息添加到数据库中
    function tianjiakecheng($kechengmingcheng, $kechengjiage, $suoshufangxiang, $kechengjianjie, $kechengjibie)
    {
        //连接数据库
        $host = '127.0.0.1';
        $username = 'root';
        $password = 'root';
        $dbname = 'mall';
        $connid = mysqli_connect($host, $username, $password, $dbname);
        if ($connid) {
            //echo '连接数据库成功';
        }
        //存入数据库

        $result = mysqli_query($connid, "insert into mall_kecheng values('','$kechengmingcheng','$kechengjiage','$suoshufangxiang','$kechengjianjie ','$kechengjibie')");
        if ($result) {
            echo "<script>alert('添加成功')</script>";
        }
    }

    //将课程信息从数据库中取出
    function zhanshikecheng()
    {
        //连接数据库
        $host = '127.0.0.1';
        $username = 'root';
        $password = 'root';
        $dbname = 'mall';
        $connid = mysqli_connect($host, $username, $password, $dbname);
        if ($connid) {
            //echo '连接数据库成功';
        }
        //取出数据所有类别的

        session_start();                                //开始会话 和 不开始会话有相当大到区别
        if ($_GET['yeshu']) {
            $_SESSION['yeshu'] = $_GET['yeshu'];       //如果有输入页码，将新页码赋值

        }

        if ($_GET['zhonglei']) {
            $_SESSION['zhonglei'] = $_GET['zhonglei'];  //如果有种类的输入，将新种类赋值，否则保持原有种类

        }


        if ($_GET['yeshu']) {
            $_SESSION['yeshu'] = '1';

            $yeshu = ($_SESSION['yeshu'] * 5);
            $yeshus = ($yeshu - 4);

            $e = $_SESSION['zhonglei'];//有页数的输入，则必然没有种类的输入改变，
            $result = mysqli_query($connid, "select * from  mall_kecheng where direction='$e' limit " . $yeshus . ",5");//limit中有变量要很注意，变量不要用“”引起来
            $resultq = mysqli_query($connid, "select * from  mall_kecheng where direction='$e'");
            $_SESSION['kecheng'] = $result;
        } else {
            if ($_GET['zhonglei']) {
                $_SESSION['yeshu'] = '1';
                $yeshu = ($_SESSION['yeshu'] * 5);
                $yeshus = ($yeshu - 4);
                $e = $_SESSION['zhonglei'];
                $result = mysqli_query($connid, "select * from  mall_kecheng where direction='$e' limit " . $yeshus . ",5");
                $resultq = mysqli_query($connid, "select * from  mall_kecheng where direction='$e'");
                $_SESSION['kecheng'] = $result;
            } else {
                $result = mysqli_query($connid, "select * from  mall_kecheng limit 1,5");
                $resultq = mysqli_query($connid, "select * from  mall_kecheng");
                $_SESSION['kecheng'] = $result;
            }

        }
        //用来测试页数和种类得改变是否符合用户需求
        $tiaoshu = mysqli_num_rows($resultq);
        //var_dump($tiaoshu);
        $yeshusum = ceil($tiaoshu / 5);
        $_SESSION['yeshusum'] = $yeshusum;

    }

    //课程列表分页系统
    function fenye()
    {
        echo "<nav class='text-center'>
              <ul class=\"pagination\">";
        if ($_SESSION['yeshu'] > 1) {
            echo "<li> <a href='http://localhost/mvc/index.php/ListController/listt?yeshu=" . ($_SESSION['yeshu'] - 1) . "'>上一页</a></li>";
        }
        for ($i = 1; $i <= $_SESSION['yeshusum']; $i = $i + 1) {
            echo "<li> <a href='http://localhost/mvc/index.php/ListController/listt?yeshu=" . $i . "'>" . $i . "</a> </li>";
        }
        if ($_SESSION['yeshu'] < $_SESSION['yeshusum']) {
            echo " <li>
                <a href='http://localhost/mvc/index.php/ListController/listt?yeshu=" . ($_SESSION['yeshu'] + 1) . "'>下一页</a>
            </li>";
        }
        echo " <li>当前第" . $_SESSION['yeshu'] . "页</li>
            <li>共" . $_SESSION['yeshusum'] . "页</li>
        </ul>
    </nav>";
    }

    //将课程列表中选定的课程信息加入到购物车
    function jiarugouwuche()
    {
        $host = '127.0.0.1';
        $username = 'root';
        $password = 'root';
        $dbname = 'mall';
        $connid = mysqli_connect($host, $username, $password, $dbname);
        if ($connid) {
            //echo '连接数据库成功';
        }
        // var_dump($_GET['kechengmingzi']);//

        $e = $_GET['kechengmingzi'];                                //这种情况下一刷新购物车页面就会把上一次的课程有一次添加到购物车          //这种情况下一刷新购物车页面就会把上一次的课程有一次添加到购物车     //这种情况下一刷新购物车页面就会把上一次的课程有一次添加到购物车  //这种情况下一刷新购物车页面就会把上一次的课程有一次添加到购物车
        $result = mysqli_query($connid, "select * from  mall_kecheng where name='$e' ");//这种情况下一刷新购物车页面就会把上一次的课程有一次添加到购物车
        $kecheng = mysqli_fetch_array($result);
        // var_dump($kecheng['name']);//
        //var_dump($kecheng['price']);//
        $kechengmingcheng = $kecheng['name'];
        $kechengjiage = $kecheng['price'];
        if ($kechengmingcheng != '' || $kechengjiage != '') {
            $result = mysqli_query($connid, "insert into mall_gouwuche values('','$kechengmingcheng','$kechengjiage','1')");
        }
    }

    function zhanshigouwuche()
    {
        $host = '127.0.0.1';
        $username = 'root';
        $password = 'root';
        $dbname = 'mall';
        $connid = mysqli_connect($host, $username, $password, $dbname);
        if ($connid) {
            // echo '连接数据库成功';
        }
        //session_start();
        $_SESSION['jieguo'] = mysqli_query($connid, "select * from  mall_gouwuche");
    }
    //提交订单
    function tijiaodingdan()
    {
        $host = '127.0.0.1';
        $username = 'root';
        $password = 'root';
        $dbname = 'mall';
        $connid = mysqli_connect($host, $username, $password, $dbname);
        if ($connid) {
            // echo '连接数据库成功';
        }

        /*session_start();      为什么这种形式不能传递变量，那我用下cookie
        $_SESSION['kechengid'] = '999';
        echo $_SESSION['kechengid'];*/

        $result = mysqli_query($connid, "insert into mall_dingdan values('','1','1')");
       if($result)
       {
             echo '添加成功';
       }



    }
    // 清空购物车

    /*
    function qingkonggouwuche()
    {
        $host = '127.0.0.1';
        $username = 'root';
        $password = 'root';
        $dbname = 'mall';
        $connid = mysqli_connect($host, $username, $password, $dbname);
        if ($connid) {
           // echo '连接数据库成功';
        }
        $result = mysqli_query($connid, "delete from mall_gouwuche");
        if($result)
        {
            echo('清空成功');
        }

    }
*/

}


?>
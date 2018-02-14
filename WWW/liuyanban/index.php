<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>留言板</title>
    <style type="text/css">
        *{margin:0px;padding:0px;}
        body{background:#eee;}
        #bdy{width:414px;height:736px;margin:0 auto;margin-top:20px;
            background:#66CDAA;
        }
        #top{font-family:"隶书";font-size:30px;text-align:center;/*margin-top:18px;*/
            color:#f60;}
        .a{text-decoration:none;color:#fff;float:right;padding-right:15px;}
        .a:hover{color:red;}
        #cont{width:414px;height:736px;margin:0 auto;margin-top:20px;}
        #left{width:350px;height:300px;margin-top:80px;margin-left:15px;/*float:left;*/
            background:#48D1CC;padding-left:5px;}

        #right{width:360px;height:200px;margin-top:20px;background:#48D1CC;
            margin-left:15px;/*float:left;*/}
        h5{text-align:center;margin-top:15px;margin-bottom:20px;}
        #sub{width:120px;height:25px;margin-top:15px;}
        #sub:hover{background:#AFEEEE;}
        .span{font-size:18px;color:red;font-weight:bold;}
        table{width:360px;margin:0 auto;margin-top:15px;border:1px solid #eee;}
        td{text-align:center;}
        #td a{text-decoration:none;color:#eee;}
        #td a:hover{color:red;}
    </style>
</head>
<body>
<div id="bdy">
    <div id="top">留言板</div>
    <a href="\liuyanban\denglucheck.php" class="a">登录</a>
    <a href="\liuyanban\zhuce.php" class="a">注册</a>
    <div id="cont">
        <div id="left">
            <h5>写留言</h5>
            <form method="post" action="liuyanchuli.php">
                标题：<input type="text" placeholder="请输入标题" name="title">
                </br></br>
                内容：<textarea cols="40" rows="5" name="content"></textarea>
                </br></br>
                <input type="submit" value="添加留言" id="sub">
            </form>
        </div>
        <div id="right">
            <table cellspacing="0" cellpadding="0" border="1">
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>内容</th>
                    <th>留言者</th>
                </tr>
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
                $result = mysqli_query($connid,"select * from yonghubiao");
                $sum = mysqli_num_rows($result);


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
                <?php
                }
                ?>
                <tr>
                    <td colspan="4" id="td">
                        <a href="">首页</a>
                        <a href="">上一页</a>
                        <a href="">下一页</a>
                        <a href="">末页</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>
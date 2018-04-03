<?php
namespace model;
class Db extends \PDO
{
    static public $pdo;
    /*
     * 用pdo的方式连接数据库
     * */
    public function __construct()
    {
        if(!isset(self::$pdo)){
            $dsn = 'mysql:host=127.0.0.1;dbname=gongzuo';
            $pdo = new \PDO($dsn, 'root', 'root');
            self::$pdo = $pdo;
        }
    }
    /**
     * 验证用户名密码是否匹配
     * 匹配返回true，否则false
     * */
    public function password($user,$password)
    {
        $stmt = self::$pdo->query("select password from user WHERE user=$user");
        $arr = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($password==$arr['password']){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 输入用户名密码
     * 成功输入数据库
     * 返回true否则返回false
     * */
    public function cunru($user,$password)
    {
        $stmt =  self::$pdo->query("select password from user WHERE USER=$user");
        $arr = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!empty($arr)){
            return false;
        }else{
            $res = self::$pdo->query("insert into user VALUES ('',$user,$password)");
            if(!$res)
            {
                echo "<script>alert('添加失败');</script>";
            }

            return true;
        }
    }
    /*
     * 输入用户名，将其保存的session中
     * */
    public function huihua($user)
    {
        $_SESSION['user'] = $user;
    }
    /*
     * 通过检查session，来验证是否登陆
     * 未登录返回主页面
     * */
    public function jiancha()
    {
        if(!isset( $_SESSION['user']))
        {
            echo"<script>alert('非网站管理员，请使用浏览模式');window.location.href='http://localhost/gongzuo/index.php';</script>";
        }
    }
    /*
     * 返回数据库中的简介
     * */
    public function qujianjie()
    {
        $stmt =  self::$pdo->query("select * from jianjie ");
        $arr = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $arr['jianjie'];
    }
    public function cunjianjie($jianjie)
    {
        $res = self::$pdo->query("delete from jianjie ");
        if(!$res)
        {
            echo "<script>alert('删除失败');</script>";
        }
       $res = self::$pdo->query("insert into jianjie VALUES ($jianjie)");
        if(!$res)
        {
            echo "<script>alert('添加失败');</script>";
        }
    }
    /*
     * 把图片存入到文件夹wenjian中
     * 以/为间隔字符串的形式返回每个文件的名字
     * */
    public function jieshoutupian($tupianxinxi)
    {
        $wenjian = '';
        $x = count($tupianxinxi['name']);
        for($i=0;$i<$x;$i=$i+1) {
            if ($tupianxinxi['error'][$i] > 0) {
               switch ($tupianxinxi['error'][$i]) {
                   case 1;
                       $y = $i + 1;
                       echo '图片' . "{$y}上传的文件过大";
                       break;
                   case 2;
                       $y = $i + 1;
                       echo '图片' . "{$y}上传的文件过大";
                       break;
                   case 3;
                       $y = $i + 1;
                       echo '图片' . "{$y}网络出现问题";
                       break;
                   case 4;
                       $y = $i + 1;
                       echo '图片' . "{$y}未选中";
                       break;
               }
            }else{
                $file = $tupianxinxi['name'][$i];
                move_uploaded_file($tupianxinxi['tmp_name'][$i],'.\wenjian\\'.$file);
                $wenjian = $wenjian.'/'.$file;
            }
        }
        return $wenjian;
    }
    /**新闻的
     * 分页系统
     * 输入第几页
     * 返回第几页的数据
     * 每页二十条
     * 以及总页数
     * */
    public function quxinwen($yema)
    {
        $sql = "select * from xinwen";
        $stmt = self::$pdo->query($sql);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $tiaoshu = count($data);
        $yeshu = ceil($tiaoshu/20);
        $xinwen['tiaoshu'] = $yeshu;

        $kaishi = ($yema-1)*20;
        $sql = "select * from xinwen  limit $kaishi,20";
        $stmt = self::$pdo->query($sql);
        while($data = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            $xinwen[] =$data;
        }

        return $xinwen;
    }
    /*
     * 输入新闻数据存入数据库
     * */
    public function cunxinwen($timu,$laiyuan,$shijian,$cishu,$neirong,$guanjianzi,$leibie,$tudizhi)
    {
       $sql = "insert into xinwen VALUES ('','$timu','$laiyuan','$shijian',$cishu,'$neirong','$guanjianzi','$leibie','$tudizhi')";
        $res = self::$pdo->query($sql);
        if(!$res)
        {
            echo "<script>alert('保存失败');</script>";
        }
        echo "<script>alert('保存成功');window.location.href='/gongzuo/index.php/controller/gxinwen';</script>";
    }
    /*
     * 存入产品信息，类似于存入新闻信息的函数
     * */
    public function cunchanpin($timu,$laiyuan,$shijian,$cishu,$neirong,$guanjianzi,$leibie,$tudizhi)
    {
        $sql = "insert into chanpin VALUES ('','$timu','$laiyuan','$shijian',$cishu,'$neirong','$guanjianzi','$leibie','$tudizhi')";
        $res = self::$pdo->query($sql);
        if(!$res)
        {
            echo "<script>alert('保存失败');</script>";
        }
        echo "<script>alert('保存成功');window.location.href='/gongzuo/index.php/controller/gchanpin';</script>";
    }
    /**产品的
     * 分页系统
     * 输入第几页
     * 返回第几页的数据
     * 每页二十条
     * 以及总页数
     * */

    public function quchanpin($yema)
    {
        $sql = "select * from chanpin";
        $stmt = self::$pdo->query($sql);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $tiaoshu = count($data);
        $yeshu = ceil($tiaoshu/20);
        $xinwen['yeshu'] = $yeshu;

        $kaishi = ($yema-1)*20;
        $sql = "select * from chanpin  limit $kaishi,20";
        $stmt = self::$pdo->query($sql);
        while($data = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            $xinwen[] =$data;
        }
        return $xinwen;
    }
    /*
     * 将返回的新闻或产品信息转化为图片信息
     * 只返回第一张图片的信息
     * */
    public function tupian($xinxi)
    {
        foreach($xinxi as $arr)
        {
            $tu = trim($arr['tupian'],'/');
            $tu = explode('/',$tu);
            $id = $arr['id'];
            $tupian[$id] =$tu[0];
        }
        return $tupian;
    }
    /*
     * 输入文章id
     * 返回文章id 以及前后文章的信息
     * */
    public function quwenzhang($id)
    {
        $ids = $id-2;
        $idb = $id+2;
        $sql = "select * from xinwen where id<$idb and id>$ids";
        $stmt = self::$pdo->query($sql);
       while($data = $stmt->fetch(\PDO::FETCH_ASSOC))
       {
           $arr[]  = $data;
       }
        return $arr;
    }
    /*
     * 输入文章类别
     * 返回最新的此类文章
     * */
    public function xiangguan($leibie)
    {
        $sqll = "select count(id) from xinwen where leibie=$leibie";
        $stmtl = self::$pdo->query($sqll);
        $datal = $stmtl->fetchAll(\PDO::FETCH_ASSOC);
        $tiaoshu = $datal[0]["count(id)"];
        $tiaoshu = $tiaoshu-5;


        $sql = "select id,timu from xinwen where leibie=$leibie limit $tiaoshu,5";
        $stmt = self::$pdo->query($sql);
        while($data = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            $arr[]  = $data;
        }
        return $arr;

    }
    public function cunfankui($wenti,$neirong,$lianxiren,$lianfangshi)
    {
        $sql = "insert into fankui VALUES ('','$wenti','$neirong','$lianxiren','$lianfangshi')";
        $res = self::$pdo->query($sql);
        if(!$res)
        {
            echo "<script>alert('保存失败');</script>";
            return false;
        }
        return true;
    }
    public function qufankui()
    {
        $sql = "select * from fankui";
        $stmt = self::$pdo->query($sql);
        while($data = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            $arr[]  = $data;
        }
        return $arr;
    }
    public function cunwomen($mingzi,$dianhua,$shouji1,$shouji2,$chuanzhen,$lianxiren,$youxiang,$wangzhi,$dizhi)
    {
        self::$pdo->query("delete from women");

        $sql = "insert into women VALUES ('','$mingzi','$dianhua','$shouji1','$shouji2','$chuanzhen','$lianxiren','$youxiang','$wangzhi','$dizhi')";
        $res = self::$pdo->query($sql);
        if(!$res)
        {
            echo "<script>alert('保存失败');</script>";
            return false;
        }
        return true;

    }
    public function quwomen()
    {
        $sql = "select * from women";
        $stmt = self::$pdo->query($sql);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

}
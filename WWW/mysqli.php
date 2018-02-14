<?php
/*       mysqli的增改删查
$mysqli = new mysqli('127.0.0.1','root','root','shiyan');
if($mysqli)
{
    echo '连接成功';
}
$result = $mysqli->query('select * from shiyan_shuju where id = 400 ');//查
$res = $result->fetch_array();
var_dump($res);
$mysqli->query("insert into shiyan_shuju VALUES ('1','2')");//增
$mysqli->query("delete from shiyan_shuju where id = 400");//删
$mysqli->query("update shiyan_shuju set pid = 100 where id = 500");//改
*/
/*
$data = $stmt->fetch_assoc();//关联数组
$data = $stmt->fetch_row();//索引数组
$data = $stmt->fetch_array();//关联数组以及索引数组
$data = $stmt->fetch_all();//取出全部的数据
*/

/*
//mysqli 的事务处理
$mysqli = new mysqli('127.0.0.1','root','root','shiyan');
if($mysqli)
{
    echo '连接成功';
}
$mysqli->autocommit(false);
$mysqli->query("update shiyan_shuju set pid = 4808 where id = 500");//执行成功返回true
$result1 = $mysqli->affected_rows;
echo $result1;
$mysqli->query("update shiyan_shuju set pid = 405 where id = 340");
$result2 = $mysqli->affected_rows;
echo $result2;

if($result1 and $result2)
{
   $mysqli->commit();//事务提交
    echo '事物进行了提交';
}else{
    $mysqli->rollback();//事务回滚 ？？但是你有啥用呢？不提交的情况和回滚的情况难道有什么区别
    echo '事务没有进行提交';
}
*/

//mysqli 的预处理
$mysqli = new mysqli('127.0.0.1','root','root','shiyan');
if($mysqli)
{
    echo '连接成功';
}

/*
$sql = "insert into shiyan_shuju(id,pid) VALUES (?,?)";//这里values里面千万不要有单引号，会出错的的
$stmt = $mysqli->prepare($sql);              //   预编译后会返回一个对象，这里不是query
$id = 99;
$pid = 998;
$stmt->bind_param('ii',$id,$pid);
$result = $stmt->execute();             //返回结果，成功返回true
var_dump($result);
*/


/*                                                  删除的预处理
$sql = 'delete from shiyan_shuju where id = ?';
$stmt = $mysqli->prepare($sql);
$id = 500;
$stmt->bind_param('i',$id);
$stmt->execute();
*/


/*                                                               多条数据的预处理
$stmt = $mysqli->prepare("insert into shiyan_shuju VALUES (?,?)");
$id = 1;
$pid = 2;
$stmt->bind_param('ii',$id,$pid);
$stmt->execute();

$id = 77;
$pid = 77;
$stmt->bind_param('ii',$id,$pid);
$stmt->execute();

$id = 77;
$pid = 77;
$stmt->bind_param('ii',$id,$pid);
$stmt->execute();
*/

/* ///////////////////////////////////////////////////第二次练习   有数据返回的预处理还不会/////////////////////////////
$mysqli =  new mysqli('localhost','root','root','xuexi');
if($mysqli)
{
    echo '连接成功';
}
$stmt = $mysqli->query('select* from php');
//$res = $stmt->fetch_array();//联合数组
//$res = $stmt->fetch_assoc();//关联数组
//$res = $stmt->fetch_row();  //索引数组
$res = $stmt->fetch_all();    //返回全部的数据，索引数组的形式
echo '<pre>';
var_dump($res);
echo "<pre/>";

//$mysqli->autocommit(false);//关闭自动提交
//$mysqli->query('insert into php values (2108,1,26,30)');
//$mysqli->commit();//提交
//$mysqli->rollback();//事务回滚
$stmt = $mysqli->prepare('insert into php VALUES (2018,1,28,?)');
$ri = 277;
$stmt->bind_param('i',$ri);

$stmt->execute();
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
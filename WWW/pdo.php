<?php
$dsn = 'mysql:host=127.0.0.1;dbname=shiyan';
$pdo = new PDO($dsn,'root','root');                                           //连接数据库的指令
if($pdo)
{
    echo '连接成功';
}

/*
$stmt = $pdo->query("select * from shiyan_shuju");                                                                        //返回不同类型的数组
$data = $stmt->fetch(PDO::FETCH_ASSOC);//返回关联数组
$data = $stmt->fetch(PDO::FETCH_NUM);//返回索引数组
$data = $stmt->fetch(PDO::FETCH_BOTH);//返回关联数组以及索引数组
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);//返回全部的数组
*/

/*                                                                        pdo的事务处理

 $pdo->beginTransaction();                                                //开启事务
$result = $pdo->exec("delete from shiyan_shuju where id = 1");           //pdo返回的是影响的条数
var_dump($result);
$result = $pdo->exec("insert into shiyan_shuju VALUES (99,98)");
var_dump($result);
$pdo->commit();                                                         //事务提交
$pdo->rollBack();                                                       //事务回滚
$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,1);                            //事务自动提交
*/


/*                                            没有结果集返回的预处理
$sql = 'delete from shiyan_shuju where id=?';
$stmt = $pdo->prepare($sql);
$id = 1;
$stmt->bindParam(1,$id);              //和mysqli是不一样的

$id = 45;
$stmt->bindParam(1,$id);
$stmt->execute();

$id = 99;
$stmt->bindParam(1,$id);
$stmt->execute();
*/

//有结果集的预处理
$sql = "select * from shiyan_shuju where id = ?";
$stmt = $pdo->prepare($sql);
$id = 2;
$stmt->bindParam(1,$id);     $stmt->bindColumn();     $stmt->bindValue();//直接传值的绑定数据
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($data);


























?>
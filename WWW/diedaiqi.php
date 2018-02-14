<?php
$array = array(1,2,3,4,5,6,7);
$obj = new ArrayObject($array);
$it = $obj->getIterator();
$it->rewind();
$it->seek(3);
$it->ksort();
$it->asort();
while($it->valid())
{
    echo $it->key().'和'.$it->current();
    $it->next();
    echo '<hr>';
}


$array = array(1,2,3,4,5,6,7);
$array2 = array('a','b','c');
$array3 = array('q','w','e');

$arr1 = new ArrayIterator($array);
$arr2 = new ArrayIterator($array2);
$arr3 = new ArrayIterator($array3);

$it = new AppendIterator();
$it->append($arr1);
$it->append($arr2);
$it->append($arr3);

$it->rewind();
while($it->valid())
{
    echo '键名'.$it->key().'值'.$it->current();
    echo '<hr>';
    $it->next();
}

//遍历文件
date_default_timezone_set('PRC');
$it = new FilesystemIterator('.');
foreach($it as $finfo)
{
    echo '<pre>';
    echo date('Y-m-d H:i:s',$finfo->getMTime());
    echo '<hr>';
    echo $it->isDir();
    echo '<hr>';
    echo $it->getFilename();
    echo '<hr>';
    echo $it->getPathInfo();
    echo '<hr>';
    echo $it->getSize();

    echo '<hr>';
    echo '<pre>';
}
<?php
//echo disk_total_space('c:');     //某个磁盘的总大小

//echo disk_free_space('c:');      //某个磁盘的剩余大小

//var_dump(mkdir('qq/ww/ee',755,true)); //创建多级目录
/*
$handle = opendir('q');
while(($item = readdir($handle)) !==false)   //括号很中重要，不然会先运行赋值语句
{
    if($item!='.'&&$item!='..') {
        if(is_file('q/'.$item))   //这里的路径要注意，一定要写完整的路径
        {
            echo '我是文件';
            echo $item;
            echo '<hr>';

        }else{
            echo '我是文件夹';
            echo $item;
            echo '<hr>';
        }

    }
}
*/

//不能正常显示汉字的文件名
function jiancha($dir)
{
    $handle = opendir($dir);
    readdir($handle);
    readdir($handle);
    $item = readdir($handle);
    if($item){
        echo '不为空';
    }else{
        echo '为空';
    }

}
//$path = 'qq/ww/ee';
//jiancha($path);

function bianli($path)
{

    if(is_dir($path)){
        $handle = opendir($path);
        while(($item = readdir($handle))!==false)
        {
            if($item!='.'&&$item!='..')
            {
                if(is_file($path.'/'.$item)){
                    $arr['wenjian'][] = $item;
                    echo '文件';
                    echo $item;
                    echo '<hr>';

                }else{
                    $arr['mulu'][] = $item;
                    echo '文件夹';
                    echo  $item;
                    echo '<hr>';
                    bianli($path.'/'.$item);
                }
            }
        }
    }
    closedir($handle);
    if(is_array($arr)) {
        var_dump($arr);//只能读取最外层的文件夹，更内层的文件夹读取不了
    }
}
var_dump(bianli('q'));

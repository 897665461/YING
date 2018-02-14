<?php

//上传文件可能出现的几种情况
if($_FILES['kuang']['error']>0)
{
    switch ($_FILES['kuang']['error'])
    {
        case 1;
            echo '上传的文件过大';
            break;
        case 2;
            echo '上传的文件过大';
            break;
        case 3;
            echo '网络出现问题';
            break;
        case 4;
            echo '未选中上传的文件';
            break;
    }
}else{
    echo '文件上传成功，文件信息如下';
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
    $houzhui = explode('.',$_FILES['kuang']['name']);
    $houzhui = $houzhui['1'];
    $mingzi = $_POST['mingzi'];
    move_uploaded_file($_FILES['kuang']['tmp_name'],'./wenjian/'.$mingzi.'.'.$houzhui);    //文件上传的函数，把临时文件夹中的文件放到指定文件
    var_dump($_GET);
}





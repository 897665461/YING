<?php
var_dump($_FILES);
switch($_FILES['wenjian']['error'])
{
    case 0;
        $res = move_uploaded_file($_FILES['wenjian']['tmp_name'],'wenjian/'.$_FILES['wenjian']['name']);
        break;
    case 1;
        echo '文件过大';
        break;
    case 2;
        echo '文件过大';
        break;
    case 3;
        echo '因网络问题,未上传成功';
        break;
    case 4;
        echo '请选中上传文件';
        break;
}
if($res)
{
    echo "<script>alert('文件上传成功');</script>";
}
<?php
class Upload
{
    private $file = array();
    private $return;
    public function show ($wenjian)
    {
        echo file_get_contents('view/'.$wenjian.'.html');
    }
    public function handle()
    {
        var_dump($_POST['type']);
        if($_POST['type']==biaodan1)
        {
            echo '<pre/>';
            var_dump($_FILES);
            echo '<pre/>';
            foreach($_FILES as $wenjian)
            {
                switch($wenjian['error'])
                {
                    case 0;
                        $is = move_uploaded_file($wenjian['tmp_name'],'../wenjian/'.$wenjian['name']);//这里是把临时文件转移到指定的路径下
                        if($is)
                        {
                            echo '上传成功';
                        }
                        break;
                    case 1;
                        echo '文件过大';
                        break;
                    case 3;
                        echo '网络出现问题';
                        break;
                    case 4;
                        echo '未选中文件';
                        break;
                }

            }
        }
        else
        {
            echo '<pre/>';
            var_dump($_FILES);
            echo '<pre/>';
            foreach($_FILES as $q)
            {
                    foreach ($q['error'] as $key =>$e) {

                        switch ($e) {

                            case 0;

                                $is = move_uploaded_file($q['tmp_name'][$key], '../wenjian/' . $q['name'][$key]);//这里是把临时文件转移到指定的路径下
                                if ($is) {
                                    echo '上传成功';
                                }
                                break;
                            case 1;
                                echo '文件过大';
                                break;
                            case 3;
                                echo '网络出现问题';
                                break;
                            case 4;
                                echo '未选中文件';
                                break;
                        }


                }
            }

        }

    }
}
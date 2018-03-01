<?php

namespace app\shiyan\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        echo 'shiyan/index/index';
        $this->assign('q','89766454');
        return $this->fetch('index@index/index');
    }
    public function ha()
    {
        echo '342423423';
    }
}
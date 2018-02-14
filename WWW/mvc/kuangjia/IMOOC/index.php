<?php
require_once('loader.php');

spl_autoload_register('\iMOOC\Loader::autoloadl');

//imooc\loader::autoloadl();

app\controller\home\index::test();


<?php
define('IMOOC',realpath(''));
define('CODE','/core');
define('APP','/app');
require_once CODE.'/'.'common/function.php';
require_once CODE.'/'.'imooc.php';

spl_autoload_register('core\imooc::auto_load');

core\imooc::run();


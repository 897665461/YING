<?php
namespace core\lib;
class model  extends \PDO //很巧妙
{
    public $pdo;
    public function __construct()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=xuexi';
        $pdo = new \PDO($dsn,'root','root');
        //连接数据库的指令
        if($pdo)
        {
            echo '连接成功';
        }
        $this->pdo=$pdo;
    }
    public  function qu($sql)
    {
       return $this->pdo->query($sql);
    }

}

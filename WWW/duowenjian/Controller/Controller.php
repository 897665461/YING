<?php
class Controller
{
    public function diaoyong()
    {
       require_once('View/view.php');
        $ob = new view();
        $ob->biaodan();
    }
    public function chuandi()
    {
        var_dump('传递了');
    }

}
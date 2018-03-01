<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\config;
use think\Request;

class Index extends Controller
{
    public function index()
    {
        $array = [1,2,3,4,5,6];
        $res = serialize($array);
        $array = unserialize($res);
        var_dump($array);
        return $res;
    }
    public function jieshou()
    {
        echo 'index/index/jieshou';

    }
    public function shanchu()
    {
        Db::table('shiyan')->where('id','eq','1')->delete();
    }
    public function tianjia()
    {
        $data['id'] = '';
        $data['user'] = '2';
        $data['password'] = '2';
        $data['sex'] = 1;
        Db::table('shiyan')->insert($data);
    }
    public function zengjia()
    {
        Db::table('shiyan')->where('id','eq',11)->setInc('sex',10);
    }
    public function chaxun()
    {
       $q =  Db::table('shiyan')->field('id,sex')->select();
        echo "<pre>";
        var_dump($q);
        echo "<pre/>";
    }
    public function s()
    {
        echo "<pre>";
        var_dump($_SERVER);
        echo "<pre>";
    }
    public function peizhi()
    {
        config::set('app_debug','false','shiyan');
        $res = config::get('app_debug');
        var_dump($res);
    }
    public function huanjing()
    {
        dump($_ENV);
    }
    public function zhushou(Request $request)
    {
        /*
        var_dump($request->param());
        var_dump($request->get());
        var_dump($request->post());
        var_dump($request->method());
        */
        //session_start();
        session('qwe','2890893');
        $res = input();
        //$res =$request->post('id');
        var_dump(input('session.qwe'));
    }
}


?>

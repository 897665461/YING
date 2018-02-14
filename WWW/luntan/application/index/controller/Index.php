<?php
namespace app\index\controller;
use think\Controller;                                                                                //很重要
use app\index\model\Tiezi;
use app\index\model\Biaoqian;
use app\index\model\Zan;
use app\index\model\Huifu;
use think\Db;
use think\request;

class Index extends Controller
{
    public function shiyan(Request $request)     //3这种方法也要引用命名空间
    {
        //$request = request();                    1
        //$request = Request::instance();          2要引用·命名空间
/*
        dump($request->domain());                //域名
        dump($request->pathinfo());              //模板 控制器 方法 迷惑代码
        dump($request->path());                   //模板 控制器 方法
        dump($request->method());                 //请求方式
        dump($request->isget());                  //是否为get请求
        dump($request->ispost());                  //还有post请求
        dump($request->isajax());                  //还有这个请求
        dump($request->get('id'));                //取得get请求的值
        session('q','2');
        dump($request->param());
        dump($request->session());
        dump($request->cookie());
        dump($request->module());               //模板
        dump($request->controller());           //控制器
        dump($request->action());              //方法
*/
        $result = input('',100,'intval');    //第二位是默认值，第三位是过滤用的   本意是转为整型的意思
        var_dump($result);
    }
    public function index()
    {
        //从luntan_tiezi取出数据
        $res = Tiezi::select();

        return $this->fetch('index',['res'=>$res]);

    }

    public function fenleizhanshi()                     //按照不同的类别展示帖子
    {
        $q = input();

        if(!$q)                                         //默认情况为时间排序
        {
            $leibie = 'shijian';
        }
        else
        {
            $leibie = $q['leibie'];
        }

        $res = Tiezi::order($leibie)->select();


        return $this->fetch('fenleizhanshi',['res'=>$res]);
    }

    public function zhuce()
    {
        return $this->fetch();
    }

    public function zhucechuli()
    {
        if (request()->isPost())
        {
            $zhucexinxi = input('post.');
        }
        $username =  $this->request->post('username');
        $password = $this->request->post('password');
        $email = $this->request->post('email');

        $user['xingming'] = $username;
        $user['mima'] = md5(md5($password));
        $user['youxiang'] = $email;
        $user['isguanliyuan'] = 0;
        $user['islahei'] = 0;
        date_default_timezone_set("PRC");
        $user['shijian'] = date("Y-m-d H:i:s");

        Db::table('luntan_yonghu')->insert($user);

        return $this->fetch('denglu');
    }

    public function denglu()
    {
        return $this->fetch();
    }

    public function dengluchuli()
    {

            $yonghuming = $this->request->post('yonghuming');
            $mima = $this->request->post('mima');

            $jiamimima = md5(md5($mima));

            $shuzu = Db::table('luntan_yonghu')->where('xingming', 'eq', $yonghuming)->select();//  要注意这个密码的传递   不然会传递未定义

        if(isset($shuzu[0]['mima'])) {
            if ($jiamimima == $shuzu[0]['mima']) {

                session('yonghuming', $yonghuming);
                return     $this->index();                                                            //返回的是方法还是view的视图   区分好     这里有错误

            } else {
                return $this->success("登录失败");
            }
        }
        else {
            return $this->success("登录失败");
        }
    }

    public function tuichu()                                    //退出的逻辑处理
    {
        session('yonghuming',null);
       return $this->index();
    }



    public function chuli()
    {
        $username = $this->request->get('xingming');//接收信息

        $q = ['q'=>$username];                      //构建数组
        Db::table('shiyan_er')->insert($q);       //传递
        //确实很方便
        //Db::execute('insert  into shiyan_er(q) VALUES (:u)',['u'=>$username]);
        //Db::execute('insert shiyan_er(q) values(:username)',['username'=>$username]);

    }
    public function fatie()
    {
       return $this->fetch();                           //不要忘了return
    }


    public function fatiechuli()
    {
        if(request()->ispost())                         //检查有没有传过来信息
        {
             $postData = input('post.');


            $biaoti = $postData["biaoti"];             //数据传递
            $zuozhe = session('yonghuming');
            $neirong = $postData['neirong'];
            $leibie =   $postData['jiedian'];
            date_default_timezone_set("PRC");
            $shijian = date("Y-m-d H:i:s");
            $isshan ='no';
            $biaoqian = $postData['biaoqian'];

            $res = Tiezi::create([                        //将帖子数据存入数据库中相应表
                'biaoti'=>$biaoti,
                'zuozhe'=>$zuozhe,
                'neirong'=>$neirong,
                'leibie' =>$leibie,
                'shijian'=>$shijian,
                'isshan'=>$isshan,
                ]);

            //1。从数据库中取出文章id

            $id = Tiezi::where('neirong','=', $neirong)->find();
            $id = $id->toArray();
            $id = $id['id'];

            $resq = Biaoqian::create([
                'wenzhang'=>$id,                          //将标签相关的数据存入标签表
                'biaoqian'=>$biaoqian
            ]);

            if($res and $resq)
            {
                 return $this->index();                   //要写成这个样子， fetch（）是调用的模板，这才是调用的方法
            }
            else
            {
                $this->error('发帖失败');
            }
        }
        else
        {
            $this->error('发帖失败');
        }
    }
    public function xiangqing()                                                   //帖子详情的展示
    {
       $id = input();

        $id =  $id['id'];                                                         //接收帖子文章的id  {:url}传递参数要用数组的形式并且放在括号里

        $result = Tiezi::where('id','=',$id)->find();                              //取出帖子的信息    注意这里的id的引号问题
        $result = $result->toArray();
        $wid = $result['id'];                                                      //传递文章的id

        $biaoqian = Biaoqian::where('wenzhang','=',"$wid")->find();              //取出文章id对应的标签

        $biaoqian =$biaoqian->toArray();

        $huifuxinxi = Huifu::where('wenzhang_id','=',$id)->select();            //回复信息的获取
        $huifuzongshu =Huifu::where('wenzhang_id','=',$id)->count();

        $zan = Zan::where('zanwenzhang','=',$id)->count();                        //获取赞的数量

        return $this->fetch('xiangqing',['result'=>$result,'biaoqian'=>$biaoqian,'huifuxinxi'=>$huifuxinxi,'huifuzongshu'=>$huifuzongshu,
                                             'zan'=>$zan]);
    }


    public function dianzan()                                                 //点赞的数据上传到数据库
    {
        $dianzanren = session('yonghuming');

        if(!$dianzanren)
        {
            return "<script>alert('请登陆')</script>";
        }

        //时间
        $shijian = date("Y-m-d H:i:s");

        //传递文章id

        $wid = input();
        $wid =$wid['id'];                                       //为什么每点一下会存入两条数据，刷新也会存入两条数据
        //检查数据库有没有此用户对此文章的点赞

        //存入数据库
        $shuzu = [
            'id'=>'',
            'dianzanzhe'=>$dianzanren,
            'zanwenzhang'=>$wid,
            'shijian'=>$shijian
        ];
       Zan::create($shuzu);

       // $this->assign('id',$wid);
        return $this->xiangqing() ;                          //传递文章id使文章可以返回原来的界面

    }

    public function diancai()
    {
        $dianzanren = session('yonghuming');

        if(!$dianzanren)
        {
            return "<script>alert('请登陆')</script>";
        }
        $dianzanren = session('yonghuming');
        var_dump($dianzanren);
        if(!$dianzanren)
        {
            return "<script>alert('请登陆')</script>";
        }

    }


    public function huifu()                                   //回帖信息上传到数据库
    {
        $dianzanren = session('yonghuming');

        if(!$dianzanren)
        {
            return "<script>alert('请登陆')</script>";
        }

        $q = input();                                        //用input助手函数接受传过来的全部信息
        $hufuneirong = input('post.neirong');
        $huifuzhe_id = session('yonghuming');
        $shijian = date('Y-m-d H:i:s');                    //获取当前的时间，要设置一下当前位置的时区
        $jieshouzhe = 0;
        $wenzhangid =$q['id'];

        $shuzu= [
            'id'=>'',
            'neirong'=>$hufuneirong,
            'shijian'=>$shijian,
            'jieshouzhe'=>$jieshouzhe,
            'wenzhang_id'=>$wenzhangid,
            'huifuzhe_id'=>$huifuzhe_id
        ];
        Huifu::create($shuzu);                              //存入相应的数据库

        return $this->xiangqing();                        //这个方法对应的页面传递的id  一定要和xiangqing方法的参数名一致，这样可以返回相同文章对应的界面，很方便

    }





}
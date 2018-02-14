<?php
namespace app\index\controller;
use app\index\model\Er;
class Index
{
    public function index()
    {
         //  Er::create(['id'=>'11','wew'=>'11']);      增
        //   Er::insert(['id'=>'13','wew'=>'131']);
        /*   Er::insertAll([
                 ['id'=>'14',
                     'wew'=>'20'],                 增加多项的方法
                 ['id'=>'15',
                     'wew'=>'12']
             ]);
        */
        //Er::where('id','<','14')->update(['wew'=>'888']);       改
       // $q = new Er();                                         可以改任意项的任意数据,并且只能以这种形式写
        //$q->saveAll([['id'=>'14','wew'=>'33733']]);

       // Er::where('id','=','14')->delete();                     删除

       /*
        $res = Er::where('id','=','15')->find();                //查一项数据
        $res =$res->toArray();
        dump($res);

        $result =    Er::where('id','<','14')->order('id')->limit('2,6')->select();             //多项条件查数据
        foreach ($result as $item)
        {
         $item = $item->toArray();
            dump($item['id']);
        }
        */
       // $re = Er::column('id');                                     取出特定字段的值
        //dump($re);

        //$res = Er::count();                                    聚合操作
       // dump($res);
       // $res = Er::where('id','>','6')->count();
       // dump($res);
       // $res =Er::max('wew');
      // $res = Er::sum('id');
       // $res = Er::where('id','>','10')->sum('id');
        //$res = Er::avg('id');
        //dump($res);
        Er::create(['id'=>'','wew'=>'1']);

        // Er::insert(['id'=>'53','wew'=>'131']);
}
}

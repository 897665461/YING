<?php
namespace app\index\controller;
use app\index\model\Er;
class Index
{
    public function index()
    {
        /*  取出任意字段任意位置的数据
       $res = Er::get(function($query)
       {
          $query->where('wew','=','9');
       });
       $res = $res->toArray();
        dump($res);
        */

        /*  取出主键任意位置的数据
        $res = Er::get(1);
        $res = $res->toArray();
        dump($res['id']);
       */

        /*取出多个主键任意位置的数据
        $qw =   Er::all('1,2,3');

        foreach($qw as $we)
        {
          dump($we->toArray());
        }
       */
        /*多限定条件取出数据
        $res = Er::where('id','>','2')->limit(2)->field('id')->order('id DESC')->select();
       foreach($res as $w)
       {
           dump($w->toArray());
       }
        */
        //$res = Er::where('id','=','3')->value('id');
        //dump($res);
        /*
         $res =  Er::create([
         'wew'=>'99',
         'er'=>'wewe'
        ],true);
        dump($res->id);

        $q = new Er;
        $q->wew=99;
        $q->save();
        dump($q->id);
        */
        //添加数据练习

        /*
        $list = [
            'wew'=>'136'
        ];
        dump($list);
        Er::create($list);                 添加一项数据
       */

        /*
        $res = Er::column('id');           取出每个字段的所有值
        dump($res);
     */
        /*
        $data[] = [
            'wew'=>'137'
        ];
        $data[] = [
            'wew'=>'138'
        ];
        $data[] = [
            'wew'=>'139'
        ];
        dump($data);

        Er::insertALL($data);             //添加多项数据
        */
        /*
          Er::update([
                  'id'=>'1',
                  'wew'=>'999'
              ]);        //以主键为索引更新数据

            $res =Er::where('id','=','5')->update(['wew'=>'888']);
            dump($res);

        */
        /*另一种更新方法
        $res = Er::get(1);
        $res->wew='444';
        $res->save();
       dump($res);
    */
        /*   更新多项数据
        $q= new Er;
       $q->saveAll([
    ['id'=>1,'wew'=>'788'],
    ['id'=>2,'wew'=>'788'],
    ['id'=>3,'wew'=>'788']
                  ]);
        */

        $res = Er::where('id','>','1')->limit(4)->order('id','desc')->select();
        foreach($res as $q)
        {
            dump($q->toArray());

        }

    }
}

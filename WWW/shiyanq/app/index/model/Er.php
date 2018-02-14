<?php
namespace app\index\model;
use think\Model;
class Er extends Model
{
public function getWewAttr($val)                     //模型获取器
{
    switch ($val)
    {
        case 1:
            return '787';
        break;
        case 2;
            return '女';
        break;
    }
}

    public function setWewattr($val)
    {
        switch ($val)
        {
            case 1:
                return '99';
                break;
            case 2;
                return '11';
                break;
        }

    }

}
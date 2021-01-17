<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/11
 * Time: 20:14
 */


namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value, $data)
    {
        return $data['from'] == 1 ? config('setting.img_prefix').$value : $value;
    }
}
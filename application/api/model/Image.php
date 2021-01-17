<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/10
 * Time: 16:56
 */


namespace app\api\model;


class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'delete_time', 'update_time'];

    public function getUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }
}
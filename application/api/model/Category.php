<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/16
 * Time: 22:42
 */


namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time'];

    public function image()
    {
        return $this->belongsTo(Image::class, 'topic_img_id', 'id');
    }
}
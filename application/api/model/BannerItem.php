<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/10
 * Time: 15:39
 */


namespace app\api\model;


class BannerItem extends BaseModel
{
    protected $hidden = ['id', 'img_id', 'banner_id', 'delete_time', 'update_time'];

    public function images()
    {
        return $this->belongsTo(Image::class, 'img_id', 'id');
    }
}
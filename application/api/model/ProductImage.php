<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/23
 * Time: 17:43
 */


namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['img_id', 'delete_time', 'product_id'];

    public function imgUrl()
    {
        return $this->belongsTo(Image::class, 'img_id', 'id');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/11
 * Time: 21:08
 */


namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['delete_time', 'create_time', 'update_time', 'from', 'category_id', 'pivot', 'img_id'];

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    public static function getMostProduct($count)
    {
        $product = self::limit($count)->order('create_time desc')->select();

        return $product;
    }

    public static function getProductByCategoryId($id)
    {
        return self::where('category_id', $id)->select();
    }
}
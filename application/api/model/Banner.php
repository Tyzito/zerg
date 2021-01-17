<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2020/12/20
 * Time: 18:13
 */


namespace app\api\model;


class Banner extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time'];

    public function items()
    {
        return $this->hasMany(BannerItem::class, 'banner_id', 'id');
    }

    public function items1()
    {

    }

    /**
     * 根据id获取banner信息
     */
    public static function getBannerById($id)
    {
        return self::with(['items', 'items.images'])->get($id);
    }
}
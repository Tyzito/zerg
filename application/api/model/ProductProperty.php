<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/23
 * Time: 17:45
 */


namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden = ['product_id', 'delete_time', 'id'];
}
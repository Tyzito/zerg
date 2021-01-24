<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/24
 * Time: 16:06
 */


namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden = ['id', 'delete_time', 'user_id'];
}
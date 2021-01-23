<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/17
 * Time: 16:22
 */


namespace app\api\model;


class User extends BaseModel
{
    public static function getByOpenid($openid)
    {
        $result = self::where('openid', $openid)->find();

        if(!$result){
            return false;
        }

        return true;
    }
}
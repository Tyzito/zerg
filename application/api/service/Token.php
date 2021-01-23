<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/17
 * Time: 22:43
 */


namespace app\api\service;


class Token
{
    public static function generateToken()
    {
        // 32个字符组成一组随机字符串
        $randChars = getRandChars(32);

        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];

        // salt 盐
        $salt = config('secure.token_salt');

        return md5($randChars.$timestamp.$salt);
    }
}
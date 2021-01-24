<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/24
 * Time: 14:48
 */


namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 404;
    public $msg = '用户不存在';
    public $errorCode = 60000;
}
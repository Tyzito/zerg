<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/17
 * Time: 23:19
 */


namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $errorCode = 10001;
}
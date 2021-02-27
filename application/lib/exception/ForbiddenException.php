<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/29
 * Time: 22:04
 */


namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}
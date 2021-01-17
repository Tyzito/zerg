<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2020/12/26
 * Time: 16:55
 */


namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}
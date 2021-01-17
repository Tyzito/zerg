<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/16
 * Time: 12:53
 */


namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定的主题不存在，请检查主题ID';
    public $errorCode = 30000;
}
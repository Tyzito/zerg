<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2020/12/22
 * Time: 21:48
 */


namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求的banner不存在';
    public $errorCode = 40000;
}
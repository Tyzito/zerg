<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/2/27
 * Time: 16:16
 */


namespace app\lib\exception;


class OrderException extends BaseException
{
    public $code = 404;
    public $msg = '订单不存在，请检查ID';
    public $errorCode = 80000;
}
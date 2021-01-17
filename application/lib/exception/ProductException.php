<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/16
 * Time: 18:58
 */


namespace app\lib\exception;


class ProductException extends BaseException
{
    public $code = 404;
    public $msg = '指定的商品不存在，请检查参数';
    public $errorCode = 20000;
}
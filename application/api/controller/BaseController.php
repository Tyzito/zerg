<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/31
 * Time: 12:38
 */


namespace app\api\controller;


use app\api\service\Token as TokenService;
use think\Controller;

class BaseController extends Controller
{
    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }

    protected function checkExclusiveScope()
    {
        TokenService::needExclusiveScope();
    }
}
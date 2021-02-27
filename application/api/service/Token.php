<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/17
 * Time: 22:43
 */


namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Exception;
use think\facade\Cache;
use think\facade\Request;

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

    public static function getCurrentTokenVar($key)
    {
        $token = Request::header('token');
        $vars = Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }

        if(!is_array($vars)){
            $vars = json_decode($vars, true);
        }

        if(array_key_exists($key, $vars)){
            return $vars[$key];
        }

        throw new Exception('尝试获取的Token变量并不存在');
    }

    public static function getCurrentUid()
    {
        return self::getCurrentTokenVar('uid');
    }

    // 用户和管理员都可以访问的权限
    public static function needPrimaryScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if($scope){
            if($scope > ScopeEnum::User){
                return true;
            }

            throw new ForbiddenException();
        }

        throw new TokenException();
    }

    // 只有用户才能访问的权限
    public static function needExclusiveScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if($scope){
            if($scope == ScopeEnum::User){
                return true;
            }

            throw new ForbiddenException();
        }

        throw new TokenException();
    }

    public static function isValidOperate($checkedUID)
    {
        if(!$checkedUID){
            throw new Exception('检车UID时必须传入一个被检查的UID');
        }

        $currentOperateUID = self::getCurrentUid();

        if($currentOperateUID != $checkedUID){
            return false;
        }

        return true;
    }
}
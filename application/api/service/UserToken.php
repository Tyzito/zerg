<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/17
 * Time: 16:24
 */


namespace app\api\service;


use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;
use app\api\model\User as UserModel;
use think\facade\Cache;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    public function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'), $this->wxAppID, $this->wxAppSecret, $this->code);
    }

    public function get()
    {
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result, true);

        if(empty($wxResult)){
            throw new Exception('获取openid和session_key时异常，微信内部错误');
        }

        if(array_key_exists('errcode', $wxResult)){
            $this->processLoginError($wxResult);
        }

        return $this->grantToken($wxResult);
    }

    private function grantToken($wxResult)
    {
        // 获取openid
        // 数据库里查，这个openid是否已经存在
        // 如果存在则不处理，如果不存在则新增一条user记录
        // 生成令牌，准备缓存数据，写入缓存
        // 把令牌返回给客户端

        $openid = $wxResult['openid'];
        $user = UserModel::getByOpenid($openid);
        if($user){
            $uid = $user->id;
        }else{
            $uid = $this->newUser($openid);
        }

        $cacheValue = $this->prepareCachedValue($wxResult, $uid);

        $token = $this->saveToCache($cacheValue);

        return $token;
    }

    private function saveToCache($cacheValue)
    {
        $key = self::generateToken();
        $value = json_encode($cacheValue);

        $request = Cache::set($key, $value, config('setting.token_expire_in'));
        if(!$request){
            throw new TokenException();
        }

        return $key;
    }

    private function prepareCachedValue($wxResult, $uid)
    {
        $cacheValue = $wxResult;
        $cacheValue['uid'] = $uid;
        $cacheValue['scope'] = 16;

        return $cacheValue;
    }

    private function newUser($openid)
    {
        $user = UserModel::create([
            'openid' => $openid,
        ]);

        return $user->id;
    }

    private function processLoginError($wxResult)
    {
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorcode' => $wxResult['errcode'],
        ]);
    }
}
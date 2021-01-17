<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2020/12/22
 * Time: 21:21
 */


namespace app\lib\exception;


use Exception;
use think\exception\Handle;
use think\facade\Log;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    public function render(Exception $e)
    {
        // 用户操作导致的异常
        if($e instanceof BaseException){
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else{ // 服务器端导致的异常
            if(config('app_debug')){
                return parent::render($e);
            }

            $this->code = 500;
            $this->msg = '服务器内部错误';
            $this->errorCode = 999;
            $this->recordErrorLog($e);
        }

        $result = [
            'msg' => $this->msg,
            'errorCode' => $this->errorCode,
            'request_url' => request()->url(),
        ];

        return json($result, $this->code);
    }

    private function recordErrorLog(Exception $e)
    {
        Log::record($e->getMessage(), 'error');
    }
}
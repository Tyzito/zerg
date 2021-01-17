<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2020/12/9
 * Time: 23:29
 */


namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        $params = Request::param();

        $result = $this->batch()->check($params);

        if(!$result){
            throw new ParameterException([
                'msg' => $this->error,
            ]);
        }

        return true;
    }

    // 自定义验证规则,传入的参数是不是正整数
    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
    {
        if(is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){
            return true;
        }

        return false;
    }

    protected function isNotEmpty($value)
    {
        if(empty($value)){
            return false;
        }

        return true;
    }
}
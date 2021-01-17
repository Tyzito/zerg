<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2020/12/9
 * Time: 22:41
 */


namespace app\api\validate;


class TestValidate extends BaseValidate
{
    protected $rule = [
        'name' => 'require|max:5',
        'email' => 'email'
    ];
}
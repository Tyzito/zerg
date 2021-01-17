<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2020/12/9
 * Time: 22:57
 */


namespace app\api\validate;


class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
        //'num' => 'in:1,2,3',
    ];

    protected $message = [
        'id' => 'id必须是正整数',
    ];
}
<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/23
 * Time: 19:34
 */


namespace app\api\validate;


class AddressNew extends BaseValidate
{
    protected $rule = [
        'name' => 'require|isNotEmpty',
        'mobile' => 'require|isMobile',
        'province' => 'require|isNotEmpty',
        'city' => 'require|isNotEmpty',
        'country' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty',
    ];
}
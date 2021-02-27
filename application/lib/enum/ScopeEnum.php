<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/24
 * Time: 19:38
 */


namespace app\lib\enum;


class ScopeEnum
{
    const User = 16; // 代表App用户的权限数值

    const Super = 32; // 代表CMS用户的权限数值
}
<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2020/12/9
 * Time: 21:49
 */


namespace app\api\controller\v2;

class Banner
{
    /**
     * 获取指定id的banner信息
     * @url banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id)
    {
        return 'This is v2 version';
    }
}
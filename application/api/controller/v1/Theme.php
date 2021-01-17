<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/11
 * Time: 21:05
 */


namespace app\api\controller\v1;


use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeException;

class Theme
{
    public function getSimpleList($ids = '')
    {
        (new IDCollection())->goCheck();

        $ids = explode(',', $ids);

        $result = ThemeModel::with('topicImg,headImg')->select($ids);

        if($result->isEmpty()){
            throw new ThemeException();
        }

        return $result;
    }

    public function getComplexOne($id)
    {
        (new IDMustBePostiveInt())->goCheck();

        $theme = ThemeModel::getThemeWithProducts($id);

        if($theme->isEmpty()){
            throw new ThemeException();
        }

        return $theme;
    }
}
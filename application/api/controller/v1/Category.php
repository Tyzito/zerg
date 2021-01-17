<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/16
 * Time: 22:41
 */


namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;


class Category
{
    public function getAllCategories()
    {
        //$categories = CategoryModel::with('image')->select();
        $categories = CategoryModel::all([],'image');

        if($categories->isEmpty()){
            throw new CategoryException();
        }

        return $categories;
    }
}
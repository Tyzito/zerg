<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/16
 * Time: 17:55
 */


namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductException;

class Product
{
    public function getRecent($count = 15)
    {
        (new Count())->goCheck();

        $product = ProductModel::getMostProduct($count);

        if($product->isEmpty()){
            throw new ProductException();
        }

        return $product->hidden(['summary']);
    }

    public function getAllInCategory($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $product = ProductModel::getProductByCategoryId($id);

        if($product->isEmpty()){
            throw new ProductException();
        }

        return $product->hidden(['summary']);
    }

    public function getOne($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);

        if($product->isEmpty()){
            throw new ProductException();
        }

        return $product;
    }

    public function deleteOne()
    {

    }
}
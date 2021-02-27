<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/31
 * Time: 17:35
 */


namespace app\api\service;


use app\api\model\Product;

class Order
{
    // 订单的商品列表
    protected $oProducts;

    // 真实的商品信息
    protected $products;

    protected $uid;

    public function place($uid, $oProducts)
    {
        // oProducts 和 $products 做对比
        // products从数据库中查询出来
        $this->$oProducts = $oProducts;
        $this->products = $this->getProductByOrder($oProducts);
        $this->uid = $uid;
    }

    public function checkOrderStock($orderID)
    {
        $oProducts = OrderProduct::where('order_id', $orderID)->select();
        $this->oProducts = $oProducts;

        $this->products = $this->getProductByOrder($oProducts);
        $status = $this->getOrderStatus();

        return $status;
    }

    // 根据订单信息查找真实的商品信息
    private function getProductByOrder($oProducts)
    {
        $oPIDS = [];
        foreach ($oProducts as $item)
        {
            array_push($oPIDS, $item['product_id']);
        }

        $products = Product::all($oPIDS)
            ->visible(['id', 'price', 'stock', 'name', 'main_img_url'])
            ->toArray();

        return $products;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2021/1/29
 * Time: 22:13
 */


namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\OrderPlace;
use app\api\service\Token as TokenService;

class Order extends BaseController
{
    // 用户选择商品后，向API提交商品的相关信息
    // API拿到商品信息后，进行订单的库存量检测
    // 有库存，把订单数据存入数据库中，下单成功；返回客户端消息，告诉客户端可以支付了
    // 客户端调用微信支付接口，进行支付
    // 支付时再进行库存量检测
    // 服务器这边就可以调用微信支付接口进行支付
    // 微信会返回我们支付结果(异步)
    // 成功：也需要库存量检测
    // 成功：进行库存量扣除

    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder']
    ];

    public function placeOrder()
    {
        (new OrderPlace())->goCheck();
        $products = input('post.products/a');
        $uid = TokenService::getCurrentUid();
    }
}
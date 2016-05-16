<?php

/**
 * Created by PhpStorm.
 * User: zuston
 * Date: 16/5/9
 * Time: 上午12:16
 */
class sellInfoModel extends ActiveRecord
{
    public $table = 'sell_info';
    public $primaryKey = 'sell_id';
    public $relations = array(
        //销售商品id
        'product' => array(self::BELONGS_TO, 'productModel', 'product_id'),
        //销售员id
        'user' => array(self::BELONGS_TO, 'userModel', 'user_id'),
        //零售商id
        'customer' => array(self::BELONGS_TO, 'customerModel', 'customer_id'),
        );
}
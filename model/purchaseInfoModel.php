<?php

/**
 * Created by PhpStorm.
 * User: zuston
 * Date: 16/5/9
 * Time: 上午12:17
 */
class purchaseInfoModel extends ActiveRecord
{
    public $table = 'purchase_info';
    public $primaryKey = 'purchase_id';
    public $relations = array(
        //入库商品id
        'product' => array(self::BELONGS_TO, 'productModel', 'product_id'),
        //进货员id
        'user' => array(self::BELONGS_TO, 'userModel', 'user_id'),
        //供应商id
        'provider' => array(self::BELONGS_TO, 'providerModel', 'provider_id'),
    );
}
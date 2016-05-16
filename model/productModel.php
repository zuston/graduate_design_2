<?php

class productModel extends ActiveRecord{
    public $table = 'product';
    public $primaryKey = 'product_id';

    public $relations = array(
        'provider' => array(self::HAS_ONE, 'providerModel', 'provider_id'),
    );
}

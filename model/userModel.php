<?php

class userModel extends ActiveRecord{
    public $table = 'user';
    public $primaryKey = 'id';
    public $relations = array(
        'sellinfo' => array(self::HAS_MANY, 'sellInfoModel', 'user_id'),
        'purchaseinfo' => array(self::HAS_MANY, 'purchaseInfoModel', 'user_id'),
    );
}

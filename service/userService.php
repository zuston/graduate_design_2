<?php

/**
 * Created by PhpStorm.
 * User: zuston
 * Date: 16/4/14
 * Time: 上午12:10
 */
class userService
{

    public static function verifyLogin($username,$password){
        $userModel = new userModel();
        $userModel = $userModel->eq('user_name',$username)->find();
        if($userModel==null){
            return false;
        }

        if($userModel->user_password==$password&&$userModel->user_state==1){
            Core::loginSession($userModel->id);
            return $userModel;
        }
        return false;
    }

    public static function getUserModelByPk($user_id){
        $userModel = new userModel();
        $userModel = $userModel->eq('id',$user_id)->find();
//        var_dump($userModel);exit;
        return $userModel;
    }

    public static function updateUserInfo($user_id,$user_password,$user_name,$user_state){
        $userModel = new userModel();
        $user = $userModel -> eq('id',$user_id)->find();
        $user -> user_password = $user_password;
        if($user_name!=null){
            $user -> user_name = $user_name;
        }
        if($user_state!=null){
            $user -> user_state = $user_state;
        }
        $res = $user -> update();
        if(is_object($res)){
            return true;
        }
        return false;
    }

    public static function getUser($user_type){
        $userModels = new userModel();
        $users = $userModels->eq('user_type',$user_type)->findAll();
        return $users;
    }

    public static function deleteUserById($uid){
        $user = new userModel();
        $userOne = $user->eq('id',$uid)->find();
//        $userOne -> user_state = 0;
        $res = $userOne -> delete();
//        if(is_object($res)){
//            return true;
//        }
//        return false;
        return true;
    }

    public static function unshotUserById($uid){
        $user = new userModel();
        $userOne = $user->eq('id',$uid)->find();
        $userOne -> user_state = 1;
        $res = $userOne -> update();
        if(is_object($res)){
            return true;
        }
        return false;
    }
    public static function shotUserById($uid){
        $user = new userModel();
        $userOne = $user->eq('id',$uid)->find();
        $userOne -> user_state = 0;
        $res = $userOne -> update();
        if(is_object($res)){
            return true;
        }
        return false;
    }

    public static function findUserById($uid){
        $user = new userModel();
        $one = $user->eq('id',$uid)->find();
        return $one;
    }

    public static function addUser($user_name,$user_password,$type){
        $user = new userModel();
        $user -> user_name = $user_name;
        $user -> user_password = $user_password;
        $user -> user_state = 1;
        $user -> user_type = $type;
        $user -> create_time = date('Y-m-d H:i:s');
        $res = $user -> insert();
        if(is_object($res)){
            return true;
        }
        return false;
    }

    public static function getProviders(){
        $providerModel = new providerModel();
        $ps = $providerModel->eq('provider_state',1)->findAll();
        return $ps;
    }

    public static function getCustomers(){
        $model = new customerModel();
        $models = $model->eq('customer_state',1)->findAll();
        return $models;
    }

    public static function deleteProviderById($uid){
        $model = new providerModel();
        $m = $model -> eq('provider_id',$uid) -> find();
        $res = $m -> delete ();
        if(is_object($res)){
            return true;
        }
        return true;
    }

    public static function deleteCustomerById($uid){
        $model = new customerModel();
        $m = $model -> eq('customer_id',$uid) -> find();
        $res = $m -> delete ();
        if(is_object($res)){
            return true;
        }
        return true;
    }

    public static function getCustomerByPk($uid){
        $model = new customerModel();
        $m = $model->eq('customer_id',$uid)->find();
        return $m;
    }

    public static function getProviderByPk($uid){
        $model = new providerModel();
        $m = $model->eq('provider_id',$uid)->find();
        return $m;
    }

    public static function updateCustomerInfo($customer_id,$customer_company_name,$customer_company_phone,$customer_contact_address,
                                              $customer_contact_address,$customer_contact_qq,$customer_contact_phone,$customer_contact_name){
        $model = new customerModel();
        $m = $model -> eq('customer_id',$customer_id) -> find();
        $m -> customer_company_name = $customer_company_name;
        $m -> customer_company_phone = $customer_company_phone;
        $m -> customer_contact_name = $customer_contact_name;
        $m -> customer_contact_phone = $customer_contact_phone;
        $m -> customer_contact_qq = $customer_contact_qq;
        $m -> customer_contact_address = $customer_contact_address;
        $m -> customer_contact_name = $customer_contact_name;
        $res = $m -> update();
        if(is_object($res)){
            return true;
        }
        return false;
    }

    public static function addHavePurchase($user_id,$purchase_count,$purchase_order_id,$product_id){
        $purchaseInfoModel = new purchaseInfoModel();
        $purchaseInfoModel -> product_id = $product_id;
        $purchaseInfoModel -> purchase_count = $purchase_count;
        $purchaseInfoModel -> purchase_order_id = $purchase_order_id;
        $purchaseInfoModel -> user_id = $user_id;
        $purchaseInfoModel -> create_time = date("Y-m-d H:i:s");
        $purchaseInfoModelres = $purchaseInfoModel -> insert();

        $productModel = new productModel();
        $pmodel = $productModel -> eq('product_id',$product_id) -> find();
        $total_count = $pmodel->product_count;
        $pmodel -> product_count = $total_count + $purchase_count;
        $productres = $pmodel -> update();

        $pmodel = new purchaseInfoModel();
        $pm = $pmodel -> eq ('purchase_order_id',$purchase_order_id)->find();
        $pm -> provider_id = $productres -> provider_id ;
        $pm -> update();

        return true;
    }

    public static function addPurchase($user_id,
        $purchase_count,
        $purchase_order_id,
        $product_code,
        $product_name,
        $product_type,
        $provider_id,
        $product_brand,
        $product_cost){
        $pmodel = new productModel();
        $pmodel -> product_count = $purchase_count;
        $pmodel -> product_code = $product_code;
        $pmodel -> product_name = $product_name;
//        $pmodel -> product_price = $product_price;
        $pmodel -> product_brand = $product_brand;
        $pmodel -> product_cost = $product_cost;
        $pmodel -> product_type = $product_type;
        $pmodel -> provider_id = $provider_id;
        $productres = $pmodel -> insert();

        $resModel = new productModel();
        $resM = $resModel -> eq('product_code',$product_code)->find();
        $product_id = $resM->product_id;
        $purchaseInfoModel = new purchaseInfoModel();
        $purchaseInfoModel -> product_id = $product_id;
        $purchaseInfoModel -> purchase_count = $purchase_count;
        $purchaseInfoModel -> purchase_order_id = $purchase_order_id;
        $purchaseInfoModel -> provider_id = $provider_id;
        $purchaseInfoModel -> user_id = $user_id;
        $purchaseInfoModel -> create_time = date("Y-m-d H:i:s");
        $purchaseInfoModelres = $purchaseInfoModel -> insert();
        return true;
    }

    public static function addSellInfo($user_id,$sell_count,$sell_order_id,$product_id,$product_name)
    {
        $pmodel = new productModel();
        $pp = $pmodel -> eq('product_id',$product_id) -> find();
        if($pp->product_count<$sell_count){
            return 3;
        }
        $sellModel = new sellInfoModel();
        $sellModel -> user_id = $user_id;
        $sellModel -> sell_count = $sell_count;
//        $sellModel -> customer_company_name = $product_name;
        $sellModel -> product_id = $product_id;
        $sellModel -> customer_id = $product_name;
        $sellModel -> sell_order_id = $sell_order_id;
        $sellModel -> create_time = date('Y-m-d H:i:s');
        $sellres = $sellModel -> insert();
        $total_count = $pp->product_count;
        $pp -> product_count = $total_count - $sell_count;
        $pp -> update();
        return true;
    }

    public static function addPeople($type,$company_name,$company_phone,$contact_name
        ,$contact_address,$contact_qq,$contact_phone){
        if($type==1){
            $customerModel = new customerModel();
            $customerModel -> customer_company_name = $company_name;
            $customerModel -> customer_company_phone = $company_phone;
            $customerModel -> customer_contact_name = $contact_name;
            $customerModel -> customer_contact_address = $contact_address;
            $customerModel -> customer_contact_qq  = $contact_qq;
            $customerModel -> customer_contact_phone = $contact_phone;
            $customerModel -> customer_state = 1;
            $res = $customerModel -> insert();
        }elseif($type==2){
            $customerModel = new providerModel();
            $customerModel -> provider_company_name = $company_name;
            $customerModel -> provider_company_phone = $company_phone;
            $customerModel -> provider_contact_name = $contact_name;
            $customerModel -> provider_contact_address = $contact_address;
            $customerModel -> provider_contact_qq  = $contact_qq;
            $customerModel -> provider_contact_phone = $contact_phone;
            $customerModel -> provider_state = 1;
            $res = $customerModel -> insert();
        }
        if(is_object($res)){
            return true;
        }
        return false;
    }

    public static function getDataByCustomer($uid){
        $data = new sellInfoModel();
        $dm = $data -> eq("user_id",$uid) -> findAll();
        return $dm;
    }

    public static function getDataByProvider($uid){
        $data = new purchaseInfoModel();
        $dm = $data -> eq("user_id",$uid) -> findAll();
        return $dm;
    }

    public static function getChartDataByType($user_id,$userType,$gaptime){
        $nowtime = time();
        $date1 = "'".date('Y-m-d H:i:s',$nowtime)."'";
        $lasttime = time()- $gaptime*24*60*60;
        $data2 = "'".date('Y-m-d H:i:s',$lasttime)."'";
//            var_dump($data2);exit;
        if($userType==2){
            $provider = new purchaseInfoModel();
            $models = $provider->eq('user_id',$user_id)->where("create_time >= $data2 and create_time <= $date1")->findAll();
        }elseif($userType==3){
            //customer
            $sellInfo = new sellInfoModel();
            $models = $sellInfo->eq('user_id',$user_id)->where("create_time >= $data2 and create_time <= $date1")->findAll();
        }
        return $models;
    }

    public static function getSearchRes($type,$keyword){
        if($type%3==0){
            $searchModel = new productModel();
            if($type==0){
                $resModels = $searchModel -> eq('product_code',$keyword) -> findAll();
            }
            if($type==3){
                $resModels = $searchModel -> eq('product_name',$keyword) -> findAll();
            }
            if($type==9){
                $resModels = $searchModel -> eq('product_type',$keyword) -> findAll();
            }
        }elseif($type%3==2){
            if($type==2){
                $userModel = new userModel();
                $resModels = $userModel -> eq('user_name',$keyword) -> find();
                var_dump($resModels->sellinfo);exit;
            }
            if($type==5){
                $sellModel = new sellInfoModel();
                $resModels = $sellModel -> eq('sell_order_id',$keyword)->find();
            }
        }elseif($type%3==1){
            
        }
        return $resModels;
    }

    public static function getNoticeModels(){
        $productModel = new productModel();
        $res = $productModel->where("product_count<10")->findAll();
        return $res;
    }

    public static function getPredictModels(){
        $sellModel = new sellInfoModel();
        $nowtime = time();
        $date1 = "'".date('Y-m-d H:i:s',$nowtime)."'";
        $lasttime = time()- 30*24*60*60;
        $data2 = "'".date('Y-m-d H:i:s',$lasttime)."'";
        $res = $sellModel->where("create_time>$data2")->orderby('sell_id desc')->limit(0,10)->findAll();
        return $res;
    }

    public static function getAllCustomers(){
        $models = new customerModel();
        $customers = $models -> eq('customer_state',1) -> findAll();
        return $customers;
    }

    public static function getAllProviders(){
        $models = new providerModel();
        $customers = $models -> eq('provider_state',1) -> findAll();
        return $customers;
    }

    public static function getAllProduct($productInfo){
        $productInfo .= '';
        $product = new productModel();
        $productModel = $product -> like('product_name',$productInfo.'%')->findAll();
        $productModel = self::object_array($productModel);
        return json_encode($productModel);
    }

    private function object_array($array) {
        if(is_object($array)) {
            $array = (array)$array;
        }
        if(is_array($array)) {
            foreach($array as $key=>$value) {
                $array[$key] = self::object_array($value);
            }
        }
        return $array;
    }

    public function test(){
        echo 'test this is the vim test';
    }
}

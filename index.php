<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Shanghai');
require './extension/Flight/flight/Flight.php';
require './extension/ActiveRecord/ActiveRecord.php';

require './model/cancelInfoModel.php';
require './model/customerModel.php';
require './model/productModel.php';
require './model/providerModel.php';
require './model/userModel.php';
require './model/sellInfoModel.php';
require './model/purchaseInfoModel.php';

require './core/Core.php';
require './core/ErrorMap.php';
require './core/Db.php';
require './service/userService.php';


ActiveRecord::setDb(new PDO("mysql:host=localhost;dbname=jxc_system",
    "root",
    "shacha",
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';")
    )
);

if(Core::getSessionState()){
    $user_id = Core::getSessionId();
    global $userModel;
    $userModel = userService::getUserModelByPk($user_id);
}

Flight::route('/',function(){
    if(Core::getSessionState()){
        $user_id = Core::getSessionId();
        $userModel = userService::getUserModelByPk($user_id);
        Core::render('main',array('userModel'=>$userModel));
    }else{
        Core::render('login');
    }
});

Flight::route('/login/user', function(){
    $username = Core::r('username');
    $password = Core::r('password');
    $keeplogin = Core::r('keeplogin');
    if(!isset($username)||!isset($password)){
        Flight::redirect('/');
    }
    $userModel = userService::verifyLogin($username,$password);
    if($userModel!=false){
        Flight::redirect('/');
    }else{
        Flight::redirect('/');
    }
});

Flight::route('/main',function(){
    $user_id = Core::getSessionId();
    $userModel = userService::getUserModelByPk($user_id);
    Core::render('main',array('userModel'=>$userModel));
});

Flight::route('/userManage',function(){
    if(Core::getSessionState()){
        $user_id = Core::getSessionId();
        $userModel = userService::getUserModelByPk($user_id);
        $user_1 = userService::getUser(1);
        $user_2 = userService::getUser(2);
        $user_3 = userService::getUser(3);
        $arrayObject = array(
            'userModel' => $userModel,
            'user_1' => $user_1,
            'user_2' => $user_2,
            'user_3' => $user_3,
        );
        Core::render('manage',$arrayObject);
    }else{
        Flight::redirect('/');
    }
});
Flight::route('/modifyuser',function(){
    $uid = $_GET['id'];
    $userModel = userService::findUserById($uid);
    Core::render('modify',array('userModel'=>$userModel));
});
Flight::route('/addNew',function(){
    $type = $_GET['type'];
    Core::render('addUser',array('type'=>$type,'userModel'=>userService::getUserModelByPk(Core::getSessionId())));
});
Flight::route('/purchase',function(){
    $providerAll = userService::getAllProviders();
    Core::render('purcharse',array('userModel'=>userService::getUserModelByPk(Core::getSessionId()),'providers'=>$providerAll));
});
Flight::route('/sell',function(){
    $customers = userService::getAllCustomers();
    Core::render('sell',array('userModel'=>userService::getUserModelByPk(Core::getSessionId()),'customers'=>$customers));
});


Flight::route('/providerManage',function(){
    $array_object = array(
        'userModel' => userService::getUserModelByPk(Core::getSessionId()),
        'providers' => userService::getProviders(),
    );
   Core::render('providerManage',$array_object);
});

Flight::route('/customerManage',function(){
    $array_object = array(
        'userModel' => userService::getUserModelByPk(Core::getSessionId()),
        'providers' => userService::getCustomers(),
    );
    Core::render('customerManage',$array_object);
});
Flight::route('/addPeople',function(){
    $people = $_GET["type"];
//    var_dump($people);exit
    $array_object = array(
        'userModel' => userService::getUserModelByPk(Core::getSessionId()),
        'type' => $people,
    );
    Core::render('addPeople',$array_object);
});
Flight::route('/account',function(){
    //一个月为30,一周为7,一天为1
    $gaptime = 30;
    if(isset($_GET['gaptime'])){
        $gaptime = $_GET['gaptime'];
    }
    $userModel = userService::getUserModelByPk(Core::getSessionId());
    if ($userModel->user_type == 3) {
        $data = userService::getDataByCustomer(Core::getSessionId());
    } elseif ($userModel->user_type == 2) {
        $data = userService::getDataByProvider(Core::getSessionId());
    }
    $chartdata = userService::getChartDataByType($userModel->id, $userModel->user_type, $gaptime);
    $array_object = array(
        'userModel' => userService::getUserModelByPk(Core::getSessionId()),
        'data' => $data,
        'chart' => $chartdata,
        'gaptime' => $gaptime,
    );
//    var_dump($chartdata);exit;
    Core::render('chart', $array_object);

});

Flight::route('/search',function(){
    $res = null;
    $content = 100;
    if(isset($_POST['searchtype'])&&isset($_POST['keyword'])){
        $type = $_POST['searchtype'];
        $keyword = $_POST['keyword'];
        $res = userService::getSearchRes($type,$keyword);
		$content = $type;
    }
	
    $userModel = userService::getUserModelByPk(Core::getSessionId());
    $array_object = array(
        'res' => $res,
        'userModel' => $userModel,
        'content' => $content,
    );
    Core::render('search',$array_object);
});
Flight::route('/showall',function(){
    $userModel = userService::getUserModelByPk(Core::getSessionId());
    $noticeCount = userService::getNoticeModels();
    $predictModel = userService::getPredictModels();
    $arrayobject = array(
        'userModel' => $userModel,
        'noticeModel' => $noticeCount,
        'predictModel' => $predictModel,
    );
    Core::render('showall',$arrayobject);
});
//============================================================================
//以下为action动作
Flight::route('/modify/userInfo',function(){
    $user_password = Core::r('user_password');
    $user_id =Core::r('user_id');
    $user_name = Core::r('user_name');
    $res = userService::updateUserInfo((int)Core::getSessionId(),$user_password,$user_name,null);
    if($res){
        Core::logoutSession();
    }
    Flight::redirect('/login/user');
});
//修改用户信息
Flight::route('/modify/userManage',function(){
    $user_name = Core::r('user_name');
    $user_id = Core::r('user_id');
    $user_password = Core::r('user_password');
    $user_state = Core::r('user_state');
    $res = userService::updateUserInfo((int)$user_id,$user_password,$user_name,$user_state);
    if($res){
        Flight::redirect('/userManage');
    }
});
Flight::route('/modify/adduser',function(){
    $user_name = Core::r('user_name');
    $user_password = Core::r('user_password');
    $type = Core::r('type');
    $map = array('管理员'=>1,'进货员'=>2,'销售员'=>3);
    $type = $map[$type];
    $res = userService::addUser($user_name,$user_password,(int)$type);
    if($res){
        Flight::redirect('/userManage');
    }
});

//退出登录
Flight::route('/logout',function(){
    Core::logoutSession();
    Core::render('login');
});
Flight::route('/deleteUser',function(){
    $uid = Core::r('userid');
    $res = userService::deleteUserById((int)$uid);
    if($res){
        echo 1;
    }else{
        echo 0;
    }
});
Flight::route('/unshotUser',function(){
    $uid = Core::r('userid');
    $res = userService::unshotUserById((int)$uid);
    if($res){
        echo 1;
    }else{
        echo 0;
    }
});
Flight::route('/shotUser',function(){
    $uid = Core::r('userid');
    $res = userService::shotUserById((int)$uid);
    if($res){
        echo 1;
    }else{
        echo 0;
    }
});

Flight::route('/modifyprovider',function(){
    $uid = $_GET['id'];
    $array = array(
        'userModel' => userService::getUserModelByPk(Core::getSessionId()),
        'customerModel' => userService::getProviderByPk($uid),
    );
    Core::render('providerManageModify',$array);
});
Flight::route('/deleteprovider',function(){
    $uid = Core::r('userid');
    $res = userService::deleteProviderById((int)$uid);
    if($res){
        echo 1;
    }else{
        echo 0;
    }
});

Flight::route('/modifycustomer',function(){
    $uid = $_GET['id'];
    $array = array(
        'userModel' => userService::getUserModelByPk(Core::getSessionId()),
        'customerModel' => userService::getCustomerByPk($uid),
    );
    Core::render('customerManageModify',$array);
});
Flight::route('/deletecustomer',function(){
    $uid = Core::r('userid');
    $res = userService::deleteCustomerById((int)$uid);
    if($res){
        echo 1;
    }else{
        echo 0;
    }
});
Flight::route('/modify/customerManage',function(){
    $customer_id = Core::r('customer_id');
    $customer_company_name = Core::r('customer_company_name');
    $customer_company_phone = Core::r('customer_company_phone');
    $customer_contact_name = Core::r('customer_contact_name');
    $customer_contact_phone = Core::r('customer_contact_phone');
    $customer_contact_qq = Core::r('customer_contact_qq');
    $customer_contact_address = Core::r('customer_contact_address');
    $res = userService::updateCustomerInfo((int)$customer_id,$customer_company_name,$customer_company_phone,$customer_contact_address,
        $customer_contact_address,$customer_contact_qq,$customer_contact_phone,$customer_contact_name);
    if($res){
        Flight::redirect('/customerManage');
    }else{
        Flight::redirect('/customerManage');
    }
});
Flight::route('/purchase/add/1',function(){
    $user_id = Core::r('id');
    $purchase_count = Core::r('purchase_count');
    $purchase_order_id = 'F'.time().rand(100,999);
    $product_id = Core::r('product_id');
    $res = userService::addHavePurchase($user_id,$purchase_count,$purchase_order_id,$product_id);
    if($res){
        Flight::redirect('/purchase');
    }else{
        Flight::redirect('/purchase');
    }
});
Flight::route('/purchase/add/2',function(){
    $user_id = Core::r('id');
    $purchase_count = Core::r('purchase_count');
    $purchase_order_id = 'F'.time().rand(100,999);
    $product_code = 'E'.time().rand(100,999);
    $product_name = Core::r('product_name');
    $product_type = Core::r('product_type');
    $provider_id = Core::r('provider_id');
    $product_brand = Core::r('product_brand');
    $product_cost = Core::r('product_cost');
    $res = userService::addPurchase($user_id,
        $purchase_count,
        $purchase_order_id,
        $product_code,
        $product_name,
        $product_type,
        $provider_id,
        $product_brand,
        $product_cost);
    if($res){
        Flight::redirect('/purchase');
    }else{
        Flight::redirect('/purchase');
    }
});
Flight::route('/sell/add',function(){
    $user_id = Core::r('id');
    $sell_count = Core::r('sell_count');
    $sell_order_id = 'G'.time().rand(100,999);
    $product_id = Core::r('product_id');
    $product_name = Core::r('customer_company_name');
    $res = userService::addSellInfo($user_id,$sell_count,$sell_order_id,(int)$product_id,(int)$product_name);
    if($res == 3){
        Flight::redirect('/sell');
    }else{
        Flight::redirect('/sell');
    }
});
Flight::route("/addPeople/add",function(){
    $type = Core::r("type");
    $company_name = Core::r('company_name');
    $company_phone = Core::r("company_phone");
    $contact_name = Core::r("contact_name");
    $contact_phone = Core::r("contact_phone");
    $contact_qq = Core::r("contact_qq");
    $contact_address = Core::r("contact_address");
    $res = userService::addPeople($type,$company_name,$company_phone,$contact_name
    ,$contact_address,$contact_qq,$contact_phone);
    Flight::redirect('/customerManage');
});

Flight::route('/productNotify',function(){
//    $product_name = $_GET['productInfo'];
    $product_name = Core::r('productInfo');
//    echo $product_name;
	if($product_name==null){
		echo null;
		return true;
	}
    $productModel = userService::getAllProduct($product_name);
    foreach($productModel as $model){
        echo '<li id="'.$model->product_id.'">'.$model->product_name.'</li>';
    }
});

Flight::start();

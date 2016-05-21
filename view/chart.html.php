<?php
/**
 * Created by PhpStorm.
 * User: zuston
 * Date: 16/4/15
 * Time: 上午12:21
 */
$user_type_name = array(
    '1' => '管理员',
    '2' => '进货员',
    '3' => '销售员',
);
$table_type = array(
    'active',
    'success',
    'warning',
    'danger',
    'info',
);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'view/layout/header.layout.html.php';?>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'view/layout/sidebar.layout.html.php';?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">订单统计</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>列表详情</caption>
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th><?php echo ($userModel->user_type==3)?('销售员名'):('进销员名');?></th>
                        <th><?php echo ($userModel->user_type==3)?('零售渠道公司'):('供应渠道公司');?></th>
                        <th>商品名</th>
                        <th><?php echo ($userModel->user_type==3)?('零售数量'):('采购数量');?></th>
                        <th>订单号</th>
                        <th>创建时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($data==null){
                        echo '无记录';
                    }else{?>
                    <?php foreach($data as $key => $u1){ ?>
                        <tr class="<?php echo $table_type[$key%4];?>">
                            <td class="id"><?php echo ($userModel->user_type==3)?($u1->sell_id):($u1->purchase_id);?></td>
                            <td><?php echo $userModel->user_name;?></td>
                            <td><?php echo ($userModel->user_type==3)?($u1->customer->customer_company_name):($u1->provider->provider_company_name);?></td>
                            <td><?php echo $u1->product->product_name;?></td>
                            <td><?php echo ($userModel->user_type==3)?($u1->sell_count):($u1->purchase_count);?></td>
                            <td><?php echo ($userModel->user_type==3)?($u1->sell_order_id):($u1->purchase_order_id);?></td>
                            <td><?php echo $u1->create_time;?></td>
                        </tr>
                    <?php }}?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h1 class="page-header">报表生成</h1>
            </div>
            <div class="col-md-6" >
                <h4 style="margin-top: 40px;float: right;">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">报表日期选择<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/account?gaptime=7">当周</a></li>
                                <li><a href="/account?gaptime=1">当天</a></li>
                                <li><a href="/account?gaptime=30">当月</a></li>
                            </ul>
                        </li>
                    </ul>
                </h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption><?php if($gaptime==1){$title='当日';echo '单日';}
                        elseif($gaptime==7){$title='当周';echo '单周';}
                        elseif($gaptime==30){$title='当月';echo '单月';}?>
                        报表详情</caption>
                    <caption></caption>
                    <thead>

                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td>销售员:<?php echo $userModel->user_name?>---<?php echo $title; ?>报表</td>
                        <td></td>
                    </tr>
                    <?php
                    $totaldata = 0;
                    $totalcost = 0;
                    $providerArray = array();
					$array2 = array();
					$mtype = ($userModel->user_type==3)?true:false;
                    foreach($chart as $t){
						if($mtype){
                       		 $totaldata += $t -> sell_count;
							 if(!in_array($t->product->product_name,$providerArray)){
							 	$providerArray[] = $t->product->product_name;
							 }
							 if(!in_array($t->customer->customer_company_name,$array2)){
								 $array2[] = $t->customer->customer_company_name;
							 }
						}else{
							$totaldata += $t -> purchase_count;
							 if(!in_array($t->product->product_name,$providerArray)){
							 	$providerArray[] = $t->product->product_name;
							 }
							 if(!in_array($t->provider->provider_company_name,$array2)){
								 $array2[] = $t->provider->provider_company_name;
							 }
						}
                        $totalcost += $t -> product -> product_cost;
					}
					$string = '';
					foreach ($providerArray as $value) {
						$string .= '   ('.$value.')';
					}
					// var_dump($array2);exit;
					$string2 = '';
					foreach ($array2 as $value) {
						$string2 .= '   ('.$value.')';
					}
					?>
                    <tr>

                        <td>总计<?php echo ($userModel->user_type == 3) ? ('零售数量') : ('采购数量'); ?>:<?php echo $totaldata;?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo ($userModel->user_type == 3) ? ('零售') : ('采购'); ?>商品:<?php echo $string;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo ($userModel->user_type == 3) ? ('零售') : ('采购'); ?>总金额:<?php echo $totalcost;?>(元)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo ($userModel->user_type == 3) ? ('零售') : ('采购'); ?>渠道商:<?php echo $string2;?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button type="submit" class="btn btn-default" style="float: right">打印报表</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="view/static/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="view/static/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="view/static/js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="view/static/js/jquery.dataTables.min.js"></script>
<script src="view/static/js/dataTables.bootstrap.min.js"></script>
<script src="view/static/js/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="view/static/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        $('.modify-button').click(function () {
            var a = $(this).parent().siblings('.id');
            window.location.href = '/modifycustomer?id='+ a.text();
        });
        $('.delete-button').click(function () {
            var a = $(this).parent().siblings('.id');
            $.post('/deletecustomer',{userid: a.text()},function(data,status){
                if(data==1){
                    location.reload();
                }else{
                    alert('请重试');
                }
            });
        });

    });
</script>

</body>

</html>

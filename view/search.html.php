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
                <h1 class="page-header">查询</h1>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <form role="form" action="/search" method="post">
            <div class="col-md-2" >
                <div class="form-group">
                    <label for="name">信息查询</label>
                    <select class="form-control" name="searchtype">
                        <option value="0">商品编号查询</option>
                        <option value="3">商品名称查询</option>
                        <option value="9">商品类别查询</option>
                        <option value="2">进货人员姓名查询</option>
                        <option value="5">进货编号查询</option>
                        <option value="4">出货人员姓名查询</option>
                        <option value="7">出货编号查询</option>
                    </select>
                </div>

            </div>
            <div class="col-md-10" style="margin-top: 25px;">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="搜索仓库信息" name="keyword">
                                <span class="input-group-btn">
                                <input class="btn btn-default" type="submit">
                            </span>
                </div>
            </div>
            </form>
        </div>

<!--        CREATE TABLE `product` (-->
<!--        `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,-->
<!--        `product_code` varchar(24) DEFAULT NULL COMMENT '商品条形码',-->
<!--        `product_name` varchar(24) DEFAULT NULL COMMENT '商品名',-->
<!--        `provider_id` int(11) DEFAULT NULL COMMENT '商品来源',-->
<!--        `product_type` int(11) DEFAULT NULL COMMENT '商品类别',-->
<!--        `product_brand` varchar(24) DEFAULT NULL COMMENT '商品品牌',-->
<!--        `product_cost` int(11) DEFAULT NULL COMMENT '商品成本',-->
<!--        `product_price` int(11) DEFAULT NULL COMMENT '商品零售价',-->
<!--        `product_unit` varchar(24) DEFAULT NULL COMMENT '商品单位',-->
<!--        `product_count` int(11) DEFAULT NULL COMMENT '商品数量',-->
<!--        `product_unit_count` int(11) DEFAULT NULL COMMENT '商品单位数量',-->
<!--        PRIMARY KEY (`product_id`)-->
<!--        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;-->
<!--        -->
        <?php if($content==1){?>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>=============查询结果==============</caption>
                    <?php if($res!=null){?>
                    <thead>
                    <tr>
                        <th>商品编号</th>
                        <th>商品条形码</th>
                        <th>商品名</th>
                        <th>商品供应商</th>
                        <th>商品成本</th>
                        <th>商品库存</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($res as $key => $u1){?>
                        <tr class="<?php echo $table_type[$key%3];?>">
                            <td class="id"><?php echo $u1->product_id;?></td>
                            <td><?php echo $u1->product_code;?></td>
                            <td><?php echo $u1->product_name;?></td>
                            <td><?php echo $u1->provider_id;?></td>
                            <td><?php echo $u1->product_cost;?></td>
                            <td><?php echo $u1->product_count;?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                    <?php }else{?>
                    <h5>无此库存</h5>
                    <?php }?>
                </table>
            </div>
        </div>
        <?php }?>

        <?php if($content==2){?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <caption>=============查询结果==============</caption>
                        <?php if($res!=null){?>
                            <thead>
<!---->
<!--                            Field                 | Type             | Null | Key | Default | Extra          |-->
<!--                            +-----------------------+------------------+------+-----+---------+----------------+-->
<!--                            | sell_id               | int(11) unsigned | NO   | PRI | NULL    | auto_increment |-->
<!--                            | customer_company_name | varchar(24)      | YES  |     | NULL    |                |-->
<!--                            | product_id            | int(11)          | YES  |     | NULL    |                |-->
<!--                            | sell_count            | int(11)          | YES  |     | NULL    |                |-->
<!--                            | sell_order_id         | int(11)          | YES  |     | NULL    |                |-->
<!--                            | create_time           | datetime         | YES  |     | NULL    |                |-->
<!--                            | user_id               | int(11)          | YES  |     | NULL    |-->
<!--                            -->
                            <tr>
                                <th>销售编号</th>
                                <th>零售公司</th>
                                <th>商品编号</th>
                                <th>零售数量</th>
                                <th>零售订单</th>
                                <th>创建时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($res as $key => $u1){?>
                                <tr class="<?php echo $table_type[$key%3];?>">
                                    <td class="id"><?php echo $u1->sell_id;?></td>
                                    <td><?php echo $u1->customer_company_name;?></td>
                                    <td><?php echo $u1->product_id;?></td>
                                    <td><?php echo $u1->sell_count;?></td>
                                    <td><?php echo $u1->sell_order_id;?></td>
                                    <td><?php echo $u1->create_time;?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        <?php }else{?>
                            <h5>无此库存</h5>
                        <?php }?>
                    </table>
                </div>
            </div>
        <?php }?>


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

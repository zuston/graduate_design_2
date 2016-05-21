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
    'info'
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
                <h1 class="page-header">智能提醒预测</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>商品提醒</caption>
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
                    <?php foreach($noticeModel as $key => $u1){?>
                        <tr class="<?php echo $table_type[$key%3];?>">
                            <td class="id"><?php echo $u1->product_id;?></td>
                            <td><?php echo $u1->product_code;?></td>
                            <td><?php echo $u1->product_name;?></td>
                            <td><?php echo $u1->provider->provider_company_name;?></td>
                            <td><?php echo $u1->product_cost;?></td>
                            <td><?php echo $u1->product_count;?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>下月采购提醒</caption>
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
                    <?php foreach($predictModel as $key => $u1){?>
                        <tr class="<?php echo $table_type[$key%4];?>">
                            <td class="id"><?php echo $u1->product->product_id;?></td>
                            <td><?php echo $u1->product->product_code;?></td>
                            <td><?php echo $u1->product->product_name;?></td>
                            <td><?php echo $u1->customer->customer_company_name;?></td>
                            <td><?php echo $u1->product->product_cost;?></td>
                            <td><?php echo $u1->product->product_count;?></td>
                        </tr>
                    <?php }?>

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
            window.location.href = '/modifyuser?id='+ a.text();
        });
        $('.delete-button').click(function () {
            var a = $(this).parent().siblings('.id');
            $.post('/deleteUser',{userid: a.text()},function(data,status){
                if(data==1){
                    location.reload();
                }else{
                    alert('请重试');
                }
            });
        });

        $('.unshut-button').click(function () {
            var a = $(this).parent().siblings('.id');
            $.post('/unshotUser',{userid: a.text()},function(data,status){
                if(data==1){
                    location.reload();
                }else{
                    alert('请重试');
                }
            });
        });

        $('.shut-button').click(function () {
            var a = $(this).parent().siblings('.id');
            $.post('/shotUser',{userid: a.text()},function(data,status){
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

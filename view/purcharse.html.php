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

            <div class="col-md-6">
                <div class="col-lg-12">
                    <h1 class="page-header">新商品进货登记</h1>
                </div>
                <form role="form" action="/purchase/add/2" method="post">
                    <div class="form-group" hidden>
                        <label>人员id</label>
                        <input class="form-control"  name="id" value='<?php echo $userModel->id;?>'>
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>进货数量</label>
                        <input class="form-control"  name="purchase_count">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>商品名</label>
                        <input class="form-control" name="product_name">
                    </div>
                    <div class="form-group">
                        <label>商品类别(如无供应商,请先进行添加)</label>
                        <select class="form-control" name="product_type">
                            <option value="1">电器</option>
                            <option value="2">数码</option>
                            <option value="3">家居</option>
                            <option value="4">化妆品</option>
                            <option value="5">鞋帽</option>
                            <option value="6">衣服</option>
                            <option value="7">运动户外</option>
                            <option value="8">汽车</option>
                            <option value="9">母婴</option>
                            <option value="10">医药保健</option>
                            <option value="11">图书</option>
                            <option value="12">奢侈品</option>
                            <option value="13">虚拟商品</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>商品供应商</label>
                        <select class="form-control" name="provider_id">
                            <?php foreach($providers as $provider){?>
                                <option value="<?php echo $provider->provider_id;?>"><?php echo $provider->provider_company_name;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>商品品牌</label>
                        <input class="form-control" name="product_brand">
                    </div>
                    <div class="form-group">
                        <label>商品成本</label>
                        <input class="form-control" name="product_cost">
                    </div>


                    <button type="submit" class="btn btn-default" style="float: right">增加</button>
                </form>
            </div>

            <div class="col-md-6">
                <div class="col-lg-12">
                    <h1 class="page-header">增加库存登记</h1>
                </div>
                <form role="form" action="/purchase/add/1" method="post">
                    <div class="form-group" hidden>
                        <label>人员id</label>
                        <input class="form-control"  name="id" value='<?php echo $userModel->id;?>'>
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>进货数量</label>
                        <input class="form-control"  name="purchase_count">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>商品id号</label>
                        <input class="form-control" name="product_id">
                    </div>


                    <button type="submit" class="btn btn-default" style="float: right">保存</button>
                </form>
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
    });
</script>

</body>

</html>
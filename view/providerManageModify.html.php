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
            <div class="col-lg-12">
                <h1 class="page-header">修改< <?php echo $providerModel->provider_company_name;?> >供应商的信息</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-6">
                <form role="form" action="/modify/customerManage" method="post">
                    <div class="form-group">
                        <label>编号</label>
                        <input class="form-control" value="<?php echo $customerModel->customer_id;?>" name="customer_id" >
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>供应商名</label>
                        <input class="form-control"  value="<?php echo $customerModel->customer_company_name;?>" name="customer_company_name">
                    </div>
                    <div class="form-group">
                        <label>供应商电话</label>
                        <input class="form-control"  value="<?php echo $customerModel->customer_company_phone;?>" name="customer_company_phone">
                    </div>
                    <div class="form-group">
                        <label>联系人姓名</label>
                        <input class="form-control"  value="<?php echo $customerModel->customer_contact_name;?>" name="customer_contact_name">
                    </div>
                    <div class="form-group">
                        <label>联系人电话</label>
                        <input class="form-control"  value="<?php echo $customerModel->customer_contact_phone;?>" name="customer_contact_phone">
                    </div>
                    <div class="form-group">
                        <label>联系人qq</label>
                        <input class="form-control"  value="<?php echo $customerModel->customer_contact_qq;?>" name="customer_contact_qq">
                    </div>
                    <div class="form-group">
                        <label>联系人住址</label>
                        <input class="form-control"  value="<?php echo $customerModel->customer_contact_address;?>" name="customer_contact_address">
                    </div>

                    <button type="submit" class="btn btn-default" style="float: right">修改</button>
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

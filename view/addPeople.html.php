<?php
/**
 * Created by PhpStorm.
 * User: zuston
 * Date: 16/4/15
 * Time: 上午12:21
 */
$user_type_name = array(
    '1' => '零售商',
    '2' => '供应商',
);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include "view/layout/header.layout.html.php";?>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "view/layout/sidebar.layout.html.php";?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">新增------<?php echo $user_type_name[$type];?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-6">
<!--                CREATE TABLE `provider` (-->
<!--                `provider_id` int(11) unsigned NOT NULL AUTO_INCREMENT,-->
<!--                `provider_company_name` varchar(24) DEFAULT NULL,-->
<!--                `provider_company_phone` varchar(24) DEFAULT NULL,-->
<!--                `provider_contact_name` varchar(24) DEFAULT NULL,-->
<!--                `provider_contact_phone` varchar(24) DEFAULT NULL,-->
<!--                `provider_contact_qq` varchar(24) DEFAULT NULL,-->
<!--                `provider_contact_address` varchar(24) DEFAULT NULL,-->
<!--                `provider_state` tinyint(11) DEFAULT NULL COMMENT '0:删除1：未删除',-->
<!--                PRIMARY KEY (`provider_id`)-->
<!--                ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;-->
                <form role="form" action="/addPeople/add" method="post" id="form">
                    <div class="form-group" hidden>
                        <label>type id</label>
                        <input class="form-control"  name="type" value="<?php echo $type;?>">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>公司名称</label>
                        <input class="form-control required"  name="company_name" class="required" id="string">
                        <p class="help-block"></p>
                    </div>
                    <div class="form-group">
                        <label>公司电话</label>
                        <input class="form-control required" name="company_phone" minlength="5">
                    </div>
                    <div class="form-group">
                        <label>联系人名称</label>
                        <input class="form-control required"  name="contact_name">
                        <p class="help-block"></p>
                    </div>
                    <div class="form-group">
                        <label>联系人电话</label>
                        <input class="form-control required" minlength="5"  name="contact_phone">
                        <p class="help-block"></p>
                    </div>
                    <div class="form-group">
                        <label>联系人qq</label>
                        <input class="form-control required" minlength="5" name="contact_qq">
                        <p class="help-block"></p>
                    </div>
                    <div class="form-group">
                        <label>联系人地址</label>
                        <input class="form-control required"  name="contact_address">
                        <p class="help-block"></p>
                    </div>

                    <button type="submit" class="btn btn-default" style="float: right">新增</button>
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
<script src="view/static/js/jquery.validate.min.js"></script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        $("#form").validate();

    });
</script>

</body>

</html>

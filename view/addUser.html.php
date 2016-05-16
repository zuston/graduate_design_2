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
                <form role="form" action="/modify/adduser" method="post">
                    <div class="form-group">
                        <label>编号</label>
                        <input class="form-control"  name="user_id" disabled>
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>姓名</label>
                        <input class="form-control" name="user_name">
                    </div>
                    <div class="form-group">
                        <label>身份</label>
                        <input class="form-control" value="<?php echo $user_type_name[$type];?>"  name="type">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>密码</label>
                        <input class="form-control"  name="user_password">
                        <p class="help-block">Example block-level help text here.</p>
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

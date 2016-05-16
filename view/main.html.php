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
//var_dump($user_type_name[$userModel->user_type]);exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>

   <?php include "view/layout/header.layout.html.php";?>

</head>

<body>

<div id="wrapper">

    <?php include 'view/layout/sidebar.layout.html.php';?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">个人信息</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="#" class="thumbnail">
                    <img src="view/static/pic/kittens.jpg"
                         alt="通用的占位符缩略图">
                </a>
                <span class="glyphicon glyphicon-th-large"> www.google.com </span>
                <br>
                <span class="glyphicon glyphicon-save"> 苏州 </span>
                <br>
                <span class="glyphicon glyphicon-th-large"> 江苏师范大学 </span>
                <br>
                <span class="glyphicon glyphicon-th-large"> 本科 </span>
            </div>
            <div class="col-md-6">
                <form role="form" action="/modify/userInfo" method="post">
                    <div class="form-group">
                        <label>编号</label>
                        <input class="form-control" disabled="" value="<?php echo $userModel->id;?>" name="user_id">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>姓名</label>
                        <input class="form-control"  value="<?php echo $userModel->user_name;?>" name="user_name">
                    </div>
                    <div class="form-group">
                        <label>身份</label>
                        <input class="form-control" disabled="" value="<?php echo $user_type_name[$userModel->user_type];?>">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>密码</label>
                        <input class="form-control" value="<?php echo $userModel->user_password;?>" name="user_password">
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

<?php include 'view/layout/footer.js.html.php';?>

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

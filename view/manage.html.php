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
            <div class="col-lg-12">
                <h1 class="page-header">人员管理</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>管理员管理<button class="btn btn-primary btn-xs add-new-button" style="float: right;"><a href="/addnew?type=1" style="color: #ffffff;">新增管理员</a></button></caption>
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>用户名</th>
                        <th>密码</th>
                        <th>创建时间</th>
                        <th>状态</th>
                        <th>修改</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($user_1 as $key => $u1){ if($u1->id!=Core::getSessionId()){?>
                    <tr class="<?php echo $table_type[$key%3];?>">
                        <td class="id"><?php echo $u1->id;?></td>
                        <td><?php echo $u1->user_name;?></td>
                        <td><?php echo $u1->user_password;?></td>
                        <td><?php echo $u1->create_time;?></td>
                        <td><?php echo $u1->user_state?('<button type="button" class="btn btn-success btn-xs">活跃</button>'):('<button type="button" class="btn btn-danger btn-xs">禁用</button>');?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs modify-button">修改</button>
                            <button type="button" class="btn btn-warning btn-xs delete-button">删除</button>
                            <?php echo $u1->user_state?('<button type="button" class="btn btn-info btn-xs shut-button">禁用</button>'):('<button type="button" class="btn btn-default btn-xs unshut-button">解禁</button>');?>
                        </td>
                    </tr>
                    <?php }}?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>进货员管理<button class="btn btn-primary btn-xs add-new-button" style="float: right;"><a href="/addnew?type=2" style="color: #ffffff;">新增进货员</a></button></caption>
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>用户名</th>
                        <th>密码</th>
                        <th>创建时间</th>
                        <th>状态</th>
                        <th>修改</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($user_2 as $key => $u1){ if($u1->id!=Core::getSessionId()){?>
                        <tr class="<?php echo $table_type[$key%3];?>">
                            <td class="id"><?php echo $u1->id;?></td>
                            <td><?php echo $u1->user_name;?></td>
                            <td><?php echo $u1->user_password;?></td>
                            <td><?php echo $u1->create_time;?></td>
                            <td><?php echo $u1->user_state?('<button type="button" class="btn btn-success btn-xs">活跃</button>'):('<button type="button" class="btn btn-danger btn-xs">禁用</button>');?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs modify-button">修改</button>
                                <button type="button" class="btn btn-warning btn-xs delete-button">删除</button>
                                <?php echo $u1->user_state?('<button type="button" class="btn btn-info btn-xs shut-button">禁用</button>'):('<button type="button" class="btn btn-default btn-xs unshut-button">解禁</button>');?>
                            </td>
                        </tr>
                    <?php }}?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>销售员管理<button class="btn btn-primary btn-xs add-new-button" style="float: right;"><a href="/addnew?type=3" style="color: #ffffff;">新增销售员</a></button></caption>
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>用户名</th>
                        <th>密码</th>
                        <th>创建时间</th>
                        <th>状态</th>
                        <th>修改</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($user_3 as $key => $u1){ if($u1->id!=Core::getSessionId()){?>
                        <tr class="<?php echo $table_type[$key%3];?>">
                            <td class="id"><?php echo $u1->id;?></td>
                            <td><?php echo $u1->user_name;?></td>
                            <td><?php echo $u1->user_password;?></td>
                            <td><?php echo $u1->create_time;?></td>
                            <td><?php echo $u1->user_state?('<button type="button" class="btn btn-success btn-xs">活跃</button>'):('<button type="button" class="btn btn-danger btn-xs">禁用</button>');?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs modify-button">修改</button>
                                <button type="button" class="btn btn-warning btn-xs delete-button">删除</button>
                                <?php echo $u1->user_state?('<button type="button" class="btn btn-info btn-xs shut-button">禁用</button>'):('<button type="button" class="btn btn-default btn-xs unshut-button">解禁</button>');?>
                            </td>
                        </tr>
                    <?php }}?>
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
                    alert('删除成功');
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
                    alert('解禁成功');
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
                    alert('禁用人员成功');
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

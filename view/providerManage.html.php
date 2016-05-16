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
                <h1 class="page-header">供应商管理</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>列表详情<button class="btn btn-primary btn-xs add-new-button" style="float: right;"><a href="/addPeople?type=2" style="color: #ffffff;">新增供应商</a></button></caption>
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>供应商名</th>
                        <th>电话</th>
                        <th>联系人名</th>
                        <th>联系人电话</th>
                        <th>联系人qq</th>
                        <th>联系人住址</th>
                        <th>修改</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($providers as $key => $u1){ ?>
                        <tr class="<?php echo $table_type[$key%3];?>">
                            <td class="id"><?php echo $u1->provider_id;?></td>
                            <td><?php echo $u1->provider_company_name;?></td>
                            <td><?php echo $u1->provider_company_phone;?></td>
                            <td><?php echo $u1->provider_contact_name;?></td>
                            <td><?php echo $u1->provider_contact_phone;?></td>
                            <td><?php echo $u1->provider_contact_qq;?></td>
                            <td><?php echo $u1->provider_contact_address;?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs modify-button">修改</button>
                                <button type="button" class="btn btn-warning btn-xs delete-button">删除</button>
                            </td>
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
            window.location.href = '/modifyprovider?id='+ a.text();
        });
        $('.delete-button').click(function () {
            var a = $(this).parent().siblings('.id');
            $.post('/deleteprovider',{userid: a.text()},function(data,status){
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

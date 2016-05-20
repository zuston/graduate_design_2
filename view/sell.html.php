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
    <style type="text/css">
        .list_box {
            position:relative;
            /*width:200px;*/
            /*margin-left:200px;*/
            background:#f3f3f3;
            border:1px solid #CCC;
        }
        .keywords_list {
            margin:0;
            padding:0;
            list-style:none;
        }
        .hover {
            background:#33CCFF;
            color:#333333;
        }
    </style>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'view/layout/sidebar.layout.html.php';?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">出货登记</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-6">
                <form role="form" action="/sell/add" method="post">
                     <div class="form-group" hidden>
                        <label>人员id</label>
                        <input class="form-control"  name="id" value='<?php echo $userModel->id;?>'>
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>出货数量</label>
                        <input class="form-control"  name="sell_count">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>商品名</label>
                        <input class="form-control" id="product_listen">
                        <div class="list_box">
                            <div class="keywords_list"></div>
                        </div>
                    </div>

                    <div class="form-group" hidden>
                        <input class="form-control" name="product_id" id="product_listen_real">
                    </div>


                    <div class="form-group">
                        <label>零售商</label>
                        <select class="form-control" name="customer_company_name">
                            <?php foreach($customers as $customer){?>
                            <option value="<?php echo $customer->customer_id;?>"><?php echo $customer->customer_company_name;?></option>
                            <?php }?>
                        </select>

                    </div>

                    <button type="submit" class="btn btn-default" style="float: right">出货</button>
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

        $('.list_box').hide();
        $('#product_listen').keyup(function(){
            var keywords = $('#product_listen').val();
            $.post('/productNotify',{productInfo: keywords},function(data,status){
                if(data!=null){
                    $('.list_box').show();
                    $('.keywords_list').html(data);
                    $('li').hover(function(){
                        $(this).addClass('hover');
                    },function(){
                        $(this).removeClass('hover');
                    });
                    $('li').click(function(){
                        $('#product_listen').val($(this).text());
                        $('#product_listen_real').val($(this).attr('id'));
                        $('.list_box').hide();
                    });
                }else{
                    alert('请重试');
                }
            });
            return false;
        });
    });
</script>

</body>

</html>

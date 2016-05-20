<?php
/**
 * Created by PhpStorm.
 * User: zuston
 * Date: 16/5/15
 * Time: 下午1:54
 */

?>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">进销存管理系统</a>
    </div>
    <!-- /.navbar-header -->


    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/showall"><i class="fa fa-dashboard fa-fw"></i>仓库信息</a>
                </li>
                <?php if($userModel->user_type==2){?>
                <li>
                    <a href="/purchase"><i class="fa fa-dashboard fa-fw"></i>进货登记</a>
                </li>
                <?php }?>

                <?php if($userModel->user_type==3){?>
                <li>
                    <a href="/sell"><i class="fa fa-dashboard fa-fw"></i>销售登记</a>
                </li>
                <?php }?>

                <li>
                    <a href="/search"><i class="fa fa-dashboard fa-fw"></i>信息查询</a>
                </li>

                <?php if($userModel->user_type == 2 || $userModel->user_type ==3){?>
                <li>
                    <a href="/account"><i class="fa fa-dashboard fa-fw"></i>总体统计</a>
                </li>
                <?php }?>

                <?php if($userModel->user_type == 1 || 1){?>
                <li>
                    <a href="/userManage"><i class="fa fa-dashboard fa-fw"></i>用户管理</a>
                </li>
                <?php } ?>

                <?php if($userModel->user_type == 2 || $userModel->user_type == 1){?>
                <li>
                    <a href="/providerManage"><i class="fa fa-table fa-fw"></i>供应商管理</a>
                </li>
                <?php }?>

                <?php if($userModel->user_type == 3 || $userModel->user_type == 1){?>
                <li>
                    <a href="/customerManage"><i class="fa fa-table fa-fw"></i>零售商管理</a>
                </li>
                <?php }?>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>个人信息管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/logout">退出登录</a>
                        </li>
                        <li>
                            <a href="/main">个人信息设置</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

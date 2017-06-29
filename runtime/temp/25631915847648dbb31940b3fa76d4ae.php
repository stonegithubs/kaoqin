<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./public/static/admin/login\index.html";i:1494505862;s:38:"./public/static/admin/public\base.html";i:1494505862;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>用户登录</title>
    <link href="<?php echo PUB_PATH; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo PUB_PATH; ?>css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo PUB_PATH; ?>js/html5shiv.js"></script>
    <script src="<?php echo PUB_PATH; ?>js/respond.min.js"></script>
    <![endif]-->
</head>



<body class="login-body">
<div class="container">

    <form class="form-signin" action="<?php echo url('Admin/login/index'); ?>" method="post">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">欢迎登录企业考勤管理后台</h1>
            <img src="<?php echo PUB_PATH; ?>images/login-logo.png" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" class="form-control" name="username" placeholder="用户名" autofocus>
            <input type="password" class="form-control" name="password" placeholder="密码">

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>
            <label class="checkbox">
               <span class="pull-left">
                    <a data-toggle="modal" href="#"> 回到首页</a>

                </span>
            </label>

        </div>

    </form>

</div>
</body>

<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo PUB_PATH; ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/bootstrap.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/modernizr.min.js"></script>

js

</body>
</html>

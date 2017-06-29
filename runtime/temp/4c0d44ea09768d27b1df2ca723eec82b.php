<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:46:"./public/static/index/employee\editpasswd.html";i:1494505862;s:38:"./public/static/index/public\base.html";i:1494505862;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>企业考勤管理系统首页</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>
    
<link href="<?php echo PUB_PATH; ?>css/style.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>css/style-responsive.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>css/passwd.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="<?php echo PUB_PATH; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo PUB_PATH; ?>js/html5shiv.js"></script>
    <script src="<?php echo PUB_PATH; ?>js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php/Index/index">企业考勤管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php if($user['eId'] == ''): ?>
            <form class="navbar-form navbar-right">
                <a href="/index.php/Index/login/" class="btn btn-success">登录</a>
            </form>
            <?php else: ?>
            <form class="navbar-form navbar-right">
                <font color="white">欢迎你！</font>>
                <!-- Split button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-success">员工<?php echo $user['eId']; ?></button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo url('Index/employee/index'); ?>">个人基本信息</a></li>
                        <li><a href="<?php echo url('Index/Schedule/index'); ?>">排班</a></li>
                        <li><a href="<?php echo url('Index/Attendanc/index'); ?>">出勤</a></li>
                        <li><a href="<?php echo url('Index/Travel/travellist'); ?>">出差</a></li>
                        <li><a href="<?php echo url('Index/Leave/leavelist'); ?>">请假</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo url('Index/employee/editpasswd'); ?>">修改密码</a></li>
                        <li><a href="<?php echo url('Index/login/out'); ?>">退出</a></li>
                    </ul>
                </div>
            </form>
            <?php endif; ?>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<section class="panel passwd">
    <header class="panel-heading">
        <h3>修改密码</h3>
    </header>
    <div class="panel-body">
        <form role="form" class="form-horizontal adminex-form" id="editpasswd_Form" method="post" action="<?php echo url('Index/employee/editpasswd'); ?>">
            <div class="form-group has-success">
                <label for="password" class="col-lg-2 control-label">旧密码</label>
                <div class="col-lg-3">
                    <input type="password" name="password" placeholder="旧密码" id="password" class="form-control">
                </div>
            </div>
            <div class="form-group has-success">
                <label for="newpassword" class="col-lg-2 control-label">新的密码</label>
                <div class="col-lg-3">
                    <input type="password" name="newpassword" placeholder="新的密码" id="newpassword" class="form-control">
                </div>
            </div>
            <div class="form-group has-success">
                <label for="confirm_password" class="col-lg-2 control-label">确认密码</label>
                <div class="col-lg-3">
                    <input type="password" name="confirm_password" placeholder="确认密码" id="confirm_password" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-3">
                    <button class="btn btn-primary" type="submit">提交</button>
                </div>
            </div>
        </form>
    </div>
</section>

<div class="container footer">
    <hr>
    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>

</div>
<script src="<?php echo PUB_PATH; ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/editpasswd.js"></script>

</body>
</html>
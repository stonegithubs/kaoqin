<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./public/static/index/leave\index.html";i:1490946995;s:38:"./public/static/index/public\base.html";i:1491026328;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-datepicker/css/datepicker-custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-timepicker/css/timepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />

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
                        <li><a href="#">出勤</a></li>
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
        <h3>申请请假</h3>

    </header>
    <div class="panel-body">
        <font color="red" style="margin-left: 60px">注：请假最多只能请三天！</font><br/>
        <form role="form" class="form-horizontal adminex-form" id="leave_Form" method="post" action="<?php echo url('Index/leave/commit'); ?>" redireturl="<?php echo url('Index/index'); ?>">
            <div class="form-group has-success">
                <label for="starttime" class="col-lg-2 control-label">开始时间</label>
                <div class="col-lg-3">
                    <input type="text" name="starttime" placeholder="开始时间" id="starttime" class="form-control form-control-inline input-medium default-date-picker">
                </div>
            </div>
            <div class="form-group has-success">
                <label for="endtime" class="col-lg-2 control-label">结束时间</label>
                <div class="col-lg-3">
                    <input type="text" name="endtime" placeholder="结束时间" id="endtime" class="form-control form-control-inline input-medium default-date-picker">
                </div>
            </div>
            <div class="form-group has-success">
                <label for="mark" class="col-lg-2 control-label">请假原因</label>
                <div class="col-lg-3">
                    <textarea rows="3" class="form-control" id="mark" name="mark"></textarea>
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
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/leave.js"></script>
<script src="<?php echo PUB_PATH; ?>js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?php echo PUB_PATH; ?>js/pickers-init.js"></script>

</body>
</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:42:"./public/static/index/attendanc\index.html";i:1491047888;s:38:"./public/static/index/public\base.html";i:1491043071;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>企业考勤管理系统首页</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>
    
<style>
    .calendar{
        margin-top: 70px;
        margin-left: 250px;
    }
</style>
<link href="<?php echo PUB_PATH; ?>js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
<link href="<?php echo PUB_PATH; ?>css/style.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>css/style-responsive.css" rel="stylesheet">

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

<div class="container col-md-9">

<section class="panel calendar">
    <h3>出勤</h3><br/>
    <div id="calendar" class="has-toolbar"></div>
</section>

<div class="container footer">
    <hr>
    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>

</div>
<script src="<?php echo PUB_PATH; ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/modernizr.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/jquery.nicescroll.js"></script>

<script src="<?php echo PUB_PATH; ?>js/fullcalendar/fullcalendar.min.js"></script>
    <script>
        /* initialize the calendar
         -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                // right: 'month,basicWeek,basicDay'
                right:''
            },
            editable: false,
            droppable: false, // this allows things to be dropped onto the calendar !!!
            events: [
                <?php if(is_array($days) || $days instanceof \think\Collection || $days instanceof \think\Paginator): $i = 0; $__LIST__ = $days;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$day): $mod = ($i % 2 );++$i;if($day['isTravel'] == 1): ?>
                {
                    title: '你出差哦！',
                    start: new Date(y, m, d+<?php echo $day['day']; ?>)
                },
                <?php elseif($day['isLevel'] == 1): ?>
                {
                    title: '你请假哦！',
                        start: new Date(y, m, d+<?php echo $day['day']; ?>)
                },
                <?php else: if($day['isrecord'] == 1): ?>
                        {
                            title: "<?php echo $day['title']; ?>",
                            start: new Date(y, m, d+<?php echo $day['day']; ?>)
                        },
                    <?php else: ?>
                        {
                            title: '你没有打卡哦！',
                            start: new Date(y, m, d+<?php echo $day['day']; ?>)
                        },
                    <?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>

            ]
        });
    </script>

<!--common scripts for all pages-->
<script src="<?php echo PUB_PATH; ?>js/scripts.js"></script>

</body>
</html>
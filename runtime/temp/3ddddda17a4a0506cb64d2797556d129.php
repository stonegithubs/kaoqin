<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./public/static/index/login\index.html";i:1494505862;s:38:"./public/static/index/public\base.html";i:1494505862;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>企业考勤管理系统首页</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>
    
<link href="<?php echo PUB_PATH; ?>css/signin.css" rel="stylesheet">

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

<div class="container">

    <form class="form-signin" id="form-signin" method="post" action="<?php echo url('index/login/login'); ?>">
        <h2 class="form-signin-heading">用户登录</h2>
        <label for="empId" class="sr-only">count</label>
        <input  type="text" id="empId" name="empId" class="form-control" placeholder="员工编号">
        <label for="password" class="sr-only">密码</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="密码">
        <label for="validte_code" class="sr-only">验证码</label>
        <input type="text" id="validte_code" name="validte_code" class="form-control" placeholder="验证码">
        <img src="<?php echo captcha_src(); ?>" class="captcha" alt="captcha" />
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> 记住我
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
    </form>

</div> <!-- /container -->

<div class="container footer">
    <hr>
    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>

</div>
<script src="<?php echo PUB_PATH; ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/bootstrap.min.js"></script>

<script>
    //刷新验证码
    var captcha = $(".captcha").attr("src");
    $(".captcha").click(function(){
        if( captcha.indexOf('?')>0){
            $(".captcha").attr("src", captcha+'&random='+Math.random());
        }else{
            $(".captcha").attr("src", captcha.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });
</script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/jquery.validate.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/login_valite.js"></script>

</body>
</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./public/static/index/index\index.html";i:1494505862;s:38:"./public/static/index/public\base.html";i:1494505862;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>企业考勤管理系统首页</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>
    
<link href="<?php echo PUB_PATH; ?>css/jumbotron.css" rel="stylesheet">

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

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>欢迎您！</h1>
        <p> 此系统主要是方便公司员工进行考勤记录以及考勤记录查询，员工打卡请点击这里！</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button" value="1" id="sign">上班打卡 &raquo;</a></p>
    </div>
</div>

<div class="container">
    <!--<div class="panel panel-default">-->
        <!--<div class="panel-heading"><h2>企业最新公告</h2></div>-->
        <!--<div class="panel-body">-->
            <div class="row">
                <?php if(is_array($adv) || $adv instanceof \think\Collection || $adv instanceof \think\Paginator): $i = 0; $__LIST__ = $adv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?>
                <div class="col-md-4">
                    <h4><?php echo msubstr($ad['title'],0,20); ?></h4>
                    <p><?php echo msubstr($ad['content'],0,60); ?>
                    </p>
                    <p><a class="btn btn-default" href="<?php echo url('Index/Info/detail',['id'=>$ad['advId']]); ?>" role="button">详情&raquo;</a></p>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <ul class="pagination" style="float: right">
                    <?php echo $adv->render(); ?>

                </ul>
            </div>
</div>

<div class="container footer">
    <hr>
    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>

</div>
<script src="<?php echo PUB_PATH; ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/bootstrap.min.js"></script>

<script>
    $('#sign').bind('click',function () {
        $.ajax({
            type : "POST",  //提交方式
            url : "<?php echo url('Index/Sign/sign'); ?>",//路径
            success:function(result){
                if(result['status']!=1){
                    alert(result['msg']);
                }else{
                    alert(result['msg']);
                    window.location.href="<?php echo url('Index/index'); ?>";
                }

            }
        });
    });
    </script>

</body>
</html>
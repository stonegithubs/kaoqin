<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./public/static/admin/index\index.html";i:1489546343;s:44:"./public/static/admin/public\admin_base.html";i:1491035650;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>后台首页</title>
    
<link href="<?php echo PUB_PATH; ?>css/clndr.css" rel="stylesheet">
<!--gritter css-->
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/gritter/css/jquery.gritter.css" />



    <link href="<?php echo PUB_PATH; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo PUB_PATH; ?>css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo PUB_PATH; ?>js/html5shiv.js"></script>
    <script src="<?php echo PUB_PATH; ?>js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="sticky-header">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="#"><img src="<?php echo PUB_PATH; ?>images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="#"><img src="<?php echo PUB_PATH; ?>images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">
            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="menu-list nav-active"><a href="<?php echo url('Admin/schedule/index'); ?>"><i class="fa fa-home"></i> <span>首页</span></a>
                    <ul class="sub-menu-list">
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>考勤管理</span></a>
                    <ul class="sub-menu-list">
                        <li class="active"><a href="<?php echo url('Admin/schedule/index'); ?>"> 今日出勤</a></li>
                        <li ><a href="<?php echo url('Admin/schedule/scheduleList'); ?>">排班管理</a></li>
                        <li ><a href="<?php echo url('Admin/level/index'); ?>">请假管理</a></li>
                        <li ><a href="<?php echo url('Admin/travel/index'); ?>">出差管理</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-file-text"></i> <span>基本信息管理</span></a>
                    <ul class="sub-menu-list">
                        <li ><a href="<?php echo url('Admin/dept/deptList'); ?>">部门信息管理</a></li>
                        <li ><a href="<?php echo url('Admin/employee/index'); ?>">员工信息管理</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-envelope"></i> <span>信息公告管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="<?php echo url('Admin/Adv/index'); ?>">公告列表</a></li>
                    </ul>
                </li>
                <?php if($isAdmin == '1'): ?>
                <li class="menu-list"><a href=""><i class="fa fa-map-marker"></i> <span>用户管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="<?php echo url('Admin/user/userlist'); ?>">用户列表</a></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->
            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">

                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo PUB_PATH; ?>images/photos/user-avatar.png" alt="" />
                            <?php echo $username; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <!--<li><a href="#"><i class="fa fa-cog"></i> 个人设置</a></li>-->
                            <li><a href="<?php echo url('Admin/login/out'); ?>"><i class="fa fa-sign-out"></i>退出登录</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->
        <!--alert pannel-->
        <div id="alert">
            <div class="alert alert-success fade in " style="display: none">
                <button class="close close-sm" type="button" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                <strong>删除成功!</strong>
            </div>
            <div class="alert alert-block alert-danger fade in" style="display:none;">
                <button class="close close-sm" type="button" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                <strong>对不起，你没有操作权限！</strong>
            </div>
        </div>
        <!--alert pannel-->
        
<!-- page heading start-->
<!-- page heading start-->
<div class="page-heading">
    <h3>
        欢迎登录企业考勤管理系统！
    </h3>
    <ul class="breadcrumb">
        <li>
            首页
        </li>
        <li class="active"> 仪表盘 </li>
    </ul>
</div>
<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-body">
                    <div class="calendar-block ">
                        <div class="cal1">

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <header class="panel-heading">
                    Todo List
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                </header>
                <div class="panel-body">
                    <ul class="to-do-list" id="sortable-todo">
                        <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                            <div class="todo-check pull-left">
                                <input type="checkbox" value="None" id="todo-check"/>
                                <label for="todo-check"></label>
                            </div>
                            <p class="todo-title">
                                Dashboard Design & Wiget placement
                            </p>
                            <div class="todo-actionlist pull-right clearfix">

                                <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </li>
                        <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                            <div class="todo-check pull-left">
                                <input type="checkbox" value="None" id="todo-check1"/>
                                <label for="todo-check1"></label>
                            </div>
                            <p class="todo-title">
                                Wireframe prepare for new design
                            </p>
                            <div class="todo-actionlist pull-right clearfix">

                                <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </li>
                        <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                            <div class="todo-check pull-left">
                                <input type="checkbox" value="None" id="todo-check2"/>
                                <label for="todo-check2"></label>
                            </div>
                            <p class="todo-title">
                                UI perfection testing for Mega Section
                            </p>
                            <div class="todo-actionlist pull-right clearfix">

                                <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </li>
                        <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                            <div class="todo-check pull-left">
                                <input type="checkbox" value="None" id="todo-check3"/>
                                <label for="todo-check3"></label>
                            </div>
                            <p class="todo-title">
                                Wiget & Design placement
                            </p>
                            <div class="todo-actionlist pull-right clearfix">

                                <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </li>
                        <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                            <div class="todo-check pull-left">
                                <input type="checkbox" value="None" id="todo-check4"/>
                                <label for="todo-check4"></label>
                            </div>
                            <p class="todo-title">
                                Development & Wiget placement
                            </p>
                            <div class="todo-actionlist pull-right clearfix">

                                <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </li>

                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" class="form-inline">
                                <div class="form-group todo-entry">
                                    <input type="text" placeholder="Enter your ToDo List" class="form-control" style="width: 100%">
                                </div>
                                <button class="btn btn-primary pull-right" type="submit">+</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--body wrapper end-->


<!--footer section start-->
<footer>
    2017 &copy; power by Seven
</footer>
<!--footer section end-->

    </div>
    <!-- main content end-->
</section>


<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo PUB_PATH; ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/bootstrap.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/modernizr.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/jquery.nicescroll.js"></script>

<!--common scripts for all pages-->
<script src="<?php echo PUB_PATH; ?>js/scripts.js"></script>
<script>

    //成功的文本
    var successAlert = $(".alert-success");
    //失败的文本
    var dangerAlert = $(".alert-danger");

    function back(){
        //重新加载
        window.location.reload();
    }
    function my_ajax(self,callback){
        //异步提交
        $.ajax({
            url: self.attr("action"),
            type:self.attr("method"),
            data:self.serializeArray(),
            dataType:'json',
            success:function(data){
                if(data.status!=0){
                    //结果为成功！
                    $('#myModal3').modal('hide')
                    $(".alert-success strong").html(data.msg);
                    alert(data.msg)
                    successAlert.show();
                    dangerAlert.hide();
                    //提示后重载页面
                    if(callback){
                        setTimeout(callback(),"1500");
                    } else{
                        setTimeout("back()","1500");
                    }
                }else{
                    //结果失败
                    $('#myModal3').modal('hide')
                    alert(data.msg)
                    $(".alert-danger strong").html(data.msg);
                    successAlert.hide();
                    dangerAlert.show();
                }
            }
        }).done(function(data){
        })
    }

    //封装所有的提交表单
    $('#signUpFrom').submit(function(event){
        event.preventDefault();
        $(this).parents('.modal').modal('hide');
        var self = $('#signUpFrom');
        my_ajax(self);
    })
</script>

<!--Calendar-->
<script src="<?php echo PUB_PATH; ?>js/calendar/clndr.js"></script>
<script src="<?php echo PUB_PATH; ?>js/calendar/evnt.calendar.init.js"></script>
<script src="<?php echo PUB_PATH; ?>js/calendar/moment-2.2.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<!--gritter script-->
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/gritter/js/jquery.gritter.js"></script>
<script src="<?php echo PUB_PATH; ?>js/gritter/js/gritter-init.js" type="text/javascript"></script>


</body>
</html>

<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./public/static/admin/level\index.html";i:1491035252;s:44:"./public/static/admin/public\admin_base.html";i:1491035650;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>出差管理</title>
    
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-datepicker/css/datepicker-custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-timepicker/css/timepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />




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
<div class="page-heading">
    <ul class="breadcrumb">
        <li>
            考勤管理
        </li>
        <li>
            请假管理
        </li>
    </ul>
</div>
<!-- page heading end-->
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    记录查询
                </header>
                <div class="panel-body">
                    <form class="form-inline" role="form" method="post" action="">
                        <div class="form-group">
                            <label class="sr-only" for="selectName">姓名</label>
                            <input type="text" class="form-control" name="name" id="selectName" value="<?php echo $select['name']; ?>" placeholder="姓名">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="status">状态</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" <?php if($select['status'] == '0'): ?>selected<?php endif; ?>>未审核</option>
                                <option value="1" <?php if($select['status'] == '1'): ?>selected<?php endif; ?>>已通过</option>
                                <option value="2" <?php if($select['status'] == '2'): ?>selected<?php endif; ?>>不通过</option>
                                <option value="-1" <?php if($select['status'] == '-1'): ?>selected<?php endif; ?>>全部</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">查询</button>
                    </form>

                </div>
            </section>
        </div>

        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body">

                    <a href="#myModal3" id="delalert" data-toggle="modal">
                    </a>
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th width="5%">编号</th>
                            <th width="10%">员工</th>
                            <th width="20%">时间</th>
                            <th width="30%">描述描述</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($levels) || $levels instanceof \think\Collection || $levels instanceof \think\Paginator): $i = 0; $__LIST__ = $levels;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$level): $mod = ($i % 2 );++$i;?>
                        <tr data-id="<?php echo $level['lId']; ?>" data-status="<?php echo $level['status']; ?>" data-eId="<?php echo $level['eId']; ?>" data-name="<?php echo $level['name']; ?>"
                            data-remark="<?php echo $level['remark']; ?>" data-start="<?php echo strTimeToStr($level['startTime']); ?>" data-end="<?php echo strTimeToStr($level['endTime']); ?>"
                        >
                            <td><?php echo $level['lId']; ?></td>
                            <td><?php echo (isset($level['name']) && ($level['name'] !== '')?$level['name']:""); ?></td>
                            <td><?php echo strTimeToStr($level['startTime']); ?>-<?php echo strTimeToStr($level['endTime']); ?></td>
                            <td><?php echo (isset($level['remark']) && ($level['remark'] !== '')?$level['remark']:""); ?></td>
                            <td>
                                <?php switch($level['status']): case "0": ?>
                                        <a class="btn btn-success btn-sm" type="button" onclick="pass(this)" >审核通过</a>
                                        <a class="btn btn-warning btn-sm" type="button" id="del" href="#"  onclick="noPass(this)">审核不过</a>
                                    <?php break; case "1": ?><span class="label label-success">审核通过</span><?php break; case "2": ?><span class="label label-danger">审核不过</span><?php break; endswitch; ?>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="page">
                        <?php echo $levels->render(); ?>
                    </div>
                    <!--modal-->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal3" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="false" data-dismiss="modal" class="close" type="button" id="close_btn">×</button>
                                    <h4 class="modal-title">警告</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="lId" id="delId">
                                    确定审核不通过吗？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="confirm_btn">确定</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->

                </div>
            </section>
        </div>
    </div>
</div>
<!--body wrapper end-->
<!--footer section start-->
<footer>
    2017 &copy; power by Alan
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

<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/jquery.validate.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?php echo PUB_PATH; ?>js/pickers-init.js"></script>
<script type="text/javascript">

    // ajax删除和修改
    function noPass(obj){
        //判断是否确定删除
        $('#delId').val($(obj).closest('tr').data('id'))
        $('#delalert').click();
    }

    $('#confirm_btn').on('click',function(){
        var lId = $('#delId').val();
        //使用ajax
        $.ajax({
            type : "POST",  //提交方式
            url : "<?php echo url('Admin/Level/checkLevel'); ?>",//路径
            data : {
                "lId" : lId,"status":2
            },//数据，这里使用的是Json格式进行传输
            success : function(data){
                if(data.status!=0){
                    $('#myModal3').modal('hide')
                    $(".alert-success strong").html(data.msg);
                    successAlert.show();
                    dangerAlert.hide();
                    setTimeout("back()","1500");
                }else{
                    $('#myModal3').modal('hide')
                    $(".alert-danger strong").html(data.msg);
                    successAlert.hide();
                    dangerAlert.show();
                }
            }
        });
    });

    function pass(obj){
        var currData = $(obj).closest('tr').data();
        var lId = currData.id;
        //使用ajax
        $.ajax({
            type : "POST",  //提交方式
            url : "<?php echo url('Admin/Level/checkLevel'); ?>",//路径
            data : {
                "lId" : lId,"status":1
            },//数据，这里使用的是Json格式进行传输
            success : function(data){
                if(data.status!=0){
                    $('#myModal3').modal('hide')
                    $(".alert-success strong").html(data.msg);
                    successAlert.show();
                    dangerAlert.hide();
                    setTimeout("back()","1500");
                }else{
                    $('#myModal3').modal('hide')
                    $(".alert-danger strong").html(data.msg);
                    successAlert.hide();
                    dangerAlert.show();
                }
            }
        });
    }

</script>




</body>
</html>

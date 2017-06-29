<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:48:"./public/static/admin/schedule\schedulelist.html";i:1494505862;s:44:"./public/static/admin/public\admin_base.html";i:1494505862;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>排班列表</title>
    
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-datepicker/css/datepicker-custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-timepicker/css/timepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB_PATH; ?>js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />
<!--icheck-->
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/minimal/red.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/minimal/green.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/minimal/blue.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/minimal/yellow.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/minimal/purple.css" rel="stylesheet">

<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/square/square.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/square/red.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/square/green.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/square/blue.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/square/yellow.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/square/purple.css" rel="stylesheet">

<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/flat/grey.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/flat/red.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/flat/green.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/flat/blue.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/flat/yellow.css" rel="stylesheet">
<link href="<?php echo PUB_PATH; ?>js/iCheck/skins/flat/purple.css" rel="stylesheet">
<style>
    .yuan{
        width: 25px;
        height: 25px;
        border: 1px solid black;
        border-radius: 50%;
    }
    .model{
        position: relative;
        vertical-align: top;
        display: inline-block;
        float: none;
    }
</style>



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
            排班列表
        </li>
    </ul>
</div>
<!-- page heading end-->
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    会员查询
                </header>
                <div class="panel-body">
                    <form class="form-inline" role="form" method="get" action="">
                        <div class="form-group">
                            <label class="sr-only" for="name">姓名</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $select['name']; ?>" placeholder="姓名">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="dId">部门</label>
                            <select id="dId" name="dId" class="form-control">
                                <option value="-1" <?php if($select['dId'] == '-1'): ?>selected<?php endif; ?>>全部</option>
                                <?php if(is_array($depts) || $depts instanceof \think\Collection || $depts instanceof \think\Paginator): $i = 0; $__LIST__ = $depts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dept): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $dept['dId']; ?>" <?php if($dept['dId'] == $select['dId']): ?>selected<?php endif; ?>><?php echo $dept['dName']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                <option value="0" <?php if($select['dId'] == '0'): ?>selected<?php endif; ?>>暂无部门</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">查询</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
    <div class="directory-info-row">
        <div class="row">
            <?php if(is_array($employees) || $employees instanceof \think\Collection || $employees instanceof \think\Paginator): $i = 0; $__LIST__ = $employees;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$employee): $mod = ($i % 2 );++$i;?>
            <div class="col-md-6 col-sm-6 " style="position: relative;vertical-align: top;display: inline-block;float: none;width: 49%;" >
                <div class="panel">
                    <div class="panel-body">
                        <h4><?php echo $employee['name']; ?><span class="text-muted small">-<?php echo $employee['dName']; ?>-<?php echo $employee['position']; ?></span></h4>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="thumb media-object" src="<?php echo (isset($employee['logo']) && ($employee['logo'] !== '')?$employee['logo']:(PUB_PATH.'images/photos/user1.png')); ?>" alt="">
                            </a>
                            <div class="media-body" data-eid="<?php echo $employee['eId']; ?>" data-name="<?php echo $employee['name']; ?>">
                                <address data-eid="<?php echo $employee['eId']; ?>" data-name="<?php echo $employee['name']; ?>">
                                    <?php if($employee['isSchedule'] == '0'): ?>
                                    <strong>本周还无排班信息</strong>
                                    <a data-eid="<?php echo $employee['eId']; ?>" data-name="<?php echo $employee['name']; ?>" class="text-info  btn btn-default addThisWeek" data-target="#addModal" data-toggle="modal">添加本周排班信息</a><br>
                                    <?php else: ?>
                                    <strong>本周排班记录：</strong><br>
                                        <?php echo $employee['weeks']; ?><br>
                                    <?php endif; if($employee['nextSchedule'] == '0'): ?>
                                    <strong>下周还无排班信息</strong>
                                    <a data-eid="<?php echo $employee['eId']; ?>" data-name="<?php echo $employee['name']; ?>" class="text-info btn btn-default addNextWeek" data-target="#addModal" data-toggle="modal">添加下周排班信息</a><br>
                                    <?php else: ?>
                                    <strong>下周排班记录：</strong><br>
                                    <?php echo $employee['nextWeeks']; ?><br>
                                    <?php endif; ?>
                                    <a data-eid="<?php echo $employee['eId']; ?>" data-name="<?php echo $employee['name']; ?>" class="text-info btn btn-default editSchedule" data-target="#editModal" data-toggle="modal">修改排班</a>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="page">
        <?php echo $page; ?>
    </div>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title" id="model_title">添加排班</h4>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <form class="cmxform form-horizontal adminex-form" id="signUpFrom" method="post" action="<?php echo url('Admin/schedule/add'); ?>">
                            <input type="hidden" name="eId" id="hidden_id">
                            <input type="hidden" name="time" value="">
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">员工姓名:</label>
                                <div class="col-lg-4">
                                    <label class="control-label" id="name" ></label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="panel-body">
                                    <ul class="weather-forecast ">
                                        <li class="first"><label for="day1"><a id="mo" href="javascript:;" ><strong>周一</strong><span class="icheck"><div class="minimal-blue single-row">
                                                <div class="checkbox "><input type="checkbox" id="day1" name="day[]" value="1" ></div></div>
                                            </span></a></label></li>
                                        <li><label for="day2"><a id="tu" href="javascript:;" ><strong>周二</strong><span class="icheck">
                                                <div class="minimal-blue single-row">
                                                    <div class="checkbox "><input type="checkbox" id="day2" name="day[]" value="2" ></div></div>
                                            </span></a></label></li>
                                        <li><label for="day3"><a id="we" href="javascript:;" ><strong>周三</strong><span class="icheck">
                                                <div class="minimal-blue single-row">
                                                    <div class="checkbox "><input type="checkbox" id="day3" name="day[]" value="3" ></div></div>
                                            </span></a></label></li>
                                        <li><label for="day4"><a id="th" href="javascript:;" ><strong>周四</strong><span class="icheck">
                                                <div class="minimal-blue single-row">
                                                    <div class="checkbox "><input type="checkbox" id="day4" name="day[]" value="4" ></div></div>
                                            </span></a></label></li>
                                        <li><label for="day5"><a id="fr" href="javascript:;" ><strong>周五</strong><span class="icheck">
                                                <div class="minimal-blue single-row">
                                                    <div class="checkbox "><input type="checkbox" id="day5" name="day[]" value="5"></div></div>
                                            </span></a></label></li>
                                        <li><label for="day6"><a id="sa" href="javascript:;" ><strong>周六</strong><span class="icheck">
                                                <div class="minimal-blue single-row">
                                                    <div class="checkbox "><input type="checkbox" id="day6" name="day[]" value="6" ></div></div>
                                            </span></a></label></li>
                                        <li class="last"><label for="day2"><a id="su" href="javascript:;" ><strong>周日</strong><span class="icheck">
                                                <div class="minimal-blue single-row">
                                                    <div class="checkbox "><input type="checkbox" id="day7" name="day[]" value="0" ></div></div>
                                            </span></a></label></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-7 col-lg-10">
                                    <button class="btn btn-primary" type="submit" id="sub_btn">添加</button>
                                    <button class="btn btn-default" type="button" id='cancle_btn' data-dismiss="modal">取消</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title" >修改排班</h4>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <form class="cmxform form-horizontal adminex-form" id="editForm" method="post" action="<?php echo url('Admin/Schedule/edit'); ?>">
                            <input type="hidden" name="eId" >
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-3">员工姓名:</label>
                                <div class="col-lg-4">
                                    <label class="control-label name"  ></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">排班日期：</label>
                                <div class="col-lg-6 ">
                                    <input class="form-control form-control-inline input-medium default-date-picker" size="16" id="inTime" name="day" type="text" value="">
                                    <span class="help-block">请选择一个日期</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">排班：</label>
                                <div class="col-lg-6 icheck">
                                    <div class="minimal-blue single-row">
                                        <div class="radio ">
                                            <input tabindex="3" type="radio"  name="status" value="1">
                                            <label>是</label>
                                        </div>
                                    </div>
                                    <div class="minimal-red single-row">
                                        <div class="radio ">
                                            <input tabindex="3" type="radio"  name="status" checked value="0">
                                            <label>否</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-7 col-lg-10">
                                    <button class="btn btn-primary" type="submit" >修改</button>
                                    <button class="btn btn-default" type="button"  data-dismiss="modal">取消</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
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
<script src="<?php echo PUB_PATH; ?>js/jquery.validate.min.js"></script>

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




    $('.str-length').mouseleave(function(){
        var str = $(this).val();
        var length = $(this).data('length');
        if( str.length == 0 || str.length > length ){
            $(this).parent().next('.error').html('至多'+length+'个字');
        }else{
            $(this).parent().next('.error').html('');
        }
    });
    $('.required').mouseleave(function(){
        var str = $(this).val();
        if( str.length == 0  ){
            $(this).parent().next('.error').html('必须填写该项!');
        }else{
            $(this).parent().next('.error').html('');
        }
    });



    $('.phone').mouseleave(function(){
        var phone = $(this).val();
        if(!isPhoneNo(phone)){
            $(this).parent().next('.error').html('手机号码不正确');
        }else{
            $(this).parent().next('.error').html('');
        }
    });


    //封装所有的提交表单
    $('#signUpFrom').submit(function(event){
        event.preventDefault();
        var es = $('#signUpFrom').find('.error');
        var rs = $('#signUpFrom').find('.required');
        console.log(rs);
        var flag = 0;
        $.each(es,function(i,item){
            if($(item).html() && $(item).html() !=  ''){
                flag = 1;
                return false;
            }
        })
        $.each(rs,function(i,item){
            if( $(item).val() ==  ''){
                flag = 1;
                $(item).parent().next('.error').html('必须填写该项!')
            }else{
                $(item).parent().next('.error').html('')
            }
        })
        if(flag == 1){
            alert('请确认一下你填写的内容！');
            return;
        }
        $(this).parents('.modal').modal('hide');
        var self = $('#signUpFrom');
        my_ajax(self);
    })


    function isPhoneNo(phone) {
        var pattern = /^1[34578]\d{9}$/;
        return pattern.test(phone);
    }

    function isLength(str,length){
        return str.length > length
    }

    function eachStr(strs){
        $.each(strs,function(index,item){
            var str = item.val();
            var length = item.data('length');
            if(!str || isLength(str,length) ){
                return false;
            }
        })
        return true;
    }

    function validate(self){
        var phone = self.find('.phone').val();
        var strs = self.find('.str_length');

        if(!phone || !isPhoneNo(phone)){
            return '手机号码格式不对';
        }
        if(strs && !eachStr(strs)){
            return '手机号码格式不对';

        }

    }

</script>

<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/jquery.validate.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?php echo PUB_PATH; ?>js/pickers-init.js"></script>
<!--icheck -->
<script src="<?php echo PUB_PATH; ?>js/iCheck/jquery.icheck.js"></script>
<script src="<?php echo PUB_PATH; ?>js/icheck-init.js"></script>
<script type="text/javascript">

    var eIdInput = $('#addModal').find('[name=eId]');
    var nameInput = $('#addModal').find('#name');
    var timeInput = $('#addModal').find('[name=time]');
    var day = [];
     day[0] = $('#day1');
    day[1] = $('#day2');
    day[2] = $('#day3');
    day[3] = $('#day4');
    day[4] = $('#day5');
    day[5] = $('#day6');
    day[6] = $('#day7');
     cout = <?php echo $week; ?>;
    $('.addThisWeek').on('click',function(){
        var eId = $(this).data('eid');
        var name = $(this).data('name');
        var i =0;
        eIdInput.val(eId);
        nameInput.html(name);
        timeInput.val(1);
        for(i =0;i<7 ;i++){
            day[i].removeAttr("checked");
            day[i].parent('div').removeClass("checked");
        }
        for(i =0;i<cout ;i++){
            day[i].attr('disabled',true);
        }
    })
    $('.addNextWeek').on('click',function(){
        var eId = $(this).data('eid');
        var name = $(this).data('name');
        var i =0;
        eIdInput.val(eId);
        nameInput.html(name);
        timeInput.val(2);
        for(i =0;i<7 ;i++){
            day[i].removeAttr("checked");
            day[i].parent('div').removeClass("checked");
        }
        for( i =0;i<cout ;i++){
            day[i].attr('disabled',false);
        }

    })
    $('.editSchedule').on('click',function(){
        var eId = $(this).data('eid');
        var name = $(this).data('name');
        console.log(eId);
        console.log(name);
        $('#editModal').find('[name=eId]').val(eId);
        $('#editModal').find('.name').html(name);
    })

    $('#editForm').submit(function(event){
        event.preventDefault();
        $(this).parents('.modal').modal('hide');
        var self = $(this);
        my_ajax(self);
    })
</script>



</body>
</html>

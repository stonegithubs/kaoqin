<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:36:"./public/static/admin/adv\index.html";i:1494505862;s:44:"./public/static/admin/public\admin_base.html";i:1494505862;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>公告列表</title>
    




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
            公告列表
        </li>
    </ul>
</div>
<!-- page heading end-->
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body">
                    <a id="addbtn" class="btn btn-success" href="detail">
                        新增公告
                    </a>
                    <a href="#myModal3" id="delalert" data-toggle="modal">
                    </a>
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th width="10%">编号</th>
                            <th width="15%">标题</th>
                            <th width="50%">正文</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($advs) || $advs instanceof \think\Collection || $advs instanceof \think\Paginator): $i = 0; $__LIST__ = $advs;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$adv): $mod = ($i % 2 );++$i;?>
                        <tr data-id="<?php echo $adv['advId']; ?>">
                            <td><?php echo $adv['advId']; ?></td>
                            <td><?php echo (isset($adv['title']) && ($adv['title'] !== '')?$adv['title']:"未填写"); ?></td>
                            <td><?php echo substr(strip_tags($adv['content']),0,80); ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" type="button"  href="detail?advId=<?php echo $adv['advId']; ?>" >修改</a>
                                <button class="btn btn-warning btn-sm" type="button" onclick="del(this)">删除</button>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="page">
                        <?php echo $advs->render(); ?>
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
                                    <input type="hidden" name="advId" id="delId">
                                    确定要执行此操作？
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

<script src="<?php echo PUB_PATH; ?>js/pickers-init.js"></script>
<script type="text/javascript">

    // ajax删除和修改
    function del(obj){
        //判断是否确定删除
        $('#delId').val($(obj).closest('tr').data('id'))
        $('#delalert').click();
    }

    $('#confirm_btn').on('click',function(){
        var advId = $('#delId').val();
        //使用ajax
        $.ajax({
            type : "POST",  //提交方式
            url : "<?php echo url('Admin/Adv/del'); ?>",//路径
            data : {
                "advId" : advId
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


</script>



</body>
</html>

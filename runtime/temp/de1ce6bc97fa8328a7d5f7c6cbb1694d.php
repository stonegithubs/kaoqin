<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:40:"./public/static/admin/dept\deptlist.html";i:1494505862;s:44:"./public/static/admin/public\admin_base.html";i:1494505862;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>部门列表</title>
    



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
            基本信息
        </li>
        <li>
            部门信息
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
                    <button id="addbtn" class="btn btn-success" href="#myModal" data-toggle="modal">
                        新增部门
                    </button>
                    <a href="#myModal3" id="delalert" data-toggle="modal">
                    </a>
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th width="10%">编号</th>
                            <th width="15%">部门</th>
                            <th width="10%">部门人数</th>
                            <th width="40%">部门描述</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($depts) || $depts instanceof \think\Collection || $depts instanceof \think\Paginator): $i = 0; $__LIST__ = $depts;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$dept): $mod = ($i % 2 );++$i;?>
                        <tr data-id="<?php echo $dept['dId']; ?>" data-description="<?php echo $dept['description']; ?>" data-name="<?php echo $dept['dName']; ?>">
                            <td><?php echo $dept['dId']; ?></td>
                            <td><?php echo (isset($dept['dName']) && ($dept['dName'] !== '')?$dept['dName']:"未填写"); ?></td>
                            <td><?php echo (isset($dept['sum']) && ($dept['sum'] !== '')?$dept['sum']:0); ?></td>
                            <td><?php echo (isset($dept['description']) && ($dept['description'] !== '')?$dept['description']:"未填写"); ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" type="button"   onclick="edit(this)" data-toggle="modal" href="#myModal" >修改</a>
                                <a class="btn btn-warning btn-sm" type="button" id="del" href="#"  onclick="del(this)">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="page">
                        <?php echo $depts->render(); ?>
                    </div>
                    <!--modal-->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 class="modal-title" id="model_title">新增部门</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form">
                                        <form class="cmxform form-horizontal adminex-form" id="signUpFrom" method="post" action="<?php echo url('Admin/Dept/add'); ?>">
                                            <input type="hidden" name="dId" id="hidden_id">
                                            <div class="form-group ">
                                                <label for="dName" class="control-label col-lg-2">部门名称</label>
                                                <div class="col-lg-6">
                                                    <input class=" form-control str-length" data-length="6" id="dName" name="dName" type="text" />
                                                </div>
                                                <label class="col-lg-4 error"></label>
                                            </div>
                                            <div class="form-group ">
                                                <label for="description" class="control-label col-lg-2">部门描述</label>
                                                <div class="col-lg-8">
                                                    <textarea rows="6" class="form-control " id="description" name="description"></textarea>
                                                </div>
                                                <label class="col-lg-4 error"></label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-7 col-lg-10">
                                                    <button class="btn btn-primary" type="submit" id="sub_btn">新增</button>
                                                    <button class="btn btn-default" type="button" id='cancle_btn' data-dismiss="modal">取消</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal3" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="false" data-dismiss="modal" class="close" type="button" id="close_btn">×</button>
                                    <h4 class="modal-title">警告</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="eId" id="delId">
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
        var dId = $('#delId').val();
        //使用ajax
        $.ajax({
            type : "POST",  //提交方式
            url : "<?php echo url('Admin/Dept/del'); ?>",//路径
            data : {
                "dId" : dId
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

    function edit(obj){
        var currData = $(obj).closest('tr').data();
        $('#model_title').html("修改信息");
        $('#sub_btn').html("修改");
        $('#dName').val(currData.name);
        $('#description').val(currData.description);
        $('#hidden_id').val(currData.id);
    }

    $('#addbtn').click(function(){
        $('#model_title').html("新增部门");
        $('#sub_btn').html("添加");
        $('#dName').val('');
        $('#description').val('');
        $('#hidden_id').val('');
    })

</script>




</body>
</html>

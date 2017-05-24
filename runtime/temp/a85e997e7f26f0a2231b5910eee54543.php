<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:40:"./public/static/admin/user\userlist.html";i:1489306634;s:44:"./public/static/admin/public\admin_base.html";i:1491035650;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>用户列表</title>
    
    


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
            用户管理
        </li>
        <li>
            用户列表
        </li>
    </ul>
</div>
<!-- page heading end-->
<!--alert pannel-->
<div id="alert"></div>
<!--alert pannel-->
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body">
                    <a href="#myModal" id="addbtn" data-toggle="modal"  class="btn btn-success">
                        新增用户
                    </a>
                    <a href="#myModal3" id="delalert" data-toggle="modal">
                    </a>
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th>用户名</th>
                            <th>qq</th>
                            <th>mail</th>
                            <th>phone</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td>
                               <?php echo $user['username']; ?>
                            </td>
                            <td class="hidden-phone"><?php echo $user['qq']; ?></td>
                            <td><?php echo $user['mail']; ?></td>
                            <td><?php echo $user['phone']; ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" type="button"  value="<?php echo $user['id']; ?>" onclick="edit(this)">修改</a>
                                <a class="btn btn-warning btn-sm" type="button" id="del" href="#" value="<?php echo $user['id']; ?>" onclick="del(this)">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="">
                        <ul class="pagination">
                            <?php echo $users->render(); ?>
                        </ul>
                    </div>
                    <!--modal-->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" id="x_btn" type="button">×</button>
                                    <h4 class="modal-title" id="model_title">新增用户</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form">
                                        <form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="<?php echo url('Admin/user/useradd'); ?>">
                                           <input type="hidden" name="id" id="hidden_id">
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">用户名</label>
                                                <div class="col-lg-8">
                                                    <input class=" form-control" id="username" name="username" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="password" class="control-label col-lg-2">密码</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control " id="password" name="password" type="password" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">确认密码</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control " id="confirm_password" name="confirm_password"  type="password" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="qq" class="control-label col-lg-2">qq</label>
                                                <div class="col-lg-8">
                                                    <input class=" form-control" id="qq" name="qq" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="mail" class="control-label col-lg-2">Email</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control " id="mail" name="mail" type="email" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="phone" class="control-label col-lg-2">手机</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control " id="phone" name="phone" type="text" />
                                                </div>
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

<script type="text/javascript">
    //修改按钮取消刷新
    $('#cancle_btn,#x_btn').on('click',function(){
        window.location.href="<?php echo url('Admin/user/userlist'); ?>";
    });
    function timedelay(){
        window.location.href="<?php echo url('Admin/user/userlist'); ?>";
    }
    // ajax删除和修改
    function del(obj){
        //判断是否确定删除
       $('#delalert').click();
       $('#confirm_btn').on('click',function(){
           var userid=$(obj).attr('value');
           //使用ajax
           $.ajax({
               type : "POST",  //提交方式
               url : "<?php echo url('Admin/user/userdel'); ?>",//路径
               data : {
                   "id" : userid
               },//数据，这里使用的是Json格式进行传输
               success : function(result){
                   if(result==1){
                       var div='<div class="alert alert-success fade in">'
                               +'<button class="close close-sm" type="button" data-dismiss="alert">'
                               + '<i class="fa fa-times"></i>'
                               +'</button>'
                               +'<strong>删除成功!</strong>'
                               +'</div>';
                       $('#close_btn').click();
                       $("#alert").after(div);
                       setTimeout("timedelay()","1500");
                   }else if(result==2){
                       $('#close_btn').click();
                       var div1='<div class="alert alert-block alert-danger fade in">'
                               +'<button class="close close-sm" type="button" data-dismiss="alert">'
                               + '<i class="fa fa-times"></i>'
                               +'</button>'
                               +'<strong>当前用户正在登录不可删除</strong>'
                               +'</div>';
                       $("#alert").after(div1);
                       setTimeout("timedelay()","1500");

                   }
                   else{
                       $('#close_btn').click();
                       alert("执行出错！");
                   }
               },
           });
       });

    }
    function edit(obj){
        var userid=$(obj).attr('value');

        //根据id获取数据
        $.ajax({
            type: "POST",  //提交方式
            url: "<?php echo url('Admin/user/useredit'); ?>",//路径
            data: {
                "id": userid,
                "type":"post",
            },//数据，这里使用的是Json格式进行传输
            success:function(data){
                if(data==2){
                    var div1='<div class="alert alert-block alert-danger fade in">'
                            +'<button class="close close-sm" type="button" data-dismiss="alert">'
                            + '<i class="fa fa-times"></i>'
                            +'</button>'
                            +'<strong>当前用户正在登录不可编辑</strong>'
                            +'</div>';
                    $("#alert").after(div1);
                }else{
                    $('#model_title').html("修改用户");
                    $('#sub_btn').html("修改");
                    $('#signupForm').attr('action',"<?php echo url('Admin/user/useredited'); ?>");
                    $('#addbtn').click();
                    $('#username').attr("disabled",true);
                    var json = JSON.parse(data.res);
                    $.each(json,function (key,value) {
                        $('#username').attr('value',value.username);
                        $('#password').attr('value','');
                        $('#confirm_password').attr('value','');
                        $('#qq').attr('value',value.qq);
                        $('#mail').attr('value',value.mail);
                        $('#hidden_id').attr('value',value.id);
                        $('#phone').attr('value',value.phone);
                    });
                }
            }
        });
    }

</script>
<script type="text/javascript" src="<?php echo PUB_PATH; ?>js/jquery.validate.min.js"></script>
<script src="<?php echo PUB_PATH; ?>js/validation-init.js"></script>


</body>
</html>

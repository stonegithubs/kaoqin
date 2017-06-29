<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:41:"./public/static/index/employee\index.html";i:1494505862;s:38:"./public/static/index/public\base.html";i:1494505862;}*/ ?>
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
<link href="<?php echo PUB_PATH; ?>css/info.css" rel="stylesheet">

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

<div class="col-lg-8 info">
    <section class="panel">
        <header class="panel-heading">
            <h3>
                员工编号<font color="red"><i><?php echo $user['eId']; ?></i></font>个人账户信息
            </h3>
        </header>
        <div class="panel-body">
            <form class="form-horizontal" id="infoForm" role="form" method="post" action="<?php echo url('Index/employee/updateinfo'); ?>">
                <div class="form-group">
                    <label  class="col-lg-3 col-sm-3 control-label">员工名字:</label>
                    <div class="col-lg-3">
                        <div class="iconic-input">
                            <i class="fa fa-home"></i>
                            <input type="text" name="name" value="<?php echo $emp['name']; ?>" class="form-control" placeholder="员工名字">
                        </div>
                    </div>
                    <div>
                        <label  class="col-lg-2 col-sm-3 control-label">性别:</label>
                    </div>
                    <div class="col-lg-3" class="form-control">
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="0"  <?php if($emp['gender'] == 0): ?> checked="checked" <?php endif; ?>> 未知
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="1" <?php if($emp['gender'] == 1): ?> checked="checked" <?php endif; ?>> 男
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="2" <?php if($emp['gender'] == 2): ?> checked="checked" <?php endif; ?>> 女
                            </label>
                    </div>

                </div>

                <div class="form-group">
                    <label  class="col-lg-3 col-sm-3 control-label">职务:</label>
                    <div class="col-lg-3">
                        <div class="iconic-input">
                            <i class="fa fa-home"></i>
                            <input type="text"  value="<?php echo $emp['position']; ?>" class="form-control" disabled="disabled" placeholder="职务">
                        </div>
                    </div>
                    <div>
                        <label  class="col-lg-2 col-sm-3 control-label">籍贯:</label>
                    </div>
                    <div class="col-lg-3">
                        <div class="iconic-input">
                            <i class="fa fa-home"></i>
                            <input type="text" name="place" value="<?php echo $emp['place']; ?>" class="form-control" placeholder="格式:广东东莞">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label  class="col-lg-3 col-sm-3 control-label">生日:</label>
                    <div class="col-lg-3">
                        <div class="iconic-input">
                            <i class="fa fa-home"></i>
                            <input type="text" name="birthday" value="<?php echo $emp['birthday']; ?>" class="form-control" placeholder="格式:1994-10-22">
                        </div>
                    </div>
                    <div>
                        <label  class="col-lg-2 col-sm-3 control-label">学位:</label>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-control" name="degree">
                            <option value="null" <?php if($emp['degree'] == ''): ?> selected <?php endif; ?>></option>
                            <option value="专科" <?php if($emp['degree'] == '专科'): ?> selected <?php endif; ?>>专科</option>
                            <option value="本科" <?php if($emp['degree'] == '本科'): ?> selected <?php endif; ?>>本科</option>
                            <option value="研究生" <?php if($emp['degree'] == '研究生'): ?> selected <?php endif; ?>>研究生</option>
                            <option value="博士" <?php if($emp['degree'] == '博士'): ?> selected <?php endif; ?>>博士</option>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label  class="col-lg-3 col-sm-3 control-label">专业:</label>
                    <div class="col-lg-3">
                        <div class="iconic-input">
                            <i class="fa fa-home"></i>
                            <input type="text" name="special" value="<?php echo $emp['special']; ?>" class="form-control" placeholder="专业">
                        </div>
                    </div>
                    <div>
                        <label  class="col-lg-2 col-sm-3 control-label">通信地址:</label>
                    </div>
                    <div class="col-lg-3">
                        <div class="iconic-input">
                            <i class="fa fa-home"></i>
                            <input type="text" class="form-control" name="address" value="<?php echo $emp['address']; ?>" placeholder="通信地址">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                <label  class="col-lg-3 col-sm-3 control-label">联系电话:</label>
                <div class="col-lg-3">
                    <div class="iconic-input">
                        <i class="fa fa-home"></i>
                        <input type="text" class="form-control" name="tel" value="<?php echo $emp['tel']; ?>" placeholder="联系电话">
                    </div>
                </div>
                <div>
                    <label  class="col-lg-2 col-sm-3 control-label">邮件:</label>
                </div>
                <div class="col-lg-3">
                    <div class="iconic-input">
                        <i class="fa fa-home"></i>
                        <input type="text" name="mail" value="<?php echo $emp['mail']; ?>" class="form-control" placeholder="邮件">
                    </div>
                </div>

            </div>

                <div class="form-group">
                    <label  class="col-lg-3 col-sm-3 control-label">入职时间:</label>
                    <div class="col-lg-3">
                        <div class="iconic-input">
                            <i class="fa fa-home"></i>
                            <input type="text" class="form-control" disabled  value="<?php echo $emp['inTime']; ?>" placeholder="入职时间">
                        </div>
                    </div>
                    <div>
                        <label  class="col-lg-2 col-sm-3 control-label">部门:</label>
                    </div>
                    <div class="col-lg-3">
                        <div class="iconic-input">
                            <i class="fa fa-home"></i>
                            <input type="text" class="form-control" value="<?php echo getDeptName($emp['dId']); ?>" disabled="disabled" placeholder="部门">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <button class="btn btn btn-primary btn-lg sub_btn" id="sub_btn" type="button">提交</button>
                </div>


            </form>
        </div>
    </section>
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
    $('#sub_btn').bind('click',function () {
        $.ajax({
            type : "POST",  //提交方式
            url : $('#infoForm').attr('action'),//路径
            data :$('#infoForm').serialize(),
            success:function(result){
                if(result['status']!=1){
                    alert(result['msg']);
                }else{
                    alert('修改成功!');
                    window.location.href="<?php echo url('Index/employee/index'); ?>";
                }

            }
        });

    });

</script>


</body>
</html>
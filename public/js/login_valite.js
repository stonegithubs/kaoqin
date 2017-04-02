var Script = function () {
    $.validator.setDefaults({
        submitHandler: function() {
            $.ajax({
                type : "POST",  //提交方式
                url : $('#form-signin').attr('action'),//路径
                data :$('#form-signin').serialize(),
                success:function(result){
                    if(result['status']==0){
                        alert("验证码错误！");
                    }else if(result['status']==2){
                        alert("用户名或者密码错误");
                    }else{
                        alert('登录成功！');
                        window.location.href="index.php/Index/index";
                    }

                }
            });

        }
    });
    $().ready(function(){
        $("#form-signin").validate({
            rules: {
                empId: {
                    required: true,
                    minlength: 4
                },
                password: {
                    required: true,
                    minlength: 5
                },
                validte_code:{
                    required:true,
                    minlength:2
                }
            },
            messages: {
                empId: {
                    required: "<font color='red'>员工编号必须</font>",
                    minlength: "<font color='red'>员工编号5个字符以上</font>"
                },
                password: {
                    required: "<font color='red'>密码必须</font>",
                    minlength: "<font color='red'>密码至少5个字符以上</font>"
                },
                validte_code:{
                    required:"<font color='red'>验证码不能为空</font>",
                    minlength:"<font color='red'>验证码为6个字符</font>"
                }
            }
        });
    });
}();
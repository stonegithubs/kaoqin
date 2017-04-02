var Script = function () {

    $.validator.setDefaults({
        submitHandler: function() {
            $.ajax({
                type : "POST",  //提交方式
                url : $('#editpasswd_Form').attr('action'),//路径
                data :$('#editpasswd_Form').serialize(),
                success:function(result){
                    if(result.status==1){
                        alert(result.msg);
                        window.location.href='Index/index';
                    }else{
                        alert(result.msg);
                    }

                }
            });
        }
    });
    $().ready(function() {
        // validate signup form on keyup and submit
        $("#editpasswd_Form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                newpassword:{
                    required: true,
                    minlength: 5,
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#newpassword"
                },

            },
            messages: {
                password: {
                    required: "<font color='red'>密码必须",
                    minlength: "<font color='red'>密码至少5个字符以上"
                },
                newpassword:{
                    required: "<font color='red'>新的确认密码必须",
                    minlength:"<font color='red'>密码至少5个字符以上"
                },
                confirm_password: {
                    required: "<font color='red'>确认密码必须",
                    minlength: "<font color='red'>确认密码至少5个字符以上",
                    equalTo: "<font color='red'>两次输入不一致"
                }
            }
        });
    });
}();
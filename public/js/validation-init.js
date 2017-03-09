var Script = function () {

    $.validator.setDefaults({
        submitHandler: function() {
            alert("成功提交!");
            form.submit();
        }
    });

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#commentForm").validate();

        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 4
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                qq:{
                    required: true,
                    isqq:true,

                },
                mail: {
                    required: true,
                    email: true
                },
                phone:{
                    required: true,
                    isphone:true,
                }


            },
            messages: {
                username: {
                    required: "用户名必须",
                    minlength: "用户名至少4个字符以上"
                },
                password: {
                    required: "密码必须",
                    minlength: "密码至少5个字符以上"
                },
                confirm_password: {
                    required: "确认密码必须",
                    minlength: "确认密码至少5个字符以上",
                    equalTo: "两次输入不一致"
                },
                mail: "请输入正确的邮箱！ַ",
                qq:{
                    required: "qq必须",
                },
                phone:{
                    required: "手机必须",
                }

            }
        });
    });
    $.validator.addMethod("isphone", function(value, element) {
        var mobile = /^0{0,1}(13[0-9]|15[7-9]|153|156|18[7-9])[0-9]{8}$/;
        return this.optional(element) || (mobile.test(value));
    }, "请正确填写您的手机号码！");
    $.validator.addMethod("isqq", function(value, element) {
        var qq = /^\d{5,10}$/;
        return this.optional(element) || (qq.test(value));
    }, "请正确填写您的qq号码！");



}();
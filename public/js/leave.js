var Script = function () {

    $.validator.setDefaults({
        submitHandler: function() {
            $.ajax({
                type : "POST",  //提交方式
                url : $('#leave_Form').attr('action'),//路径
                data :$('#leave_Form').serialize(),
                success:function(result){
                    if(result.status!=1){
                        alert(result['msg']);
                    }else{
                        alert(result['msg']);
                        window.location.href=$('#leave_Form').attr('redireturl');
                    }

                }
            });
        }
    });
    $().ready(function() {
        // validate signup form on keyup and submit
        $("#leave_Form").validate({
            rules: {
                starttime: {
                    required: true,
                    isDate:true
                },
                endtime:{
                    required: true,
                    isDate:true
                },
                mark:{
                    required: true,
                    maxlength:50
                }

            },
            messages: {
                starttime: {
                    required: "<font color='red'>开始时间必须！",
                },
                endtime:{
                    required: "<font color='red'>结束时间必须！",
                },
                mark:{
                    required:  "<font color='red'>请假原因必须！",
                    maxlength: "<font color='red'>请假原因不能多于50个字符！",
                }
            }
        });
    });
    $.validator.addMethod("isDate", function(value, element) {
        var date = /([0-9]{4})-([0-9]{2})-([0-9]{2})/;
        return this.optional(element) || (date.test(value));
    }, "起始日期格式不对！");
}();
<?php if (!defined('THINK_PATH')) exit();?><style>
    .font-p {
        font-family: '微软雅黑';
        font-size: 28px;
        margin-top: 20px;
    }
</style>
<link href="/Public/css/validation/formValidation.css">
<script src="/Public/js/validation/formValidation.js"></script>
<script src='/Public/js/validation/bootstrap.js'></script>
<script type="text/javascript" src="/Public/js/validation/zh_CN.js"></script>
<div class="container" style="width: 100%;height:600px;">
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">个人中心</a></li>
            <li><a href="#">安全设置</a></li>
            <li class="active">账号绑定</li>
        </ol>
    </div>
    <div class="alert alert-success" role="alert">绑定手机号：<?php echo ($info["phone"]); ?></div>
    <?php if($info["email"] == ''): ?><div class="alert alert-warning" role="alert">邮箱未绑定，建议绑定邮箱</div>
        <?php else: ?>
        <div class="alert alert-success" role="alert">绑定邮箱号：<?php echo ($info["email"]); ?></div><?php endif; ?>
    <form id="defaultForm" class="form-horizontal" style="margin-top: 30px">
        <div class="form-group">
            <label class="col-sm-2 control-label">手机</label>

            <div class="col-sm-5">
                <input readonly id="phone"  type="text" class="form-control" name="smsphone" value="<?php echo ($info["phone"]); ?>"
                       placeholder="请输入绑定手机">
                <span id="phoneMsg" style="color: red"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">验证码</label>

            <div class="col-sm-3">
                <input type="password" class="form-control" name="smsCode" placeholder="验证码必填">
            </div>
            <div class="col-sm-2">
                <button id="yzm" type="button" onclick="time()" class="btn button-rounded">获取验证码</button>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">绑定类型</label>

            <div class="col-sm-5">
                <select name="type" id="" class="form-control">
                    <option value="phone">手机</option>
                    <option value="email">邮箱</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">手机号／邮箱号</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" name="content" placeholder="请输入手机号活着邮箱号">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">修改并绑定</button>
            </div>
        </div>
    </form>
</div>
<script>
    var wait = 0;
    function time() {
        $.post(
                '<?php echo U("Index/smsCode");?>',
                {
                    phone: $('#phone').val(),
                    type: 1
                },
                function (data) {
                    wait = data.countdown
                    if (wait == 0) {
//                                                                alert(data.describe)
                        $('#phoneMsg').html(data.describe)
                    }
                    timeTest();

                },
                'json'
        );
    }
    function timeTest() {
        if (wait == 0) {
            $('#yzm').removeAttr("disabled");
            $('#yzm').html("获取验证码");
        } else {
            $('#yzm').attr("disabled", true);
            $('#yzm').html("重新发送(" + wait + ")");
            wait--;
            setTimeout(function () {
                        timeTest()
                    },
                    1000)
        }
    }


    $('#defaultForm')
            .formValidation({
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    smsCode: {
                        validators: {
                            notEmpty: {
                                message: '验证码必填'
                            },
                            phone: {
                                country: 'CN',
                                message: '请输入有效的手机账号'
                            }
                        }
                    }

                }
            })
            .on('success.form.fv', function (e) {
                e.preventDefault();
                var $form = $(e.target);

                // Get the FormValidation instance
                var bv = $form.data('formValidation');

                $.post("<?php echo U('bind');?>",
                        $('#defaultForm').serialize(),
                        function (data) {
                            if (data.result == 'success') {
                                Lobibox.notify('success', {
                                    size: 'mini',
                                    width: 300,
                                    msg: '操作成功'
                                });
                                $.get("<?php echo U('binding');?>", function (data) {
                                    $('#goodChildView').html(data)
                                })
                            }
                            else {
                                Lobibox.notify('error', {
                                    size: 'mini',
                                    width: 300,
                                    msg: data.describe
                                });
                            }
                        }, 'json'
                )


            });
</script>
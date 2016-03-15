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
<div class="container" style="width: 100%;height:350px;">
    <div class="page-header">
        <ol class="breadcrumb">
          <li><a href="#">个人中心</a></li>
          <li><a href="#">安全设置</a></li>
          <li class="active">修改密码</li>
        </ol>
    </div>
    <form id="defaultForm" class="form-horizontal" style="margin-top: 30px">
        <div class="form-group">
            <label class="col-sm-2 control-label">账号</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" name="account" placeholder="请输入手机账号">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">旧密码</label>

            <div class="col-sm-5">
                <input type="password" class="form-control" name="oldPassword" placeholder="请输入旧密码">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">新密码</label>

            <div class="col-sm-5">
                <input type="password" class="form-control" name="newPassword" placeholder="请输入新密码">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">修改密码</button>
            </div>
        </div>
    </form>
</div>
<script>
    $('#defaultForm')
            .formValidation({
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    account: {
                        validators: {
                            notEmpty: {
                                message: '账号必填'
                            },
                            phone: {
                                country: 'CN',
                                message: '请输入有效的手机账号'
                            }
                        }
                    },
                    oldPassword: {
                        validators: {
                            notEmpty: {
                                message: '旧密码必填'
                            },
                        }
                    },
                    newPassword: {
                        validators: {
                            notEmpty: {
                                message: '新密码必填'
                            },
                            different: {
                                field: 'oldPassword',
                                message: '新密码和就密码不能相同'
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

                $.post("<?php echo U('resPw');?>",
                        $('#defaultForm').serialize(),
                        function (data) {
                            if (data.result == 'success') {
                                Lobibox.notify('success', {
                                    size: 'mini',
                                    width: 300,
                                    msg: '修改成功'
                                });
                                $.get("<?php echo U('manage');?>", function (data) {
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
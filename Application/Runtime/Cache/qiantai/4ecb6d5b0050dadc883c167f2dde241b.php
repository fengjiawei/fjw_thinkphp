<?php if (!defined('THINK_PATH')) exit();?><div class="container" style="width: 100%;">
    <div>
        <div class="page-header">
            <ol class="breadcrumb">
                <li><a href="#">个人中心</a></li>
                <li class="active">账户管理</li>
            </ol>
        </div>
        <ul class="list-group" style="margin-top: 20px;width: 60%">

            <div class="media">
                <div class="media-left media-middle">
                    <a href="#">
                        <img class="media-object" src="/Uploads/img/tx.png" alt="你好">
                    </a>
                </div>
                <div class="media-body" style="margin-top: 20px;vertical-align: middle">
                    <h3 class="media-heading">
                        <?php if($list["name"] == '' ): echo ($list["account"]); ?>
                            <?php else: ?>
                            <?php echo ($list["name"]); endif; ?>
                    </h3>
                    <!--<label>手机号码：</label><?php echo ($list["phone"]); ?>-->
                </div>
            </div>

            <li class="list-group-item" style="margin-top: 10px">
                <div class="row">
                    <div class="col-md-4">实名认证</div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <?php if($list["authentication"] == 'authed'): ?><a href="javascript:void(0)" class="button button-uppercase button-action">已认证</a>
                            <!--<a class="btn btn-success" href="###">已认证</a>-->
                            <?php else: ?>
                            <a class="button button-caution" href="javascript:void(0)" onclick="auth()">立即认证</a><?php endif; ?>
                        <script>
                            function auth() {
                                $.get('<?php echo U("authentication");?>', function (data) {
                                    $('#goodChildView').html(data)
                                })
                            }
                        </script>
                    </div>
                </div>

            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4">修改密码</div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <a href="#" class="button button-caution">修改密码</a>
                        <!--<a href="###" class="button button-uppercase button-caution">修改密码</a>-->
                        <!--<a class="btn btn-danger" href="###">修改密码</a>-->
                    </div>

                </div>
            </li>
        </ul>


        <div>
            <h3>账号资料</h3></div>
        <form id="contract" action="" method="post">
            <ul class="list-group" style="width: 60%">

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">用户编码</div>
                        <div class="col-md-4">
                            <label><?php echo ($list["code"]); ?></label>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">联系人</div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" value="<?php echo ($list["person"]); ?>"/>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">联系电话</div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="phone" class="form-control" value="<?php echo ($list["phone"]); ?>"/>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-lg" type="button" onclick="save()">
                                &nbsp;编辑保存&nbsp;</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</div>
<script>
    function save() {
        $.post("<?php echo U('Index/updateContract');?>",
                $('#contract').serialize(),
                function (data) {
                    if (data.result == 'success') {
                        Lobibox.notify('success', {
                            size: 'mini',
                            width: 300,
                            msg: '修改成功'
                        });
                        $.get("<?php echo U('Car/manage');?>", function (data) {
                            $('#carChildView').html(data);
                        });
                    } else {
                        Lobibox.notify('error', {
                            size: 'mini',
                            width: 300,
                            msg: data.describe
                        });
                    }
                }, 'json'
        )
    }
</script>
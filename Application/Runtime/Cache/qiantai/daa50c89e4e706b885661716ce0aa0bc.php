<?php if (!defined('THINK_PATH')) exit();?><style>
    .container .font-t {
        font-size: 28px;
        font-family: "Microsoft YaHei";
        color: #009999;
        margin-top: 20px;
    }

    .container .font-a {
        font-size: 12px;
        font-family: "Microsoft YaHei";
        color: #818181;
        height: 2em;
        line-height: 2em;
        overflow: hidden;
    }

    .container .font-b {
        font-size: 16px;
        font-family: "Microsoft YaHei";
        color: #4c4c4c;
    }

    .container .font-a p {
        font-size: 12px;
        font-family: "Microsoft YaHei";
        height: 2em;
        line-height: 2em;
        overflow: hidden;
    }
</style>
<div class="container" style="width: 100%">
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">个人中心</a></li>
            <li class="active">安全设置</li>
        </ol>
    </div>

    <table class="table table-striped">
        <tr>
            <td class="font-a" style="color:green;"><span class="label label-success">保护中</span></td>
            <td class="font-b">登入密码</td>
            <td class="font-a">登录时输入，保护账户安全</td>
            <td class="font-a"><a href="javascript:void(0)" onclick="resetPw()">修改</a></td>
        </tr>
        <tr>
            <td class="font-a">
                <?php if($list["authenticationState"] == 'authed'): ?><span class="label label-success">已认证</span>
                    <?php elseif($list["authenticationState"] == 'wait'): ?>
                    <span class="label label-info">认证中</span>
                    <?php else: ?>
                    <span class="label label-warning">未认证</span><?php endif; ?>
            </td>
            <td class="font-b">实名认证</td>
            <td class="font-a">实名认证后可享受更多功能和服务，找回账户更快捷</td>
            <td class="font-a">
                <?php if($list["authenticationState"] == 'authed'): ?><!--<p style="color: green">已认证</p>-->
                    <?php elseif($list["authenticationState"] == 'wait'): ?>
                    <a>查看</a>
                    <?php else: ?>
                    <a href="javascript:void(0)" onclick="auth()">立即认证</a><?php endif; ?>
            </td>
        </tr>
        <script>
            function auth(){
                $.get('<?php echo U("authentication");?>', function (data) {
                    $('#carChildView').html(data)
                })
            }
            function resetPw(){
                $.get('<?php echo U("resetPw");?>', function (data) {
                    $('#carChildView').html(data)
                })

            }
            function bind() {
                $.get('<?php echo U("binding");?>', function (data) {
                    $('#carChildView').html(data)
                })
            }
        </script>
        <tr>
            <td class="font-a"><span class="label label-success">已绑定</span></td>
            <td class="font-b">账号绑定</td>
            <td class="font-a">通过绑定手机或者绑定邮箱找回密码</td>
            <td class="font-a"><a href="javascript:void(0)" onclick="bind()">设置</a></td>
        </tr>
        <tr>
            <td class="font-a"><span class="label label-default">未使用</span></td>
            <td class="font-b">支付密码</td>
            <td class="font-a">支付运费时输入，保护账户资金安全</td>
            <td class="font-a"><a href="javascript:void(0)" onclick="return false">设置</a></td>
        </tr>
        <tr>
            <td class="font-a"><span class="label label-default">未使用</span></td>
            <td class="font-b">转账密码</td>
            <td class="font-a">余额转出或修改转出账户时输入，保护账户安全</td>
            <td class="font-a"><a href="javascript:void(0)" onclick="return false">设置</a></td>
        </tr>
        <tr>
            <td class="font-a"><span class="label label-default">未使用</span></td>
            <td class="font-b">限额设置</td>
            <td class="font-a">支付运费时输入，保护账户资金安全</td>
            <td class="font-a"><a href="javascript:void(0)" onclick="return false">设置</a></td>
        </tr>
    </table>
    <div style="height: 200px;background-color: #ffffff"></div>
</div>
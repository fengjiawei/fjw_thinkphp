<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>欢迎登录56智配网</title>

    <meta name="description" content="User login page"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="/Public/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css"/>

    <!-- text fonts -->
    <link rel="stylesheet" href="/Public/assets/css/ace-fonts.css"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="/Public/assets/css/ace.min.css"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/Public/assets/css/ace-part2.min.css"/>
    <![endif]-->
    <link rel="stylesheet" href="/Public/assets/css/ace-rtl.min.css"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css"/>
    <![endif]-->
    <link rel="stylesheet" href="/Public/assets/css/ace.onpage-help.css"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="/Public/assets/js/html5shiv.js"></script>
    <script src="/Public/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <span class="red">56智配</span>
                            <span class="white" id="id-text2">配载平台</span>
                        </h1>
                        <h4 class="blue" id="id-company-text">&copy; 乾泰物流</h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-coffee green"></i>
                                        请输入您的信息
                                    </h4>

                                    <div class="space-6"></div>

                                    <form id="log-form" method="post">
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<select id="type" name="type" class="form-control"
                                                                    placeholder="">
                                                                <option value="account">账号</option>
                                                                <option value="phone">手机</option>
                                                                <option value="email">邮箱</option>
                                                            </select>
															<!--<i class="ace-icon fa fa-user"></i>-->
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" id="account" name="account"
                                                                   class="form-control"
                                                                   placeholder="用户名"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="password" type="password" name="password"
                                                                   class="form-control"
                                                                   placeholder="密码"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input id="rmbUser" type="checkbox" class="ace"/>
                                                    <span class="lbl"> 记住我</span>
                                                </label>
                                                <script>
                                                    function saveUserInfo() {
                                                        if ($('#rmbUser').is(':checked') == true) {
                                                            var userName = $("#account").val();
                                                            var passWord = $("#password").val();
                                                            var type = $("#type").val();
                                                            $.cookie("rmbUser", "true", {expires: 7}); // 存储一个带7天期限的 cookie
                                                            $.cookie("userName", userName, {expires: 7}); // 存储一个带7天期限的 cookie
                                                            $.cookie("passWord", passWord, {expires: 7}); // 存储一个带7天期限的 cookie
                                                            $.cookie("type", type, {expires: 7}); // 存储一个带7天期限的 cookie
                                                        }
                                                        else {
                                                            $.cookie("rmbUser", "false", {expires: -1});        // 删除 cookie
                                                            $.cookie("userName", '', {expires: -1});
                                                            $.cookie("passWord", '', {expires: -1});
                                                            $.cookie("type", '', {expires: -1});
                                                        }
                                                    }
                                                </script>
                                                <button id="logbtn" type="button"
                                                        class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">登录</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>
                                </div>
                                <!-- /.widget-main -->

                                <div class="toolbar clearfix">
                                    <div>
                                        <a href="#" data-target="#forgot-box"
                                           class="forgot-password-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            忘记密码
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" data-target="#signup1-box" class="user-signup-link">
                                            货主注册
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                        <a href="#" data-target="#signup2-box" class="user-signup-link">
                                            车主注册
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.login-box -->

                        <div id="forgot-box" class="forgot-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="ace-icon fa fa-key"></i>
                                        找回密码 </h4>

                                    <div class="space-6"></div>
                                    <p>
                                        输入绑定手机号
                                    </p>

                                    <form id="forgot-form">
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="bindphone" name="phone" type="tel"
                                                                   class="form-control" placeholder="输入手机好吗"/>
															<i class="ace-icon fa fa-phone"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="smsCode" type="tel"
                                                                   class="width-55 pull-left form-control"
                                                                   placeholder="验证码"/>
														</span>
                                                <button id="yzmbtn1" onclick="time1()" type="button"
                                                        class="width-35 pull-right btn btn-sm btn-default">
                                                    获取验证码
                                                </button>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="newPassword" type="password"
                                                                   class="form-control" placeholder="新密码"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <div class="clearfix">
                                                <button onclick="resetpw()" type="button"
                                                        class="width-35 pull-right btn btn-sm btn-danger">
                                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                                    <span class="bigger-110">重置密码</span>
                                                </button>
                                                <script>
                                                    function resetpw() {
                                                        $.post(
                                                                '<?php echo U("Index/backPw");?>',
                                                                $('#forgot-form').serialize(),
                                                                function (data) {
                                                                    if (data.result == 'success') {
                                                                        alert('密码修改成功，请登录')
                                                                    }

                                                                },
                                                                'json'
                                                        );

                                                    }

                                                    var wait1 = 0;
                                                    function time1() {
                                                        $.post(
                                                                '<?php echo U("Index/smsCode");?>',
                                                                {
                                                                    phone: $('#bindphone').val(),
                                                                    type: 1
                                                                },
                                                                function (data) {
                                                                    wait1 = data.countdown
                                                                    if (wait1 == 0) {
                                                                        alert(data.describe)
                                                                    }
                                                                    timeTest1();

                                                                },
                                                                'json'
                                                        );
                                                    }
                                                    function timeTest1() {
                                                        if (wait1 == 0) {
                                                            $('#yzmbtn1').removeAttr("disabled");
                                                            $('#yzmbtn1').html("获取验证码");
                                                        } else {
                                                            $('#yzmbtn1').attr("disabled", true);
                                                            $('#yzmbtn1').html("重新发送(" + wait1 + ")");
                                                            wait1--;
                                                            setTimeout(function () {
                                                                        timeTest1()
                                                                    },
                                                                    1000)
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <!-- /.widget-main -->

                                <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        登录
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.forgot-box -->

                        <div id="signup1-box" class="signup-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header green lighter bigger">
                                        <i class="ace-icon fa fa-users blue"></i>
                                        货主注册
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>输入你的详细信息</p>

                                    <form id="reg-from">
                                        <fieldset>
                                            <input type="text" name="type" value="company" style="display: none;">
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email" class="form-control"
                                                                   placeholder="Email（自动绑定）"/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="name" class="form-control"
                                                                   placeholder="昵称"/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                            </label>


                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" id="account_2" name="account" class="form-control"
                                                                   placeholder="账号"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" id="password_2" name="password" class="form-control"
                                                                   placeholder="密码"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control"
                                                                   placeholder="重复密码"/>
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" id="phone" name="phone"
                                                                   class="form-control" placeholder="手机号（自动绑定）"/>
															<i class="ace-icon fa fa-phone"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                <input type="text" name="smsCode" class="width-50 pull-left"
                                                       placeholder="请输入验证码">

                                                <button id="yzmbtn" type="button" onclick="time()"
                                                        class="width-50 pull-right btn btn-sm btn-default">
                                                    <span id="yzm" class="bigger-110">获取验证码</span>

                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                                    </span>
                                            </label>
                                            <script>
                                                var wait = 0;
                                                function time() {
                                                    $.post(
                                                            '<?php echo U("Index/smsCode");?>',
                                                            {
                                                                phone: $('#phone').val(),
                                                                type: 0
                                                            },
                                                            function (data) {
                                                                wait = data.countdown
                                                                if (wait == 0) {
                                                                    $('#phoneMsg').html(data.describe)
                                                                }
                                                                timeTest();

                                                            },
                                                            'json'
                                                    );
                                                }
                                                function timeTest() {
                                                    if (wait == 0) {
                                                        $('#yzmbtn').removeAttr("disabled");
                                                        $('#yzm').html("获取验证码");
                                                    } else {
                                                        $('#yzmbtn').attr("disabled", true);
                                                        $('#yzm').html("重新发送(" + wait + ")");
                                                        wait--;
                                                        setTimeout(function () {
                                                                    timeTest()
                                                                },
                                                                1000)
                                                    }
                                                }
                                            </script>

                                            <label class="block">
                                                <span class="block input-icon input-icon-right">
                                                <input type="checkbox" name="agree" class="ace"/>
														<span class="lbl">
															我同意
															<a href="#" class="bootbox-dialog">56智配网注册协议</a>
														</span>
                                                    </span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<span id="reg2Tip" style="color:#A94442"></span>
														</span>
                                            </label>

                                            <div class="space-24"></div>

                                            <div class="clearfix">
                                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                                    <i class="ace-icon fa fa-refresh"></i>
                                                    <span class="bigger-110">重置</span>
                                                </button>

                                                <button id="regbtn" type="button"
                                                        class="width-65 pull-right btn btn-sm btn-success">
                                                    <span class="bigger-110">注册</span>

                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                                <div class="toolbar center">
                                    我已注册，现在就
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        <i class="ace-icon fa fa-arrow-left"></i>
                                        登录

                                    </a>
                                </div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.signup-box -->
                        <div id="signup2-box" class="signup-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header green lighter bigger">
                                        <i class="ace-icon fa fa-users blue"></i>
                                        车主注册
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>输入你的详细信息</p>

                                    <form id="reg1-from">
                                        <fieldset>
                                            <input type="text" name="type" value="transport" style="display: none;">
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email" class="form-control"
                                                                   placeholder="Email（自动绑定）"/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="name" class="form-control"
                                                                   placeholder="昵称"/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                            </label>


                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" id="account_1" name="account"
                                                                   class="form-control"
                                                                   placeholder="账号"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" id="password_1"
                                                                   class="form-control"
                                                                   placeholder="密码"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="password2" type="password" class="form-control"
                                                                   placeholder="重复密码"/>
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="tel" id="phone1" name="phone"
                                                                   class="form-control" placeholder="手机号（自动绑定）"/>
															<i class="ace-icon fa fa-phone"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" name="smsCode" class="width-50 pull-left"
                                                           placeholder="请输入验证码">

                                                    <button onc id="yzmbtn2" type="button" onclick="time2()"
                                                            class="width-50 pull-right btn btn-sm btn-default">
                                                        <span id="yzm2" class="bigger-110">获取验证码</span>

                                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                    </button>
                                                </span>

                                            </label>
                                            <script>
                                                var wait2 = 0;
                                                function time2() {
                                                    $.post(
                                                            '<?php echo U("Index/smsCode");?>',
                                                            {
                                                                phone: $('#phone1').val(),
                                                                type: 0
                                                            },
                                                            function (data) {
                                                                wait2 = data.countdown
                                                                if (wait2 == 0) {
                                                                    $('#reg1Tip').html(data.describe)
                                                                }
                                                                timeTest2();

                                                            },
                                                            'json'
                                                    );
                                                }
                                                function timeTest2() {
                                                    if (wait2 == 0) {
                                                        $('#yzmbtn2').removeAttr("disabled");
                                                        $('#yzm2').html("获取验证码");
                                                    } else {
                                                        $('#yzmbtn2').attr("disabled", true);
                                                        $('#yzm2').html("重新发送(" + wait2 + ")");
                                                        wait2--;
                                                        setTimeout(function () {
                                                                    timeTest2()
                                                                },
                                                                1000)
                                                    }
                                                }
                                            </script>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="agree" type="checkbox" class="ace"/>
															<span class="lbl">
																我同意
																<a href="#" class="bootbox-dialog">56智配网注册协议</a>
															</span>
														</span>
                                            </label>


                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<span id="reg1Tip" style="color:#A94442"></span>
														</span>
                                            </label>

                                            <div class="space-24"></div>
                                            <div class="clearfix">
                                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                                    <i class="ace-icon fa fa-refresh"></i>
                                                    <span class="bigger-110">重置</span>
                                                </button>

                                                <button id="reg1btn" type="button"
                                                        class="width-65 pull-right btn btn-sm btn-success">
                                                    <span class="bigger-110">注册</span>

                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                                <div class="toolbar center">
                                    我已注册，现在就
                                    <a href="#" data-target="#login-box" class="back-to-login-link">

                                        <i class="ace-icon fa fa-arrow-left"></i>
                                        登录
                                    </a>
                                </div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.signup-box -->

                    </div>
                    <!-- /.position-relative -->

                    <div class="navbar-fixed-top align-right">
                        <br/>
                        &nbsp;
                        <a id="btn-login-dark" href="#">Dark</a>
                        &nbsp;
                        <span class="blue">/</span>
                        &nbsp;
                        <a id="btn-login-blur" href="#">Blur</a>
                        &nbsp;
                        <span class="blue">/</span>
                        &nbsp;
                        <a id="btn-login-light" href="#">Light</a>
                        &nbsp; &nbsp; &nbsp;
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.main-content -->
</div>
<!-- /.main-container -->

<!-- basic scripts -->


<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/assets/js/jquery.min.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/assets/js/jquery1x.min.js'>" + "<" + "/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) documet.write("<script src='/Public/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<!--[if lte IE 8]>
<script src="/Public/assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="/Public/assets/js/bootstrap.min.js"></script>
<script src="/Public/assets/js/jquery.validate.min.js"></script>
<script src="/Public/assets/js/jquery.maskedinput.min.js"></script>
<script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<!--ace js-->
<script src="/Public/assets/js/ace.min.js"></script>
<script src="/Public/assets/js/ace-elements.min.js"></script>
<script src="/Public/assets/js/bootbox.min.js"></script>


<script type="text/javascript">
    //    var scripts = [null,"./Public/assets/js/jquery-ui.custom.min.js","/Public/assets/js/jquery.ui.touch-punch.min.js","/Public/assets/js/bootbox.min.js","/Public/assets/js/jquery.easypiechart.min.js","/Public/assets/js/jquery.gritter.min.js","/Public/assets/js/spin.min.js", null]
    //    ace.load_ajax_scripts(scripts, function() {
    //inline scripts related to this page
    jQuery(function ($) {
        $(".bootbox-dialog").on(ace.click_event, function () {
            bootbox.dialog({
                message: "",
                title: '注册协议'
            })
        });

        if ($.cookie("rmbUser") == "true") {
            $("#rmbUser").attr("checked", true);
            $("#account").val($.cookie("userName"));
            $("#password").val($.cookie("passWord"));
            $("#type").val($.cookie("type"));
        }

    });


</script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {
        $(document).on('click', '.toolbar a[data-target]', function (e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible');//hide others
            $(target).addClass('visible');//show target
        });
    });
    jQuery(function ($) {

        //注册协议dialog
        $(".bootbox-dialog").on(ace.click_event, function () {
            bootbox.dialog({
                message: '欢迎使用“56智配”物流交易平台服务！<br>' +
                '本协议根据《中华人民共和国合同法》、《互联网信息服务管理办法》、关于网上交易的指导意见（暂行）》、《网络商品交易及有关服务行为管理暂行办法》、《网络零售第三方平台交易规则制定程序规定（试行）》的规定，参照《第三方电子商务交易平台服务规范》制定，由承诺遵守本协议规定，同意并使用“56智配”物流交易平台服务（B2B）的法律实体（下称“注册用户”或“您”），包括发布货物托运信息、交付货物承运的货主（下称“托运商”）及发布车辆待运信息、提供承运服务的物流服务商（下称“承运商”），与提供“56智配”物流交易平台服务的浙江乾泰物流股份有限公司（以下统称“56智配”）缔结。本协议具有合同效力，一旦您使用了该服务，即表示您已接受了以下所述的条款和条件。',
                title: '56智配网注册协议',
            })
        });

        //表单验证login
        $('#logbtn').bind('click', function () {
            alert(1111);
            $('#log-form').submit();
        })
        $(document).keydown(function (event) {
            var key = window.event ? event.keyCode : event.which;
            if (key == 13) {
                $('#log-form').submit();
            }
        });

        $('#log-form').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
//                email: {
//                    required: true,
//                    email:true
//                },

                account: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 5
                }
            },

            messages: {
                account: {
                    required: "用户名必须输入。",
                },
//                email: {
//                    required: "Please provide a valid email.",
//                    email: "Please provide a valid email."
//                },
                password: {
                    required: "密码必填。",
                    minlength: "密码长度至少5位。"
                },

//                state: "Please choose state",
//                subscription: "Please choose at least one option",
//                gender: "Please choose gender",
//                agree: "Please accept our policy"
            },


            highlight: function (e) {
                $(e).closest('.clearfix').removeClass('has-info').addClass('has-error');
            },

            success: function (e) {
                $(e).closest('.clearfix').removeClass('has-error');//.addClass('has-info');
                $(e).remove();
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            },

            submitHandler: function (form) {
                saveUserInfo();
                $.post(
                        '<?php echo U("Index/login");?>',
                        $("#log-form").serialize(),
                        function (data) {
                            console.log(data)
                            if (data.result == 'success') {

                                window.location.replace("<?php echo U('index');?>");
                            } else {
                                alert(data.describe)
                            }
                        },
                        'json'
                );

            },
            invalidHandler: function (form) {
            }
        });
        //表单验证车主注册
        $('#reg1btn').bind('click', function () {
            $('#reg1-from').submit();
        })
        $('#reg1-from').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                email: {
//                    required: true,
                    email: true
                },

                account: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password2: {
                    required: true,
//                    minlength: 5,
                    equalTo: "#password_1"
                },
                name: {
                    required: true
                },
                phone: {
                    required: true,
//                    phone: 'required'
                },
                smsCode: {
                    required: true,
                },
                agree: {
                    required: true,
                }
            },

            messages: {
                account: {
                    required: "用户名必须输入。",
                },
                email: {
//                    required: "",
                    email: "请输入正确格式的邮箱地址"
                },
                password: {
                    required: "密码必填。",
                    minlength: "密码长度至少5位。"
                },
                password2: {
                    required: '请确认密码',
                    equalTo: '密码和确认密码不一致'
                },
                phone: {
                    required: '请填写手机号'
                },
                name: {
                    required: "昵称必填。",
                },
                smsCode: "验证码必填",
                agree: "请阅读56智配网注册协议"

            },


            highlight: function (e) {
                $(e).closest('.clearfix').removeClass('has-info').addClass('has-error');
            },

            success: function (e) {
                $(e).closest('.clearfix').removeClass('has-error');//.addClass('has-info');
                $(e).remove();
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            },

            submitHandler: function (form) {
                $.post('<?php echo U("Index/reg");?>', $('#reg1-from').serialize(), function (data) {
                    console.log(data);
                    if (data.result == 'success') {
                        $.post(
                                '<?php echo U("Index/login");?>',
                                {
                                    type: "account",
                                    account: $('#account_1').val(),
                                    password: $('#password_1').val(),

                                },
                                function (data) {
                                    console.log(data)
                                    if (data.result == 'success') {

                                        window.location.replace("<?php echo U('index');?>");
                                    } else {
                                        alert(data.describe)
                                    }
                                },
                                'json'
                        );
                    } else if (data.result == 'error') {
                        $("#reg1Tip").html(data.describe);
                        //                                    window.location.reload()
                    }
                }, 'json');
            },
            invalidHandler: function (form) {
            }
        });

        //表单验证货主注册
        $('#regbtn').bind('click', function () {
            $('#reg-from').submit();
        })
        $('#reg-from').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                email: {
//                    required: true,
                    email: true
                },

                account: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password2: {
                    required: true,
//                    minlength: 5,
                    equalTo: "#password_1"
                },
                name: {
                    required: true
                },
                phone: {
                    required: true,
//                    phone: 'required'
                },
                smsCode: {
                    required: true,
                },
                agree: {
                    required: true,
                }
            },

            messages: {
                account: {
                    required: "用户名必须输入。",
                },
                email: {
//                    required: "",
                    email: "请输入正确格式的邮箱地址"
                },
                password: {
                    required: "密码必填。",
                    minlength: "密码长度至少5位。"
                },
                password2: {
                    required: '请确认密码',
                    equalTo: '密码和确认密码不一致'
                },
                phone: {
                    required: '请填写手机号'
                },
                name: {
                    required: "昵称必填。",
                },
                smsCode: "验证码必填",
                agree: "请阅读56智配网注册协议"

            },


            highlight: function (e) {
                $(e).closest('.clearfix').removeClass('has-info').addClass('has-error');
            },

            success: function (e) {
                $(e).closest('.clearfix').removeClass('has-error');//.addClass('has-info');
                $(e).remove();
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            },

            submitHandler: function (form) {

                $.post('<?php echo U("Index/reg");?>', $('#reg-from').serialize(), function (data) {
                    if (data.result == 'success') {
                        $.post(
                                '<?php echo U("Index/login");?>',
                                {
                                    type: "account",
                                    account: $('#account_2').val(),
                                    password: $('#password_2').val(),

                                },
                                function (data) {
                                    if (data.result == 'success') {

                                        window.location.replace("<?php echo U('index');?>");
                                    } else {
                                        alert(data.describe)
                                    }
                                },
                                'json'
                        );
                    } else if (data.result == 'error') {
                        $("#reg2Tip").html(data.describe);
                        //                                    window.location.reload()
                    }
                }, 'json');
            },
            invalidHandler: function (form) {
            }
        });

    });


    //you don't need this, just used for changing background
    jQuery(function ($) {
        $('#btn-login-dark').on('click', function (e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-light').on('click', function (e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-blur').on('click', function (e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
        });

    });
</script>
</body>
</html>
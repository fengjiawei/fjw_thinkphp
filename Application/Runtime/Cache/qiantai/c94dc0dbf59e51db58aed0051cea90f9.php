<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="utf-8">
    <title>56智配网欢迎您！</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel="stylesheet" href="/Public/css/login/reset.css">
    <link rel="stylesheet" href="/Public/css/login/supersized.css">
    <link rel="stylesheet" href="/Public/css/login/style.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
        .input {
            font-size: 5px;
            width: 15px;
            height: 15px;
            line-height: 15px;
            margin-top: 0px;
            padding: 0 15px;
            background: #2d2d2d; /* browsers that don't support rgba */
            *background-color: transparent;
            background: rgba(45, 45, 45, .15);
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            /*   border: 1px solid #3d3d3d; /* browsers that don't support rgba */
            /*border: 1px solid rgba(255,255,255,.15);
            -moz-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;*/
            /* -webkit-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;*/
            box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .1) inset;
            font-family: 'PT Sans', Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #fff;
            text-shadow: 0 1px 2px rgba(0, 0, 0, .1);
            -o-transition: all .2s;
            -moz-transition: all .2s;
            -webkit-transition: all .2s;
            -ms-transition: all .2s;
        }
    </style>

</head>

<body>

<div class="page-container">

    <a href="<?php echo U('index');?>"><img src="/Uploads/img/login/logo.png"/></a>

    <div id="log">

        <form id="loginInfo" action="" method="post">
            <div>
                <input type="text" id="username" name="account" class="username" placeholder="请输入手机号码"
                       autocomplete="off"/>
            </div>
            <div>
                <input type="password" id="password" name="password" class="password" placeholder="请输入密码"
                       oncontextmenu="return false"
                       onpaste="return false"/>
            </div>
            <div style="float: left">
                <input type="text" id="verify" name="verify" style="float: left" class="yanzhengma"
                       placeholder="请输入验证码"
                       oncontextmenu="return false" onpaste="return false"/>
                <img id="ver" src='<?php echo U("Index/verify");?>' class="img" style="border-radius: 20px"
                     onclick="this.src=this.src+'?'+Math.random()"/>
            </div>
            <div style="font-size: 15px;line-height: 28px;font-weight: bold;float: left;margin-top: 25px">
                <input id="rmbUser" type="checkbox" class="input"/> &nbsp;记住密码&nbsp;|&nbsp;<a href="javascript:void(0)"
                                                                                              onclick="retrieve()">忘记密码</a>&nbsp;
            </div>
            <button id="submit" type="button">登 陆</button>
            <input type="reset" id="res" style="display: none">
        </form>
    </div>
    <div id="forget" style="display: none">
        <form id="newInfo" action="" method="post">
            <div>
                <input type="text" id="phone" name="phone" class="username" placeholder="请输入手机号码"
                       autocomplete="off"/>
            </div>
            <div>
                <input type="password" name="newPassword" class="password" placeholder="请输入密码"
                       oncontextmenu="return false"
                       onpaste="return false"/>
            </div>
            <div>
                <input class="yanzhengma" name="smsCode" type="text" style="float:left;"/>
                <button id="yzm" class="btnyzm" type="button" style="float: right" onclick="time()">获取验证码</button>
                <!--<button  onclick="time()" style="width: 60%">获取验证码-->
                <!--</button>-->
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
                                    alert(data.describe)
//                                    $('#phoneMsg').html(data.describe)

                                }
                                timeTest();

                            },
                            'json'
                    );
                }
                function timeTest() {
                    if (wait == 0) {
                        $('#yzm').removeAttr("disabled");
                        $('#yzm').text("获取验证码");
                    } else {
                        $('#yzm').attr("disabled", true);
                        $('#yzm').text("重新发送(" + wait + ")");
                        wait--;
                        setTimeout(function () {
                                    timeTest()
                                },
                                1000)
                    }
                }
                function backPw(){
                    $.post("<?php echo U('backPw');?>",
                            $('#newInfo').serialize(),
                            function (data) {
                                if (data.result == 'success') {
                                    alert('修改成功')
//                                    Lobibox.notify('success', {
//                                        size: 'mini',
//                                        width: 300,
//                                        msg: '修改成功'
//                                    });
//                                    $.get("<?php echo U('manage');?>", function (data) {
//                                        $('#goodChildView').html(data)
//                                    })
                                    window.location.reload();
                                }
                                else {
//                                    Lobibox.notify('error', {
//                                        size: 'mini',
//                                        width: 300,
//                                        msg: data.describe
//                                    });
                                    alert(data.describe)
                                }
                            }, 'json'
                    )
                }
            </script>
            <button type="button" onclick="backPw()">修改密码</button>
        </form>
    </div>
    <div class="connect">
        <p>If we can only encounter each other rather than stay with each other,then I wish we had never
            encountered.</p>

        <p style="margin-top:20px;">56智配网欢迎您的到来!</p>
    </div>
</div>
<div class="alert" style="display:none">
    <h2>消息</h2>

    <div class="alert_con">
        <p id="ts"></p>

        <p style="line-height:70px"><a class="btn">确定</a></p>
    </div>
</div>

<!-- Javascript -->
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript" src="/Public/js/login/supersized.3.2.7.min.js"></script>
<script type="text/javascript" src="/Public/js/login/supersized-init.js"></script>
<script>
    $(document).ready(function () {
        if ($.cookie("rmbUser") == "true") {
            $("#rmbUser").attr("checked", true);
            $("#username").val($.cookie("userName"));
            $("#password").val($.cookie("passWord"));
        }
    });
    function saveUserInfo() {
        if ($('#rmbUser').is(':checked') == true) {
            var userName = $("#username").val();
            var passWord = $("#password").val();
            $.cookie("rmbUser", "true", {expires: 7}); // 存储一个带7天期限的 cookie
            $.cookie("userName", userName, {expires: 7}); // 存储一个带7天期限的 cookie
            $.cookie("passWord", passWord, {expires: 7}); // 存储一个带7天期限的 cookie
        }
        else {
            $.cookie("rmbUser", "false", {expires: -1});        // 删除 cookie
            $.cookie("userName", '', {expires: -1});
            $.cookie("passWord", '', {expires: -1});
        }
    }
    console.log($('#rmbUser').is(':checked'))

    $("html").die().live("keydown", function (event) {
        if (event.keyCode == 13) {
            log()
        }
    });
    function refresh() {
        $('#ver').attr('src', '<?php echo U("Index/verify");?>')
    }
    $(".btn").click(function () {
        is_hide();

    })
    var u = $("input[name=username]");
    var p = $("input[name=password]");
    var v = $("input[name=verify]");
    function log() {
        if (u.val() == '' || p.val() == '') {
            $("#ts").html("用户名或密码不能为空~");
            is_show();
            return false;
        } else if (v.val() == '') {
            $("#ts").html("请输入验证码");
            is_show();
            return false;
        } else {
            saveUserInfo();
            $.post(
                    '<?php echo U("Index/login");?>',
                    $("#loginInfo").serialize(),
//                    {
//                        usrname: $.cookie('userName');
//                    },
                    function (data) {
                        console.log(data.result)
                        if (data.ver) {
                            $("#ts").html("验证码错误");
                            refresh();
                            is_show();
                            return;
                        }
                        ;
                        if (data.result == 'success') {
                            window.location.replace("<?php echo U('index');?>");
                        } else {
                            $("#ts").html(data.describe);
                            $('#res').click()
                            refresh();
                            is_show();
//                            window.location.reload()
                        }
                    },
                    'json'
            );
        }
    }
    $("#submit").live('click', function () {
        log();
    });

    window.onload = function () {
        $(".connect p").eq(0).animate({"left": "0%"}, 600);
        $(".connect p").eq(1).animate({"left": "0%"}, 400);
    }
    function is_hide() {
        $(".alert").animate({"top": "-40%"}, 300)
    }
    function is_show() {
        $(".alert").show().animate({"top": "45%"}, 300)
    }

    function retrieve() {
        $('#phone').val($('#username').val())
        $('#log').hide()
        $('#forget').show()
    }
</script>
</body>

</html>
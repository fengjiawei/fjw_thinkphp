<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>注册</title>
    <style type="text/css">
        body {
            font-family: Arial, Sans-Serif;
            font-size: 0.85em;
        }

        img {
            border: none;
        }

        ul, ul li {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        ul li.first {
            border-top: 1px solid #DFDFDF;
        }

        ul li.last {
            border: none;
        }

        ul p {
            float: left;
            margin: 0;
            width: 310px;
        }

        ul h3 {
            float: left;
            font-size: 14px;
            font-weight: bold;
            margin: 5px 0 0 0;
            width: 200px;
            margin-left: 20px;
        }

        ul li {
            border-bottom: 1px solid #DFDFDF;
            padding: 15px 0;
            width: 600px;
            overflow: hidden;
        }

        ul input[type="text"], ul input[type="password"] {
            width: 300px;
            padding: 5px;
            position: relative;
            border: solid 1px #666;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }

        ul input.required {
            border: solid 1px #f00;
        }
    </style>
    <script src="/Public/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css" />
    <script type="text/javascript">
        $(document).ready(function () {
            function refresh(){
                $('#ver').attr('src','<?php echo U("Index/verify");?>')
            }
            $("#reg").click(function () {

                resetFields();
                var emptyfields = $("input[value=]");
                if (emptyfields.size() > 0) {
                    emptyfields.each(function () {
                        $(this).stop()
                                .animate({left: "-10px"}, 100).animate({left: "10px"}, 100)
                                .animate({left: "-10px"}, 100).animate({left: "10px"}, 100)
                                .animate({left: "0px"}, 100)
                                .addClass("required");
                    });
                } else {
                    $.post(
                            '<?php echo U("Index/reg");?>',
                            $("#registerInfo").serialize(),
                            function (data) {
                                console.log(data.result)
                                if (data.result == 'success') {
                                   alert('注册成功')
                                    window.location.replace('<?php echo U("index");?>')
                                } else if (data.result == 'error') {
                                    alert(data.describe);
//                                    window.location.reload()
                                }
                            },
                            'json'
                    );
                }
            });
        });
        function resetFields() {
            $("input[type=text], input[type=password]").removeClass("required");
        }
    </script>
</head>
<body>
<center>
    <br/><br/>

    <h2><img src="/Uploads/img/logo.jpg"/></h2>

    <form id="registerInfo" method="post">
    <ul>
        <li class="first">
            <h3>账号</h3>

            <p>

                <input type="text" id="account" name="account" placeholder="输入账号"/></p>
        </li>
        <li>

            <h3>密码</h3>

            <p>
                <input type="password" name="password" placeholder="输入密码"/></p>
        </li>
        <li>

            <h3>会员类型</h3>

            <p>
                <select style="width: 300px;padding: 5px;height: 32px;border:solid 1px #666" name="type" class="form-control">
                    <option value="company">我是货主</option>
                    <option value="transport">我是车主</option>
                </select></p>
        </li>
        <li>

            <h3>用户名</h3>

            <p>
                <input type="text" name="name" placeholder="用户名必填"/></p>
        </li>
        <li>

            <h3>地址</h3>

            <p>
                <input type="text" name="address" placeholder="请输入地址"/></p>
        </li>
        <li>

            <h3>手机号码</h3>

            <p>
                <input type="text" id="phone" name="phone" placeholder="请输入手机号码"/></p>
        </li>
        <li>

            <h3>验证码</h3>

            <p>
                <input type="text" name="smsCode" placeholder="验证码" style="width:40%;float: left"/>
                <input id="yzm" type="button" class="btn btn-default" style="height: 30px;line-height: normal" value="获取验证码" onclick="time()"/>
            </p>
        </li>
        <script type="text/javascript">
            var wait=0;
            function time() {
                $.post(
                        '<?php echo U("Index/smsCode");?>',
                        {
                            phone:$('#phone').val(),
                            type:0
                        },
                        function (data) {
                            wait=data.countdown
                            if(wait==0){
                                alert(data.describe)
                            }
                            timeTest();

                        },
                        'json'
                );
            }
            function timeTest(){
                if (wait == 0) {
                    $('#yzm').removeAttr("disabled");
                    $('#yzm').val("获取验证码");
                } else {
                    $('#yzm').attr("disabled", true);
                    $('#yzm').val("重新发送(" + wait + ")");
                    wait--;
                    setTimeout(function () {
                                timeTest()
                            },
                            1000)
                }
            }
        </script>
        <!--<li>-->
            <!--<h3>验证码</h3>-->

            <!--<p>-->
                <!--<input type="text" id="verify" name="verify" placeholder="输入验证码" style="width:40%;float: left"/>-->
                <!--<img id="ver" src='<?php echo U("Index/verify");?>' onclick="this.src=this.src+'?'+Math.random()"/>-->
            <!--</p>-->

        <!--</li>-->
        <li class="last">
            <button id="reg" type="button" class="btn btn-primary" style="width:35% ;float:right">注册并登陆
            </button>
            <!--<p>还没有账号？<a style="color: orangered" href="#">立即注册</a> | <a style="color: orangered"href="#">忘记密码</a>-->
            <!--</p>-->
        </li>
    </ul>
    </form>
</center>
</body>
</html>
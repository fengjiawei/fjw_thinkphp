<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>注册</title>
    <style type="text/css">
        body {
            font-family: Arial, Sans-Serif;
            font-size: 0.85em;
        }

        span {
            color: red;
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
            /*border-top: 1px solid #DFDFDF;*/
        }

        ul li.last {
            border: none;
        }

        ul p {
            float: left;
            margin: 0;
            width: 500px;
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
            /*border-bottom: 1px solid #DFDFDF;*/
            padding: 15px 0;
            width: 70%;
            overflow: hidden;
        }

        ul input[type="text"], ul input[type="password"] {
            /*text-align: left;*/
            width: 300px;
            float: left;
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
    <!--<script src="/Public/js/jquery.min.js"></script>-->
    <!--<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css" />-->
                <!-- jQuery -->
            <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js  "></script>
            <script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>


            <!-- Bootstrap JavaScript -->
            <script type="text/javascript" src="/Public/js/bootstrap.js"></script>
            <script type="text/javascript" src="/Public/js/bootstrap-table.js"></script>
            <script type="text/javascript" src="/Public/js/bootstrap-table-zh-CN.js"></script>
            <script type="text/javascript" src="/Public/js/tooltip.js"></script>
            <script type="text/javascript" src="/Public/js/popover.js"></script>
            <script src="http://apps.bdimg.com/libs/angular.js/1.4.0-beta.4/angular.min.js"></script>
            <!--<script src="http://apps.bdimg.com/libs/angular-route/1.3.13/angular-route.js"></script>-->
            <!-- import -->
            <!-- <script type="text/javascript" src="/Public/Js/bootstrap.js"></script> -->

            <!-- load -->
             <!---->

            <!-- css -->
             <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css" />
             <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-table.css" />
             <link rel="stylesheet" type="text/css" href="/Public/css/normalize.css" />
             <link rel="stylesheet" type="text/css" href="/Public/css/jquery-ui-1.10.0.custom.css" />
             <!--<link rel="stylesheet" type="text/css" href="/Public/css/lanrenzhijia.css" />-->



            <!-- js -->
             <script type="text/javascript" src="/Public/js/json.js"></script>
            <script>

                var app = angular.module('app', []);

                app.controller('cityCtrl', ['$scope', function ($scope) {
                    $scope.error = {};
                    $scope.list = json;
                }]);
            </script>
    <script type="text/javascript">
        $(document).ready(function () {
            function refresh() {
                $('#ver').attr('src', '<?php echo U("Index/verify");?>')
            }

            $("#reg").click(function () {

                resetFields();
                var emptyfields = $("input[type=text],input[type=password]").val();
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

    <div id = 'modal' title="56智配服务协议"></div>
    <h2><img src="/Uploads/img/logo.jpg"/></h2>

    <form id="registerInfo" method="post">
        <ul>
            <li class="first">
                <h3>账号</h3>

                <p><input type="text" id="account" name="account" placeholder="输入账号"/> <span>＊账号为手机号码</span>
                </p>
            </li>
            <li>

                <h3>密码</h3>

                <p>
                    <input type="password" name="password" placeholder="输入密码"/></p>
            </li>
            <li>

                <h3>会员类型</h3>

                <p>
                    <input type="text" value="我是货主" readonly/>
                    <input type="text" name="type" value="company" style="display: none"></p>
            </li>
            <li>

                <h3>验证码</h3>

                <p>
                    <input type="text" name="smsCode" placeholder="验证码"
                           style="width:40%;float: left;margin-right: 15px"/>
                    <input id="yzm" type="button" class="btn btn-default" style="height: 32px;float: left;"
                           value="获取验证码" onclick="time()"/>
                </p>
            </li>
            <li>
                <p><input id="checkboxes" onchange="change(this)" type="checkbox">&nbsp;我已经认证阅读并同意<a id="btn">《56智配网用户服务协议》</a></p></li>
            <div>
                <div class="bs-example">
                    <h3>Advanced usage of Lobibox.window</h3>
                    <button id="popupWindowExample" class="btn btn-primary">Window</button>
                </div>
            </div>
            <script type="text/javascript">

                  $('#btn').on('click', function () {
                      $('#modal').dialog('open')
                  })

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
                                    alert(data.describe)
                                }
                                timeTest();

                            },
                            'json'
                    );
                }
                function timeTest() {
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
            <li class="last" style="text-align: center">
                <button id="reg" type="button" class="btn btn-primary" style="width:25% ;float: right;margin-left: 20px">注册并登陆
                </button><a  class="btn btn-primary" style="width:10% ;float:right;">返回首页
                </a>
                <!--<p>还没有账号？<a style="color: orangered" href="#">立即注册</a> | <a style="color: orangered"href="#">忘记密码</a>-->
                <!--</p>-->
                <script>
                    $('#reg').attr('disabled', true);
                    console.log($('#checkboxes').is(':checked'))
                    function change() {
                        if ($('#checkboxes').is(':checked') == true) {
                            $('#reg').removeAttr('disabled');
                        } else {
                            $('#reg').attr('disabled', true);
                        }
                    }
                </script>
            </li>
        </ul>
    </form>
</center>
</body>
</html>
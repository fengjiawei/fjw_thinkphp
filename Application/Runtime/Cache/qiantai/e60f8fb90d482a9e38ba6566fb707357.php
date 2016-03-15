<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- jQuery -->
<!--<script type="text/javascript" src="/fjw_thinkphp/Public/js/jquery.js"></script>-->
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js  "></script>
<!--<script src="/fjw_thinkphp/Public/js/jquery.min.js"></script>-->
<script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>


<!-- Bootstrap JavaScript -->
<!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="/fjw_thinkphp/Public/js/bootstrap.js"></script>
<script type="text/javascript" src="/fjw_thinkphp/Public/js/bootstrap-table.js"></script>
<script type="text/javascript" src="/fjw_thinkphp/Public/js/bootstrap-table-zh-CN.js"></script>
<script type="text/javascript" src="/fjw_thinkphp/Public/js/area/area.js"></script>
<script type="text/javascript" src="/fjw_thinkphp/Public/js/area/location.js"></script>
<script type="text/javascript" src="/fjw_thinkphp/Public/js/tip/lobibox.min.js"></script>
<script type="text/javascript" src="/fjw_thinkphp/Public/js/jspanel/jquery.jspanel-1.6.1.min.js"></script>
<script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>


<!--<script type="text/javascript" src="/fjw_thinkphp/Public/js/angular.js"></script>-->
<!--<script type="text/javascript" src="/fjw_thinkphp/Public/js/angular-route.js"></script>-->
<!--<script src="http://apps.bdimg.com/libs/angular.js/1.4.0-beta.4/angular.min.js"></script>-->
<!--<script src="http://apps.bdimg.com/libs/angular-route/1.3.13/angular-route.js"></script>-->
<!-- import -->
<!-- <script type="text/javascript" src="/fjw_thinkphp/Public/Js/bootstrap.js"></script> -->

<!-- load -->
<!---->

<!-- css -->
<link rel="stylesheet" type="text/css" href="/fjw_thinkphp/Public/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/fjw_thinkphp/Public/css/bootstrap-table.css" />
<link rel="stylesheet" type="text/css" href="/fjw_thinkphp/Public/css/button/button.css" />
<link rel="stylesheet" type="text/css" href="/fjw_thinkphp/Public/css/APPqt1.css" />
<link rel="stylesheet" type="text/css" href="/fjw_thinkphp/Public/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/fjw_thinkphp/Public/css/jquery-ui-1.10.0.custom.css" />
<link rel="stylesheet" type="text/css" href="/fjw_thinkphp/Public/css/tip/Lobibox.min.css" />
<!--<link rel="stylesheet" type="text/css" href="/fjw_thinkphp/Public/css/jspanel/jsPanel.css" />-->

<!--<link rel="stylesheet" type="text/css" href="/fjw_thinkphp/Public/css/lanrenzhijia.css" />-->


<!-- js -->


<!--<script src="//cdn.bootcss.com/bootstrap-datetimepicker/2.1.30/js/bootstrap-datetimepicker.min.js"></script>-->
<!--<script src="//cdn.bootcss.com/bootstrap-datetimepicker/3.0.0/js/bootstrap-datetimepicker.js"></script>-->
<!--<script src="//cdn.bootcss.com/bootstrap-datetimepicker/2.1.30/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>-->
<link href="//cdn.bootcss.com/bootstrap-datetimepicker/2.1.30/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<style>A:link {
    text-decoration: none;
}

A:visited {
    text-decoration: none;
}

A:active {
    text-decoration: none;
}</style>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
        body {
            font-family: "Microsoft YaHei";
        }
    </style>
    <title></title>
</head>
<body>

<div style=";background-color: #f5f5f5;width: 100%;height: 35px">

    <div class="container">
        <div style="text-align:left;margin-top: 5px;float: left">
            <?php if(($user["authent"] == 0) and ($user["name"] != '')): ?><P style="float: left"><?php echo ($user["name"]); ?></P>

                <P style="float: left;padding-left: 10px">欢迎来到56智配网</P>
                <a href="javascript:void(0)" style="text-decoration: none;color:green;margin-left: 20px;float: left"
                   id="close1">安全退出</a>
                <?php elseif($user["authent"] != 0): ?>
                <p style="float: left; margin-right: 10px"><?php echo ($user["name"]); ?></p>

                <P style="float: left">欢迎来到56智配网</P>
                <a href="javascript:void(0)" style="text-decoration: none;color:green;margin-left: 20px;float: left"
                   id="close">安全退出</a>
                <?php else: ?>
                请登录......
                <a href="<?php echo U('login1');?>">
                    登陆
                </a><?php endif; ?>
        </div>
        <!--<div style="float:right;margin-top: 5px;margin-left: 5px"><a href="http://www.qiantai56.com" style="color: grey">|企业官网</a></div>-->
        <div style="text-align: right;float:right;margin-top: 5px">
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3317710868&site=qq&menu=yes"><img border="0"
                                                                                                       src="http://wpa.qq.com/pa?p=2:3317710868:51"/></a>
        </div>

    </div>
</div>
<div class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4" style="padding: 0; margin: 0;">
                <a href="" class="branding" title="56zhipei">
                    <img src="/fjw_thinkphp/Uploads/img/logo.jpg">

                    <h2 class="text-hide">
                        现在您访问的是56智配网
                    </h2>
                </a>
            </div>
            <div class="col-md-8">
                <form class="navbar-form navbar-right" rel="search">
                    <div style="text-align: right;">
                        <div style="padding-top: 20px;">
                            <img src="/fjw_thinkphp/Uploads/img/icon-2.png" width="45px" style="float: left;margin-right: 20px">

                            <div class="title-z"
                                 style="font-size:18px;color: darkgrey;font-weight:bold;float: left;">
                                400-656-6756
                            </div>
                            <div class="title-c" style='color: darkgrey;text-align: center;'>全国咨询热线</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    //退出
    $('#close').click(function () {
//                alert('nihao');
                close()
            }
    )
    $('#close1').click(function () {
//                alert('nihao');
                close()
            }
    )
    function close() {
        $.post(
                '<?php echo U("Index/close");?>',
                function () {
                    window.location.href = '<?php echo U("Index/index");?>';
                }
        )
    }

    $('#dl').click(function () {
        var id = "<?php echo $_SESSION['name']?>"
        if (id != "" && id != null) {
            $('#tip_body').text('你已经登陆，不能重新登陆');
            $('#tip').modal('show');
            setTimeout(function () {
                $('#tip').modal('hide')
            }, 500);
        } else {
            $(".login").modal('show');
        }

    })
    function reg() {
        $.post(
                '<?php echo U("Index/reg");?>',
                $("#reg").serialize(),
                function (data) {
                    console.log(data.result);
                    if (data.result == 'success') {
                        $('.Registered').modal('hide');
//                        alert('注册成功');
                        $('#tip_body').text('注册成功');
                        $('#tip').modal('show');
                        setTimeout(function () {
                            $('#tip').modal('hide')
                        }, 1000);
                    } else if (data.result == 'error') {
                        $('#tip_body').text(data.describe);
                        $('#tip').modal('show');
                        setTimeout(function () {
                            $('#tip').modal('hide')
                        }, 1000);
                    }
                },
                'json'
        );
    }

    function getVer() {
        $.post(
                '/Index/Ver',
                {
                    mobile: $('#tel').val()
                }
        )
    }

    function validVer() {
        $.post(
                '/Index/valid',
                {
                    mobile: $('#tel').val(),
                    code: $('#code').val()
                },
                function (data, status) {
                    alert(data + "," + status)
                }
        )
    }
</script>
<script>
    $(function ($) {

        $.get("<?php echo U('show');?>", function (data) {
            $('#view').html(data);
        })
    });
</script>
<style>
    /*a:link{text-decoration:none ; color:white ;}*/
    /*a:visited {text-decoration:none ; color:white;}*/
    /*a:hover {text-decoration:underline ; color:white;}*/
    /*a:active {text-decoration:none ; color:white;}*/
    .main-navigation .menu li.nav-current a {
        color: #e67e22;
    }

    .main-navigation .menu li.nav-current a:link {
        text-decoration: none
    }

    /*.btn-default {*/
    /*background-color: #ffffff;*/
    /*border-color: #ffffff;*/
    /*color: #000000;*/
    /*}*/
    input {
        min-height: 34px;
    }

    .main-navigation .menu li a {
        color: #ffffff;
        line-height: 4em;
        display: block;
        padding: 0 21px;
    }


</style>
<nav class="main-navigation navbar-static-top"
     style="background: #337ab7;width: 100%  ">
    <div class="container">
        <div class="row">
            <div class="collapse navbar-collapse" id="main-menu">
                <ul id="nav" class="menu">
                    <li role="presentation" id="index" class="nav-current">
                        <a href="javascript:void(0);">
                            首页</a>
                    </li>
                    <!--<li role="presentation" id="goodinfo">-->
                    <!--<a href="javascript:void(0);">货源信息</a>-->
                    <!--</li>-->
                    <li role="presentation" id="goodinfo">
                        <a href="javascript:void(0);">物流企业</a>
                    </li>
                    <li role="presentation" id="carinfo">
                        <a href="javascript:void(0);">门到门</a>
                    </li>

                    <li role="presentation" id="newPlatService">
                        <a href="javascript:void(0);">平台服务</a>
                    </li>
                    <li role="presentation" id="platformResource">
                        <a href="javascript:void(0);">特价推荐</a>
                    </li>
                    <li role="presentation" id="center">
                        <a href="javascript:void(0);" id='vipcenter'>会员中心</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    $('.menu li').each(function () {
//        console.log($(this).attr('id'));
        var id = $(this).attr('id')
        $(this).on('click', function () {
            $("li").removeClass();
            $(this).addClass('nav-current')
            switch (id) {
                case 'index':
                    $.get("<?php echo U('show');?>", function (data) {
                        $('#view').html(data);
                    });
                    break;
                case 'goodinfo':
                    $.get("<?php echo U('Index/logistics');?>", function (data) {
                        $('#view').html(data);
                    });
                    break;
                case 'carinfo':
                    $.get("<?php echo U('Index/mdm');?>", function (data) {
                        $('#view').html(data);
                    });
                    break;
                case 'newPlatService':
                    $.get("<?php echo U('Index/newPlatService');?>", function (data) {
                        $('#view').html(data);
                    });
                    break;
                case 'platformResource':
                    $.get("<?php echo U('Index/spel');?>", function (data) {
                        $('#view').html(data);
                    });
                    break;
            }
        })

    })
    $('#vipcenter').click(function () {
        var type = '<?php echo $_SESSION["type"]?>';
        if (type == "" || type == null) {
            $('#vipcenter').attr('onclick', function () {
                window.location.replace('<?php echo U("login1");?>')
            });

        } else if (type == 'company' || type == 'goods') {
            $('#center').attr('onclick', function () {
                $.get("<?php echo U('Good/test');?>", function (data) {
                    $('#view').html(data);
                });
            });
        } else if (type == 'transport') {
            $('#center').attr('onclick', function () {
                $.get("<?php echo U('Car/center');?>", function (data) {
                    $('#view').html(data);
                });
            });
        }
    })

</script>
<!--主题内容-->
<div id="view" style="width: 100%">
</div>

<!--底部-->
<div style="float: left;width: 100%;margin-top: 10px">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget">
                        <h4 class="title">帮助中心</h4>

                        <div class="content tag-cloud" style="font-size: 12px;">
                            <a href="#">业务问答</a>
                            <a href="#">VIP权益</a>
                            <a href="#">服务条款</a>
                            <a href="#">版权声明</a>
                            <a href="#">免责声明</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <h4 class="title" id="APPxiazai">APP下载</h4>
                        <ul class="list-group inline list-unstyled">
                            <div class="col-md-5" id="saomiaohuozhu" style="margin:0 2px 0 0; padding: 0;">
                                <li>
                                    <a href="#"><img style="width: 100px;height: 100px" src="/fjw_thinkphp/Uploads/img/good1.bmp">
                                    </a>
                                    <h6>扫描下载货主APP</h6></li>
                            </div>
                            <div class="col-md-5" id="saomiaochezhu" style="margin:0 0 0 2px; padding: 0;">
                                <li>
                                    <a href="#"><img style="width: 100px;height: 100px" src="/fjw_thinkphp/Uploads/img/car1.bmp">
                                    </a>
                                    <h6>扫描下载车主APP</h6></li>
                            </div>

                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <h4 class="title">合作伙伴</h4>

                        <div class="content tag-cloud frend-links" style="font-size: 12px;">

                            <a href="#">中国货运联盟</a>
                            <a href="#">中国物流供应链联合会</a>
                            <a href="#">中国O2O企业联合会</a>
                            <a href="#">物流沙龙</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="footer2">
        浙江乾泰物流股份有限公司
        <br> 增值电信业务经营许可证：浙B2-20150228 | Copyright 2013 qt56.cn.Inc. ALL rights reserved
        <br> 技术支持：杭州庞贝信息技术有限公司
    </div>
</div>
<style>
    #footer2 {
        background-color: black;
        color: gray;
        font-size: 12px;
        margin: auto auto;
        text-align: center;
        height: 80px;
    }

    td {
        font-size: 12px;
    }
</style>

</body>
</html>
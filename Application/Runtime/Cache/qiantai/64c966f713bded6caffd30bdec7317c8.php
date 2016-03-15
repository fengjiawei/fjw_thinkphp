<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title></title>
    <script src="/Public/js/mui.js"></script>
    <link href="/Public/css/mui.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/Public/css/app.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css"/>
    <script type="text/javascript" charset="utf-8">
        mui.init();
    </script>
    <style type="text/css">
        body {
            font-family: "微软雅黑";
        }

        h5 {
            padding-top: 8px;
            padding-bottom: 8px;
            text-indent: 12px;
        }

        .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body {
            font-size: 15px;
            margin-top: 8px;
            color: #333;
        }
    </style>
</head>

<body>
<!--<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="server-driver1.html"></a>

    <h1 class="mui-title" style="font-family: '微软雅黑';">积分商城</h1>
</header>-->
<div class="mui-content">

    <div id="segmentedControl" class="mui-segmented-control">
        <a class="mui-control-item mui-active" href="#item0mobile">
            兑换商品
        </a>
        <a class="mui-control-item" href="#item1mobile">
            积分明细
        </a>
        <a class="mui-control-item" href="#item2mobile">
            兑换记录
        </a>

    </div>
    <div class="mui-content-padded">

        <div id="item0mobile" class="mui-control-content mui-active">
            <h4 style="background-color:#efeff4">可用积分：100</h4>
            <ul class="mui-table-view mui-grid-view">
                <li class="mui-table-view-cell mui-media mui-col-xs-6">
                    <a href="shangpin1.html">
                        <img class="mui-media-object" src="/Uploads/img/jifen/tu1.jpg">

                        <div class="mui-media-body">600积分兑换</div>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-media mui-col-xs-6">
                    <a href="shangpin2.html">
                        <img class="mui-media-object" src="/Uploads/img/jifen/tu2.jpg">

                        <div class="mui-media-body">400积分兑换</div>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-media mui-col-xs-6">
                    <a href="shangpin3.html"><img class="mui-media-object" src="/Uploads/img/jifen/tu3.jpg">

                        <div class="mui-media-body">1000积分兑换</div>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-media mui-col-xs-6">
                    <a href="shangpin4.html">
                        <img class="mui-media-object" src="/Uploads/img/jifen/tu4.jpg">

                        <div class="mui-media-body">1500积分兑换</div>
                    </a>
                </li>
            </ul>
        </div>

        <div id="item1mobile" class="mui-control-content">
            <h4 style="background-color:#efeff4">可用积分：100</h4>
            <ul class="mui-table-view">

                <li class="mui-table-view-cell mui-media">
                    <div class="mui-media-body">
                        <ul class="mui-table-view">
                            <li class="mui-table-view-cell mui-hidden">cared
                                <div class="mui-switch mui-active">
                                    <div class="mui-switch-handle"></div>
                                </div>
                            </li>
                            <li class="mui-table-view-cell mui-media">
                                <a href="server-oldcar2.html">

                                    <div class="mui-media-body">
                                        <label style="font-family: '微软雅黑';">抢单奖励</label>&emsp;
                                        <h6 style="color: red; float: right;padding-right: 4%;">+10分</h6>
                                        <br/>

                                        <p class='mui-ellipsis'>2015-10-10</p>
                                    </div>
                                </a>
                            </li>
                            <li class="mui-table-view-cell mui-media">
                                <a href="#">

                                    <div class="mui-media-body">
                                        <label style="font-family: '微软雅黑';">登陆奖励</label>&emsp;
                                        <h6 style="color: red; float: right;padding-right: 4%;">+10分</h6>

                                        <p class='mui-ellipsis'>2015-10-10</p>
                                    </div>
                                </a>
                            </li>
                            <li class="mui-table-view-cell mui-media">
                                <a href="#">

                                    <div class="mui-media-body">
                                        <label style="font-family: '微软雅黑';">成功注册</label>&emsp;
                                        <h6 style="color: red; float: right;padding-right: 4%;">+20分</h6>

                                        <p class='mui-ellipsis'>2015-10-10</p>
                                    </div>
                                </a>
                            </li>
                            <li class="mui-table-view-cell mui-media">
                                <a href="#">

                                    <div class="mui-media-body">
                                        <label style="font-family: '微软雅黑';">登陆奖励</label>&emsp;
                                        <h6 style="color: red; float: right;padding-right: 4%;">+10分</h6>

                                        <p class='mui-ellipsis'>2015-10-10</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>

        <div id="item2mobile" class="mui-control-content">
            <h4 style="background-color:#efeff4">可用积分：100</h4>
            <ul class="mui-table-view">

                <li class="mui-table-view-cell mui-media">
                    <div class="mui-media-body">
                        <ul class="mui-table-view">
                            <li class="mui-table-view-cell mui-hidden">cared
                                <div id="M_Toggle" class="mui-switch mui-active">
                                    <div class="mui-switch-handle"></div>
                                </div>
                            </li>
                            <li class="mui-table-view-cell mui-media">
                                <a href="server-oldcar2.html">

                                    <div class="mui-media-body">
                                        <label style="font-family: '微软雅黑';">兑换礼品</label>&emsp;
                                        <h6 style="color: red; float: right;padding-right: 4%;">-500分</h6>
                                        <br/>

                                        <p class='mui-ellipsis'>2015-10-10</p>
                                    </div>
                                </a>
                            </li>
                            <li class="mui-table-view-cell mui-media">
                                <a href="#">

                                    <div class="mui-media-body">
                                        <label style="font-family: '微软雅黑';">兑换礼品</label>&emsp;
                                        <h6 style="color: red; float: right;padding-right: 4%;">-300分</h6>

                                        <p class='mui-ellipsis'>2015-10-15</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>
    </div>
</div>
</body>

</html>
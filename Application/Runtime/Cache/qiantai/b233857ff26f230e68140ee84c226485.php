<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <meta charset="utf-8">
    <title>Hello MUI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!--标准mui.css-->
    <link rel="stylesheet" href="/Public/css/app.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/css/mui.min.css"/>
    <!--App自定义的css-->
    <style type="text/css">
        .mui-preview-image.mui-fullscreen {
            position: fixed;
            z-index: 20;
            background-color: #000;
        }

        .mui-preview-header,
        .mui-preview-footer {
            position: absolute;
            width: 100%;
            left: 0;
            z-index: 10;
        }

        .mui-preview-header {
            height: 44px;
            top: 0;
        }

        .mui-preview-footer {
            height: 50px;
            bottom: 0px;
        }

        .mui-preview-header .mui-preview-indicator {
            display: block;
            line-height: 25px;
            color: #fff;
            text-align: center;
            margin: 15px auto 4;
            width: 70px;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 12px;
            font-size: 16px;
        }

        .mui-preview-image {
            display: none;
            -webkit-animation-duration: 0.5s;
            animation-duration: 0.5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .mui-preview-image.mui-preview-in {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .mui-preview-image.mui-preview-out {
            background: none;
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }

        .mui-preview-image.mui-preview-out .mui-preview-header,
        .mui-preview-image.mui-preview-out .mui-preview-footer {
            display: none;
        }

        .mui-zoom-scroller {
            position: absolute;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            -webkit-backface-visibility: hidden;
        }

        .mui-zoom {
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }

        .mui-slider .mui-slider-group .mui-slider-item img {
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }

        .mui-android-4-1 .mui-slider .mui-slider-group .mui-slider-item img {
            width: 100%;
        }

        .mui-android-4-1 .mui-slider.mui-preview-image .mui-slider-group .mui-slider-item {
            display: inline-table;
        }

        .mui-android-4-1 .mui-slider.mui-preview-image .mui-zoom-scroller img {
            display: table-cell;
            vertical-align: middle;
        }

        .mui-preview-loading {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: none;
        }

        .mui-preview-loading.mui-active {
            display: block;
        }

        .mui-preview-loading .mui-spinner-white {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -25px;
            margin-top: -25px;
            height: 50px;
            width: 50px;
        }

        .mui-preview-image img.mui-transitioning {
            -webkit-transition: -webkit-transform 0.5s ease, opacity 0.5s ease;
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        @-webkit-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        p img {
            max-width: 100%;
            height: auto;
        }
    </style>

</head>

<body>
<!--<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="index.html"></a>
    <h1 class="mui-title">商品详情</h1>
</header>-->
<div class="mui-content">
    <div class="mui-content-padded">
        <!--<p>这是图片放大预览示例，点击如下图片体验全屏预览功能</p>-->
        <p style="text-align: center;">
            <img src="/Uploads/img/jifen/tu3.jpg" data-preview-src="" data-preview-group="1">
        </p>
        <table class="table table-bordered" style="font-size: 15px;">
            <tr>
                <td colspan="1">商品名称：</td>
                <td colspan="3">lock & lock水杯</td>
            </tr>
            <tr>
                <td colspan="1">所需积分：</td>
                <td colspan="3">1000分</td>
            </tr>
            <tr>
                <td colspan="1">剩余库存：</td>
                <td colspan="3">100</td>
            </tr>

            <td rowspan="5" colspan="4">注意事项：请在兑换商品前仔细阅读本注意事项！请在兑换商品前仔细阅读本注意事项！请在兑换商品前仔细阅读本注意事项！</td>

        </table>
        <button id="toastBtn" type="button" class="mui-btn mui-btn-primary mui-btn-block" style="font-weight: bold;">兑
            换
        </button>
    </div>
</div>
</body>
<script src="/Public/js/mui.js"></script>
<script type="text/javascript" charset="utf-8">
    //mui初始化
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
//    var info = document.getElementById("info");
//    document.getElementById("alertBtn").addEventListener('tap', function () {
//        mui.alert('欢迎使用Hello MUI', 'Hello MUI', function () {
//            info.innerText = '你刚关闭了警告框';
//        });
//    });
//    document.getElementById("confirmBtn").addEventListener('tap', function () {
//        var btnArray = ['是', '否'];
//        mui.confirm('MUI是个好框架，确认？', 'Hello MUI', btnArray, function (e) {
//            if (e.index == 0) {
//                info.innerText = '你刚确认MUI是个好框架';
//            } else {
//                info.innerText = 'MUI没有得到你的认可，继续加油'
//            }
//        })
//    });
//    document.getElementById("promptBtn").addEventListener('tap', function (e) {
//        e.detail.gesture.preventDefault(); //修复iOS 8.x平台存在的bug，使用plus.nativeUI.prompt会造成输入法闪一下又没了
//        var btnArray = ['确定', '取消'];
//        mui.prompt('请输入你对MUI的评语：', '性能好', 'Hello MUI', btnArray, function (e) {
//            if (e.index == 0) {
//                info.innerText = '谢谢你的评语：' + e.value;
//            } else {
//                info.innerText = '你点了取消按钮';
//            }
//        })
//    });
    document.getElementById("toastBtn").addEventListener('tap', function () {
        mui.toast('兑换成功！');
    });
</script>
<script>
    mui.previewImage();
</script>

</html>
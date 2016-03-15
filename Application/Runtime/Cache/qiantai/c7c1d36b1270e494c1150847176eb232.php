<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Hello MUI</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!--&lt;!&ndash;标准mui.css&ndash;&gt;-->
		<!--<link rel="stylesheet" href="css/app.css">-->
		<!--&lt;!&ndash;App自定义的css&ndash;&gt;-->
		<!--<link rel="stylesheet" type="text/css" href="css/mui.min.css">-->
		<script type="text/javascript" src="/Public/js/mui.js"></script>
		<link rel="stylesheet" type="text/css" href="/Public/css/mui.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/app.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css" />
	</head>
         
	<body>

		<header class="mui-bar mui-bar-nav">
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		    <h1 class="mui-title">平台服务</h1>
		</header>
		<div class="mui-content">
		        <ul class="mui-table-view mui-grid-view mui-grid-9">
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="server-driver1.html">
		                    <span class="mui-icon mui-icon-home"></span>
		                    <div class="mui-media-body">司机招聘</div></a></li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="server-oldcar1.html">
		                    <span class="mui-icon mui-icon-info"></span>
		                    <div class="mui-media-body">二手车</div></a></li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="server-servcestation.html">
		                    <span class="mui-icon mui-icon-phone"></span>
		                    <div class="mui-media-body">服务站</div></a></li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="server-weixiuzhan1.html">
		                    <span class="mui-icon mui-icon-location"></span>
		                    <div class="mui-media-body">维修站</div></a></li>
		         
		           <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
		                    <span class="mui-icon mui-icon-more"></span>
		                    <div class="mui-media-body">more</div></a></li>
		        </ul> 
		</div>
	</body>
	<!--<script src="../js/mui.min.js"></script>-->
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});
	</script>
</html>
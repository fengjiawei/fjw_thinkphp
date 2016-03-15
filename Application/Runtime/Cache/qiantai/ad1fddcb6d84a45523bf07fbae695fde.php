<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>筛选条件</title>
    <script src="js/mui.min.js"></script>
	<script type="text/javascript" src="/Public/js/mui.js"></script>
	<link rel="stylesheet" type="text/css" href="/Public/css/mui.min.css" />
	<link rel="stylesheet" type="text/css" href="/Public/css/app.css" />
	<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css" />
    <link href="css/mui.min.css" rel="stylesheet"/>
    <style type="text/css">
    	body{
    		font-family: "微软雅黑";
    	}
    	
			.mui-btn {
				display: block;
				width: 120px;
				margin: 10px auto;
			}
			#info {
				padding: 20px 10px;
			}
		
    </style>
</head>
<body>
		<header class="mui-bar mui-bar-nav">
<a class="mui-icon mui-icon-left-nav mui-pull-left" href="server-driver1.html"></a>
 
  <h1 class="mui-title" style="font-family: '微软雅黑';">简历信息</h1>
</header>
<div class="mui-content">
	
<ul class="mui-table-view">
	  <li class="mui-table-view-cell">
	    <a class="mui-navigate-right">
	      <label>姓 名：</label>
	      &emsp;<h5 style="float: right;padding-right: 8%;">李亮</h5> 
	    </a>
	  </li>
	  <li class="mui-table-view-cell">
	    <a class="mui-navigate-right">
	   <label>手 机：</label>
	      &emsp;<h5
	      	 style="float: right;padding-right: 8%;">18505708868</h5> 
	    </a>
	  </li>
	  <li class="mui-table-view-cell">
	    <a class="mui-navigate-right">
	     <label>驾 照：</label>
	      &emsp;<h5 style="float: right;padding-right: 8%;">A1</h5> 
	    </a>
	  </li>
	  	  <li class="mui-table-view-cell">
	    <a class="mui-navigate-right">
	    <label>驾 龄</label>
	      &emsp;<h5 style="float: right;padding-right: 8%;">10年</h5> 
	    </a>
	  </li>
	</ul>
	<br>
			

	

			<div class="mui-content-padded" style="margin: 5px;text-align: center;">
				<!--<button id='alertBtn' type="button" class="mui-btn mui-btn-blue mui-btn-outlined">警告消息框</button>
				<button id='confirmBtn' type="button" class="mui-btn mui-btn-blue mui-btn-outlined">确认消息框</button>
				<button id='promptBtn' type="button" class="mui-btn mui-btn-blue mui-btn-outlined">输入对话框</button>-->
				<button id='toastBtn' type="button" class="mui-btn mui-btn-blue mui-btn-primary">提交简历</button>
				<div id="info">

				</div>
			</div>
		</div>
		<script src="../js/mui.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			 //mui初始化
			mui.init({
				swipeBack: true //启用右滑关闭功能
			});
			var info = document.getElementById("info");
//			document.getElementById("alertBtn").addEventListener('tap', function() {
//				mui.alert('欢迎使用Hello MUI', 'Hello MUI', function() {
//					info.innerText = '你刚关闭了警告框';
//				});
//			});
//			document.getElementById("confirmBtn").addEventListener('tap', function() {
//				var btnArray = ['是', '否'];
//				mui.confirm('MUI是个好框架，确认？', 'Hello MUI', btnArray, function(e) {
//					if (e.index == 0) {
//						info.innerText = '你刚确认MUI是个好框架';
//					} else {
//						info.innerText = 'MUI没有得到你的认可，继续加油'
//					}
//				})
//			});
//			document.getElementById("promptBtn").addEventListener('tap', function(e) {
//				e.detail.gesture.preventDefault(); //修复iOS 8.x平台存在的bug，使用plus.nativeUI.prompt会造成输入法闪一下又没了
//				var btnArray = ['确定', '取消'];
//				mui.prompt('请输入你对MUI的评语：', '性能好', 'Hello MUI', btnArray, function(e) {
//					if (e.index == 0) {
//						info.innerText = '谢谢你的评语：' + e.value;
//					} else {
//						info.innerText = '你点了取消按钮';
//					}
//				})
//			});
			document.getElementById("toastBtn").addEventListener('tap', function() {
				mui.toast('简历发送成功');
			});
		</script>
	</body>

</html>
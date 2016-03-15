<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
</head>
<body>
<button onclick="sub()"> 测试</button>
<script>
    function sub(){
        $.post('<?php echo U("testpost");?>',{goodsId:122,seesion:"98"}, function (data) {
            alert(data)
        },'json')
    }
</script>
</body>
</html>
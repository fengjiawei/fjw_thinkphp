<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="Index/user" method="post">
    <div>
        <label>姓名：</label>
        <input type="text" name='name'>
    </div>
    <div>
        <label>年龄：</label>
        <input type="text" name='age'>
    </div>
    <input type="submit" value="提交">
</form>
</body>
</html>
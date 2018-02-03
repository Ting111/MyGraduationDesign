<!DOCTYPE html>
<?php include 'getip.php'; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>防止恶意注册</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/diy/main.css">
</head>
<body>
<?php
include 'nav.php';
?>
<br>
<div class="container">
    <h1 class="display-3">Picture Verification Code</h1>
    <p class="lead">图片验证码是一个网站必备的功能，<a href="https://github.com/Ting111/MyGraduationDesign/blob/master/verifyImg.php">源码地址</a></p>
    <hr class="my-4">
    <p class="text-info">使用前提：</p>
    <p>GD库为启用状态，<a href="http://php.net/manual/zh/ref.image.php">GD和图像处理函数</a></p>
    <p class="text-info">制作步骤：</p>
    <p>创建画布-->填充底色-->添加字符串-->把字符串存入SESSION-->增加干扰线和噪点-->输出到浏览器-->销毁图片</p>
    <p class="text-info">登录和注册界面验证码：</p>
    <p>用户浏览器接收图片验证码，用户在输入框输入验证码，提交之后，后台服务器将输入的验证码与储存在SESSION中的验证码进行比较，返回相应的提示。</p>
</div>
</body>
</html>
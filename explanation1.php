<!DOCTYPE html>
<?php include 'getip.php'; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>短信注册</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/diy/main.css">
</head>
<body>
<?php
include 'nav.php';
?>
<br>
<div class="container">
    <h1 class="display-3">SMS</h1>
    <p class="lead">短信API：<a href="https://www.juhe.cn/docs/api/id/54">聚合数据</a></p>
    <hr class="my-4">
    <P class="text-info">获取短信验证码流程：</P>
    <p>在注册界面点击“获取验证码”按钮后，执行javascript脚本中的<a href="https://github.com/Ting111/MyGraduationDesign/blob/master/register.php">sendMessage()</a>函数，计时器启动，接下来300秒按钮变为不可用状态，设置保存验证码的code变量，利用Jquery的<a href="http://www.w3school.com.cn/jquery/ajax_ajax.asp">ajax()</a>方法将code的值存在json中并传递给SMS接口文件<a href="https://github.com/Ting111/MyGraduationDesign/blob/master/verifyCode.php">verifyCode.php</a>，使用聚合数据短信接口向注册界面输入的手机号码发送短信。</p>
    <hr>
    <p><span class="text-warning">bug</span>：点击“获取验证码”按钮后，不能刷新页面，原因是验证码存在javascript中，一刷新验证码就被设为初始值，按钮状态也变为可用状态，此时手机收到的验证码也会失效。</p>
</div>
</body>
</html>s
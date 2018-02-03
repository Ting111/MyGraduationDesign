<!DOCTYPE html>
<?php include 'getip.php'; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>登录异常反馈</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/diy/main.css">
</head>
<body>
<?php
include 'nav.php';
?>
<br>
<div class="container">
    <h1 class="display-3">Offsite Login</h1>
    <p class="lead">每次登录时检测IP是一项有效的保护措施，将登录异常报告给用户</p>
    <hr class="my-4">
    <p class="text-info">客户端访问本网站时：</p>
    <p>通过<a href="https://github.com/Ting111/MyGraduationDesign/blob/master/getip.php">getip.php</a>获取当前ip地址并存入SESSION。</p>
    <p class="text-info">新用户注册时：</p>
    <p>通过<a href="https://github.com/Ting111/MyGraduationDesign/blob/master/register.php">register.php</a>处理表单，通过淘宝的接口解析IP获取客户端的所在城市，成功注册时将城市信息存入数据库。</p>
    <p class="text-info">尝试登录时：</p>
    <p>通过<a href="https://github.com/Ting111/MyGraduationDesign/blob/master/login.php">login.php</a>处理表单，成功登录会跳转到主页，在跳转主页之前添加一个if判断语句，如果当前SESSION中的ip解析出来的城市信息与数据库中的城市信息不同的话，就调用<a href="https://github.com/Ting111/MyGraduationDesign/blob/master/offsiteLogin.php">offsiteLogin.php</a>向账号主人发送内容为登录异常的短信。</p>
</div>
</body>
</html>
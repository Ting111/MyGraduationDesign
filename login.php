<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<?php
include 'nav.html';
?>
<br><br>
<div class="container">
    <div class="col-md-4">
        <form method="post">
            <fieldset>
                <legend>登录</legend>
                <hr>
                <div class="form-group">
                    <label for="phoneNum">手机号码</label>
                    <input type="text" class="form-control" id="phoneNum" name="phoneNum" placeholder="请输入手机号码">
                </div>
                <div class="form-group">
                    <label for="password1">密码</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
                </div> 
                <button type="submit" class="btn btn-primary">登录</button><br><br>
                <a href="register.php">没有账号？点击注册</a>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
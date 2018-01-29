<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<?php
include 'nav.html';
?>
<br><br>
<div class="container">
    <div class="col-md-4">
        <form method="post" name="registerForm" onsubmit="checkForm()">
            <fieldset>
                <legend>注册</legend>
                <hr>
                <div class="form-group">
                    <label for="username">用户名</label>
                    <input type="password" class="form-control" id="username" name="username" placeholder="请输入用户名">
                </div>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="6-16位密码，区分大小写，不能用空格">
                </div>
                <div class="form-group">
                    <label for="password1">确认密码</label>
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="请确认密码">
                </div>
                <div class="form-group">
                    <label for="phoneNum">手机号码</label>
                    <input type="text" class="form-control" id="phoneNum" name="phoneNum" placeholder="请输入手机号码">
                </div>
                <div class="form-group">
                    <label for="verifyCode">短信验证码</label>
                    <input type="text" class="form-control" id="verifyCode" name="verifyCode" placeholder="请输入短信验证码"><br>
                </div>
                <button type="button" class="btn btn-primary" id="btn1">获取验证码</button>
                <button type="submit" class="btn btn-primary">注册</button>
            </fieldset>
        </form>
    </div>
</div>
<?php
session_start();

?>
</body>
<script type="text/javascript">
    var btn1 = document.getElementById("btn1");
    btn1.onclick = function() {
        //短信发送程序
        //code there...
        btn1.disabled = true;
        var time = 60;
        var timer = setInterval(fun1, 1000);
        function fun1() {
            time--;
            if(time>=0) {
                btn1.innerHTML = time + "s后重新发送";
            }else{
                btn1.innerHTML = "重新发送验证码";
                btn1.disabled = false;
                clearTimeout(timer);
                time = 60;
            }
        }
    }
</script>
</html>
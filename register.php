<!DOCTYPE html>
<?php include 'getip.php'; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script src="http://lib.sinaapp.com/js/jquery/2.0.2/jquery-2.0.2.min.js"></script>
    <script>
        var InterValObj;
        var json;
        var count = 300;
        var curCount;
        var code = "";
        var codeLength = 6;
        function sendMessage() {
            curCount = count;
            var regu =/^[1][3|4|5|7|8][0-9]{9}$/gi;
            var re = new RegExp(regu);
            var phone=$("#phonenum").val();
            if (phone!="" && re.test(phone)) {
                for (var i = 0; i < codeLength; i++) {
                    code += parseInt(Math.random() * 9).toString();
                }
                $("#btnSendCode").attr("disabled", "true");
                $("#btnSendCode").text("请在" + curCount + "秒内输入验证码");
                InterValObj = window.setInterval(SetRemainTime, 1000);
                json = {
                    "phone": phone,
                    "code":code
                };
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: 'verifyCode.php',
                    data: json,
                    error: function (XMLHttpRequest, textStatus, errorThrown) { },
                    success: function (msg) { }
                });
            } else {
                alert("手机号码不正确");
            }
            function SetRemainTime() {
                if (curCount == 0) {
                    window.clearInterval(InterValObj);
                    $("#btnSendCode").removeAttr("disabled");
                    $("#btnSendCode").text("重新发送验证码");
                    code = "";
                } else {
                    curCount--;
                    $("#btnSendCode").text("请在" + curCount + "秒内输入验证码");
                }
            }
        }
        function checkForm() {
            if (registerForm.username.value == "") {
                alert("请输入用户名");
                registerForm.username.focus();
                return false;
            }
            if (registerForm.password.value == "") {
                alert("请输入密码");
                registerForm.password.focus();
                return false;
            }
            if (registerForm.password.value != registerForm.password1.value) {
                alert("两次输入的密码不一致");
                registerForm.password.focus();
                return false;
            }
            if (registerForm.phonenum.value == "") {
                alert("请输入手机号码");
                registerForm.phonenum.focus();
                return false;
            }
            if (registerForm.verifyCode.value == "") {
                alert("请输入短信验证码");
                registerForm.verifyCode.focus();
                return false;
            }
            if (registerForm.verifyCode.value != code) {
                alert("验证码错误");
                registerForm.verifyCode.focus();
                return false;
            }
        }
    </script>
</head>
<body>
<?php
include 'nav.php';
if (isset($_SESSION["username"])) {
    echo "<script>alert('您已登录，无法注册');history.go(-1)</script>";
}
?>
<br><br>
<div class="container">
    <div class="col-md-4">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="registerForm" onsubmit="return checkForm()">
            <fieldset>
                <legend>注册</legend>
                <hr>
                <div class="form-group">
                    <label for="username">用户名</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
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
                    <label for="phonenum">手机号码</label>
                    <input type="text" class="form-control" id="phonenum" name="phonenum" placeholder="请输入手机号码">
                </div>
                <div class="form-group">
                    <label for="verifyImg">图片验证码</label>
                    <img src="verifyImg.php" title="看不清?换一张" onclick="this.src = this.src + '?' + new Date().getTime();" align="right">
                    <input type="text" class="form-control" id="verifyImg" name="verifyImg" placeholder="请输入图中验证码">
                </div>
                <div class="form-group">
                    <label for="verifyCode">短信验证码</label>
                    <input type="text" class="form-control" id="verifyCode" name="verifyCode" placeholder="请输入短信验证码"><br>
                </div>
                <button type="button" class="btn btn-primary" id="btnSendCode" onclick="sendMessage()">获取验证码</button>
                <button type="submit" class="btn btn-primary">注册</button>
                <span><input type = "hidden" name = "hidden" value = "hidden" /></span>
            </fieldset>
        </form>
    </div>
</div>
<?php
if (isset($_POST["hidden"]) && $_POST["hidden"] == "hidden") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $password1= md5($_POST["password1"]);
    $phonenum = $_POST["phonenum"];
    $verifyCode = $_POST["verifyCode"];
    $verifyImg = $_POST["verifyImg"];
    $user_ip = $_SESSION["ip"];
    $user_res = file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=$user_ip");
    $user_res = json_decode($user_res, true);
    $user_data = $user_res["data"];
    $user_city = $curent_data["city"];
    echo "ip:".$user_ip;
    echo "<br>";
    echo "city".$user_city;
    if ($password == $password1 && $password != "" && $username != ""  && $phonenum != "" && $verifyCode != "") {
        if ($verifyImg == $_SESSION["verifyImg"]) {
            $link = mysql_connect("localhost", "root", "123456789");
            if (mysql_errno($link)) {
                echo mysql_error();
                exit();
            }
            mysql_select_db('mgd');
            mysql_set_charset('utf-8');
            $sql = "select username from users where username='".$username."'";
            $result = mysql_query($sql);
            $num = mysql_num_rows($result);
            if ($num > 0) {
                echo "<script>alert('用户名已存在');history.go(-1);</script>";
            } else {
                $sql_phone = "select phonenum from users where phonenum='".$phonenum."'";
                $res_phone = mysql_query($sql_phone);
                $num_phone = mysql_num_rows($res_phone);
                if ($num_phone > 0) {
                    echo "<script>alert('该手机号码已注册');history.go(-1);</script>";
                } else{
                    $sql_insert = "insert into users (username, password, phonenum, ip, city) 
                        values ('".$username."', '".$password."', '".$phonenum."', '".$user_ip."', '".$user_city."')";
                    $res_insert = mysql_query($sql_insert);
                    if ($res_insert) {
                        echo "<script>alert('注册成功');location.href='login.php';</script>";
                    } else {
                        echo "<script>alert('系统繁忙，请稍候');history.go(-1);</script>";
                    }
                }     
            }
        } else {
                echo "<script>alert('验证码错误');history.go(-1);</script>";
        }
    }
}
?>
<br><br><br><br>
</body>
</html>

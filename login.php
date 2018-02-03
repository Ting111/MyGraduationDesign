<!DOCTYPE html>
<?php include 'getip.php'; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<?php
include 'nav.php';
if (isset($_SESSION["username"])) {
    echo "<script>alert('您已登录，无法重复登录');history.go(-1)</script>";
}
?>
<br><br>
<div class="container">
    <div class="col-md-4">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <fieldset>
                <legend>登录</legend>
                <hr>
                <div class="form-group">
                    <label for="phonenum">手机号码</label>
                    <input type="text" class="form-control" id="phonenum" name="phonenum" placeholder="请输入手机号码">
                </div>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
                </div>
                <button type="submit" class="btn btn-primary">登录</button><br><br>
                <a href="register.php">没有账号？点击注册</a>
                <span><input type = "hidden" name = "hidden" value = "hidden" /></span>
            </fieldset>
        </form>
    </div>
</div>
<?php
if (isset($_POST["hidden"]) && $_POST["hidden"] == "hidden") {
    $phonenum = $_POST["phonenum"];
    $password = md5($_POST["password"]);
    $verifyImg = $_POST["verifyImg"];
    if ($phonenum != "" && $password != "") {
        $link = mysql_connect("localhost", "root", "123456789");
        if (mysql_errno($link)) {
            echo mysql_error();
            exit();
        }
        mysql_select_db('mgd');
        mysql_set_charset('utf-8');
        $sql = "select username, city from users where phonenum='".$phonenum."' and password='".$password."'";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
        if ($num) {
            $row = mysql_fetch_array($result);
            $username = $row["username"];
            $db_city = $row["city"];
            $current_ip = $_SESSION["ip"];
            $current_res = file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=$current_ip");
            $current_res = json_decode($current_res, true);
            $current_data = $current_res["data"];
            $current_city = $current_data["city"];
            if ($current_city != $db_city && $current_city != "") {
                $_SESSION["phonenum"] = $phonenum;
                include 'offsiteLogin.php';
            }
            $_SESSION['username'] = $username;
            echo "<script>location.href='index.php';</script>";
        } else {
            echo "<script>alert('用户名或密码不正确');history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('请输入用户名和密码');history.go(-1);</script>";
    }
}
?>
</body>
</html>
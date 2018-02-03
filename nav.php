<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">DingWeb</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">首页 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="explanation1.php">短信注册</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="explanation2.php">防止恶意注册</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="explanation3.php">登录异常反馈</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="others.php">其他功能</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"comment.php\">留言</a></li>";
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?action=logout\">退出</a></li>";
                } else {
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"login.php\">登录</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

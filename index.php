<!DOCTYPE html>
<?php include 'getip.php'; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>丁威的毕设</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/diy/main.css">
</head>
<body>
<?php
include 'nav.php';
?>
<br>
<div class="container">
    <h1 class="display-3">Hello, world!</h1>
    <p class="lead">这个网站是我的毕业设计。<a href="https://github.com/Ting111/MyGraduationDesign">开源地址<a></p>
    <hr class="my-4">
    <blockquote class="blockquote">
        <p>人生苦短，我们却费尽思量，无所不用其极地丑化生命，让生命更为复杂。仅有的好时光，仅有的温暖夏日与夏夜，我们当尽情享受。玫瑰花及紫藤已开开落落了两回；白日渐短，每个树林、每片叶子都带着惆怅，轻叹着美景易逝。晚风徐徐，拂过窗前树梢，月光洒落在屋内的红色石板上。故乡友人别来无恙？你们手中握着的是玫瑰或是枪弹？你们是否依然安好？你们写给我的，是友善的信，抑或是谩骂我的文章？亲爱的朋友们，一切悉听尊便，但无论如何，请切记：人生苦短。</p>
        <footer class="blockquote-footer text-right">赫尔曼·黑塞<cite title="Source Title">《提契诺之歌》</cite></footer>
    </blockquote>
    <blockquote class="blockquote">
        <p>我无权去评判他人的生活，我只能为自己作出判断。意义与实在并非隐藏于事物的背后，而是寓于事物自身，寓于事物的一切现象。当一个人能够如此单纯，如此觉醒，如此专注于当下，毫无疑虑的走过这个世界，生命真是一件赏心乐事。人只应服从自己内心的声音，不屈从于任何外力的驱使，并等待觉醒那一刻的到来；这才是善的和必要的行为，其他的一切均毫无意义。</p>
        <footer class="blockquote-footer text-right">赫尔曼·黑塞<cite title="Source Title">《悉达多》</cite></footer>
    </blockquote>
    <blockquote class="blockquote">
        <p>你的要求太高了，你的渴望太多了，这个世界把你吐了出来，因为你与众不同。在当今世界上，谁要活着并且一辈子十分快活，不要低级娱乐而要真正的欢乐，不要钱而要灵魂，不要忙碌钻营而要真正的工作，不要逢场作戏而要真正的激情，那么，这个漂亮的世界可不是这种人的家乡。</p>
        <footer class="blockquote-footer text-right">赫尔曼·黑塞<cite title="Source Title">《荒原狼》</cite></footer>
    </blockquote>
    <blockquote class="blockquote">
        <p>鸟要挣脱出壳。蛋就是世界。人要诞于世上，就得摧毁这个世界。</p>
        <footer class="blockquote-footer text-right">赫尔曼·黑塞<cite title="Source Title">《德米安》</cite></footer>
    </blockquote>
    <blockquote class="blockquote">
        <p>人生十分孤独。没有一个人能读懂另一个人，每一个人都很孤独。</p>
        <footer class="blockquote-footer text-right">赫尔曼·黑塞<cite title="Source Title">《雾中》</cite></footer>
    </blockquote>
</div>
<?php
if ($_GET["action"] == "logout") {
    unset($_SESSION["username"]);
    echo "<script>location.replace('index.php');</script>";
}
?>
</body>
</html>
<?php
session_start();
$image = imagecreatetruecolor(100, 30);
$bgcolor = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bgcolor);
$verifyImg = "";
for ($i=0; $i < 4; $i++) { 
    $font = 6;
    $color = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));
    $dict = "1234567890qwertyuiopasdfghjklzxcvbnm";
    $string = substr($dict, rand(0, strlen($dict)), 1);
    $verifyImg .= $string;
    $x = ($i*100/4) + rand(5, 10);
    $y = rand(5, 10);
    imagestring($image, $font, $x, $y, $string, $color);
}
$_SESSION["verifyImg"] = $verifyImg;
for ($i=0; $i < 200; $i++) { 
    $color = imagecolorallocate($image, rand(50, 200), rand(50, 200), rand(50, 200));
    imagesetpixel($image, rand(1, 99), rand(1, 29), $color);
}
for ($i=0; $i < 8; $i++) { 
    $color = imagecolorallocate($image, rand(60, 220), rand(60, 220), rand(60, 220));
    imageline($image, rand(1, 99), rand(1, 29), rand(1, 99), rand(1, 29), $color);
}
header('content-type: image/png');
imagepng($image);
imagedestroy($image);
?>
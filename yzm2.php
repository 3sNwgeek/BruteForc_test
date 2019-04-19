<?php
/**
 * 字母+数字的验证码生成
 */
// 开启session
session_start();
//1.创建黑色画布
$image = imagecreatetruecolor(100, 30);
 
//2.为画布定义(背景)颜色
$bgcolor = imagecolorallocate($image, 255, 255, 255);
 
//3.填充颜色
imagefill($image, 0, 0, $bgcolor);
 
// 4.设置验证码内容
 
//4.1 定义验证码的内容
// $content = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
$content=$_GET["Ccode"];
//4.1 创建一个变量存储产生的验证码数据，便于用户提交核对
$captcha = "";
for ($i = 0; $i < 4; $i++) {
    // 字体大小
    $fontsize = 10;
    // 字体颜色
    $fontcolor = imagecolorallocate($image, mt_rand(10, 20), mt_rand(10, 20), mt_rand(10, 20));
    // 设置字体内容
    $fontcontent = substr($content, mt_rand(2, strlen($content)), 1);
    $captcha .= $fontcontent;
    // 显示的坐标
    $x = ($i * 100 / 4)+5;
    $y = 5;
    // 填充内容到画布中
    imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}
$_SESSION["captcha"] = $captcha;
//4.3 设置背景干扰元素
// for ($$i = 0; $i < 200; $i++) {
//     $pointcolor = imagecolorallocate($image, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
//     imagesetpixel($image, mt_rand(1, 99), mt_rand(1, 29), $pointcolor);
// }
 
//4.4 设置干扰线
// for ($i = 0; $i < 3; $i++) {
//     $linecolor = imagecolorallocate($image, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
//     imageline($image, mt_rand(1, 99), mt_rand(1, 29), mt_rand(1, 99), mt_rand(1, 29), $linecolor);
// }
 
//5.向浏览器输出图片头信息
header('content-type:image/png');
 
//6.输出图片到浏览器
imagepng($image);
 
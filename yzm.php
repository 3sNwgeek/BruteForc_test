<?php
session_start();      
Header("Content-type:image/PNG");  //提示用户生成PNG的图片文件
$im = imagecreate(60,25);   //建一个基于调色板的图像
$back = imagecolorallocate($im, 245, 245, 245); //分配颜色
imagefill($im,0,0,$back);  //图像填充
$vcodes = "";

for($i=0;$i<4;$i++){
    $font=imagecolorallocate($im,0,0,0 );  /*rand()随机函数*/
    $authnum=rand(0,9);
    $vcodes.=$authnum;
    imagestring($im,5,9+$i*10,5,$authnum,$font);
}
$_SESSION['VCODE']=$vcodes;

imagepng($im);   //把图片输出到浏览器文件
imagedestroy($im);   //释放图片资源
?>
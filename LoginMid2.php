<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php
session_start();

$pwd=$_POST["password"];
$name=$_POST["name"];
$yzm=$_POST["yzm"];

if($name=="")
{die("用户名不能为空");}
if($pwd=="")
{die("密码不能为空");}
if($yzm=="")
{die("验证码不能为空");}
if($yzm !=$_SESSION['captcha']){
die("<script>alert('验证码错误！！');location='".$_SERVER['HTTP_REFERER']. "'</script>");}
if($name=="admin"&&$pwd=="12345678")
{echo "登陆成功！！！";setcookie("user","$name",time()+3600);}
else
{echo "登陆失败";
$_SESSION['captcha']=rand(0,9999999);
}
?>
</head></html>
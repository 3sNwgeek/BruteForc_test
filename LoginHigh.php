<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php
session_start();
header("Content-type:text/html");
$pwd=$_POST["password"];
$name=$_POST["name"];
$yzm=$_POST["yzm"];

if($name=="")
{die("用户名不能为空");}
if($pwd=="")
{die("密码不能为空");}
if($yzm=="")
{die("验证码不能为空");}
if($yzm !=$_SESSION['VCODE']){
die("<script>alert('验证码错误！！');location='".$_SERVER['HTTP_REFERER']. "'</script>");}
if($name=="admin"&&$pwd=="1q2w3e4r")
{echo "登陆成功！！！";setcookie("user","$name",time()+3600);}
else
{echo "登陆失败";
$_SESSION['VCODE']=rand(0,9999999);
}

?>
</head></html>
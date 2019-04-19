<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
error_reporting(0);
session_start();
$pwd=$_POST["password"];
$name=$_POST["name"];

if($name=="")
{die("用户名不能为空");}

if($pwd=="")
{die("密码不能为空");}

if($_SESSION['token']=="")
{die("检测出攻击行为");}

if($name=="admin"&&$pwd=="123456a")

{echo "登陆成功！！！";setcookie("user","$name",time()+3600);}
else{echo "登陆失败";}

session_unset();//删除会话
?>

</head></html>

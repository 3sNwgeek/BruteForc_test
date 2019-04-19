<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
session_start();
$pwd=$_POST["password"];
$name=$_POST["name"];

if($name=="")
{die("用户名不能为空");}
if($pwd=="")
{die("密码不能为空");}

if($name=="admin"&&$pwd=="1q2w3e4r")
{echo "登陆成功！！！";setcookie("user","$name",time()+3600);}
else{echo "登陆失败";}?>
</head></html>
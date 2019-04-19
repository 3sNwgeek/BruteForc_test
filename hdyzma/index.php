<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
        <title>暴力破解测试页面</title>
        <link rel="stylesheet" type="text/css" href="css/verify.css">
    </head>
    <body>
        <div align="center"><h1>暴力破解测试页面-难度high</h1></div><br>
<div align="center">hint:使用python至少两种方法以上可以暴力破解</div>
<fieldset>
<legend><b>请输入信息</b></legend>
<form  name="myfrom" id="myform" method="post" action="welcome.php">
账号：<input type="text" name="name" id="name" />
密码： <input type="text" name="password" id="password" />
<input style="display:none" name="token" value ="<?php session_start();$_SESSION['token']=md5(rand(0,9999999));echo $_SESSION['token']; ?>" />
</form>
<div id="mpanel4" style="margin-top:50px;"></div>
        <script type="text/javascript" src="js/jquery.min.js" ></script>
        <script type="text/javascript" src="js/verify.js" ></script>
        <script>  
		    $('#mpanel4').slideVerify({
		    	type : 2,		//类型
        		vOffset : 5,	//误差量，根据需求自行调整
		        vSpace : 5,	//间隔
		        imgName : ['1.jpg', '2.jpg'],
		        imgSize : {
		        	width: '400px',
		        	height: '200px',
		        },
		        blockSize : {
		        	width: '40px',
		        	height: '40px',
		        },
		        barSize : {
		        	width : '400px',
		        	height : '40px',
		        },
		        ready : function() {
		    	},
		        success : function() {
    document.getElementById("myform").submit(); 
//......后续操作
		        },
		        error : function() {
//		        	alert('验证失败！');
		        }
		        
		    });
        </script>
    </body>
 </html>
<!DOCTYPE html><html lang="zh-CN"><head><meta charset="UTF-8">
<title>暴力破解测试页面</title>

    <div align="center"><h1>暴力破解测试页面-难度high</h1></div>
    <form action="Login.php" method="post" onsubmit="return judge();" name="form">




<script src="tripledes.js"></script>
<script src="mode-ecb.js"></script>
<script type="text/javascript">
	function encryptByDES(message, key) {
	    var keyHex = CryptoJS.enc.Utf8.parse(key);
	    var encrypted = CryptoJS.DES.encrypt(message, keyHex, {
	        mode: CryptoJS.mode.ECB,
	        padding: CryptoJS.pad.Pkcs7
	    });
	    return encrypted.toString();
	}

	function form_login(){
		var username=document.getElementById("username").value;
		var password=document.getElementById("password").value;
		var pwd_key= '{"username":"'+username+'","password":"'+password+'"}';
		alert(pwd_key);
		var post_key= encryptByDES(pwd_key,'232cb851727762bbf7dd097da3bcd354');
		alert(post_key);
		post(post_key)
	}
//发送post请求
	function post(post_key)                        //主程序函数
	{
		var parm ='login_key='+encodeURIComponent(post_key);
	    var post_obj = new XMLHttpRequest();                   //创建对象 
		post_obj.open("POST", "test.php", true);  //调用weather.php   
		post_obj.setRequestHeader("cache-control","no-cache");
		post_obj.setRequestHeader("contentType","text/html;charset=uft-8") //指定发送的编码
	    post_obj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");   //设置请求头信息
	    post_obj.send(parm); //设置为发送给服务器数据
	 
	}
</script>	

	    <fieldset>
		<legend><b>请输入信息</b></legend>
		<p>用户名: <input type="text" name="username" id="username" value="admin"></p>
		<p>密&#12288码: <input type="password" name="password" id="password"></p>
		<p><input type="button" value="login" onclick="form_login()"></p>	


<?php
error_reporting(0);
if ($_POST["login_key"]=="iKUJ1KTtfI4NqIHAf7QQha71W4vil4uLWR1YQREFkJLE4sGL5OvnLN9Ni7PAlkpP"){
	echo "暴力破解成功!!!!!!!!!!!!!!!!!!!!!!!!";
}
else {echo "请重新登陆<br>";}
echo $_POST["login_key"];

?>

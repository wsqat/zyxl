<?php
	error_reporting(0);
	if(!$_POST['pass'])									//如果没有输入管理员名称显示HTML内容
	{
?>
<html>
<head>
<title>管理入口</title>
    <meta charset="utf-8">
</head>
<body topmargin="50" >
<script language=javascript>
function juge(form)
{
	if (form.pass.value == "")
	{
		alert("请输入密码!");
		theForm.pass.focus();
		return (false);
	}
}
</script>
<center>
<h1>后台管理入口</h1>
<p>
<a href="index.php">返回首页</a>
<table border="1">
<form action="<?php echo $PATH_INFO; ?>" method=post onsubmit="return juge(this)">
<tr>
<td colspan="2"><center>管理后台</center></td>
</tr>
<tr>
<td>密码</td>
<td><input type=password name=pass></td>
</tr>
<tr>
<td colspan="2"><center><input type=submit value="登录"></center></td>
</tr>
</form>
</table>
</center>
</body>
</html>
<?php
	}
	else												//如果存在密码执行操作
	{
		require "config.php";					//调用配置文件
		if($_POST['pass']!=$super_pass)		//如果密码错误
		{
?>
<html>
<head>
  <meta charset="utf-8">
<h1>后台管理入口</h1>
</head>
<meta http-equiv="refresh" content="2; url=ad.php">
<body>
登录失败，密码错误！<p>
两秒后返回。
</body>
</html>
<?php
	}
	else									//如果密码正确
	{
		setcookie("pass",$_POST['pass']);		//注册Cookie
?>
<html>
<head>
<h1>后台管理入口</h1>
  <meta charset="utf-8">
</head>
<meta http-equiv="refresh" content="2; url=bootstrap_admins/index.php">
<body>
登录成功！<p>
两秒后进入管理页。
</body>
</html>
<?php
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="index.php?action=login">
  <div align="center">
    <table width="310" border="0">
      <tr>
        <td width="115" height="32">用户名：</td>
        <td colspan="2"><label for="textfield2"></label>
        <input type="text" name="user_name" id="textfield2" /></td>
      </tr>
      <tr>
        <td height="29">密码：</td>
        <td colspan="2"><label for="textfield3"></label>
        <input type="password" name="user_pw" id="textfield3" /></td>
      </tr>
      <tr>
        <td height="28">验证码</td>
        <td width="81"><label for="textfield"></label>
        <input type="text" name="checkcode" id="textfield" /></td>
        <td width="100"><img src="../inc/checkcode.php" /></td>
      </tr>
       <tr>
        <td height="28" colspan="3"><input type="submit" name="button" id="button" value="提交" /></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FAQ</title>
	<link rel="stylesheet" type="text/css" href="../css/base.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
   <style type="text/css">
   .botton{height:25px; line-height:25px; width:auto; border:1px solid #dedede; background:#f0f0f0; padding:0px 20px;}
#sel{
  float: right;
}
   #manageRe td table tbody tr td #textarea {
	height: 100px;
	width: 1000px;
	margin-top: 10px;
	margin-bottom: 10px;
}
   </style>

</head>
<body>
	<header class="cent  h40">
		<h2>FAQ</h2>
	</header>

     <a href="index.php?action=liuyan&ts=list" style="float:right; margin-right:15px" >返回列表</a>
    

<form action="index.php?action=liuyan&ts=reply" method="post">
<input name="liuyan_id" type="hidden" value="<{$liuyandata.liuyan_id}>">
 <table width="98%" cellspacing="3" cellpadding="0" border="0" bgcolor="#F6F6F6" align="center">
        <tbody><tr>
          <td bgcolor="#FFFFFF"><table width="100%" cellspacing="1" cellpadding="5" border="0" bgcolor="#e0e0e0" align="center">
              <tbody><tr bgcolor="#dfdfdf">
                <td width="17%" height="25" bgcolor="#FEFBF8" align="right">主　题：</td>
                <td bgcolor="#FEFBF8" align="left"><{$liuyandata.liuyan_title}></td>
              </tr>
              <tr bgcolor="#dfdfdf">
                <td valign="top" height="25" bgcolor="#FFFFFF" align="right">咨询内容： </td>
                <td bgcolor="#FFFFFF" align="left" style="line-height:200%;"><{$liuyandata.liuyan_content}></td>
              </tr>
              <tr bgcolor="#efefef">
                <td height="25" bgcolor="#FFFFFF" align="right">咨询者： </td>
                <td bgcolor="#FFFFFF"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody><tr bgcolor="#efefef">
                      <td align="left" bgcolor="#FFFFFF"><{$liuyandata.liuyan_name}></td>
                      <td width="25%" bgcolor="#FFFFFF" align="right">咨询时间：</td>
                      <td width="30%" bgcolor="#FFFFFF"><{$liuyandata.liuyan_time}></td>
                      <td width="5%" bgcolor="#FFFFFF" align="right"></td>
                      <td width="10%" bgcolor="#FFFFFF"></td>
                    </tr>
                </tbody></table></td>
              </tr>
              <tr id="manageRe" bgcolor="#dfdfdf">
                  <td height="22" bgcolor="#FFFFFF" align="right">管理回复： </td>
                  <td bgcolor="#FFFFFF" align="center"><table width="97%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                          <td width="76%" height="40" align="left" style="line-height:20px;"><label for="textarea"></label>
                          <textarea name="reply_content" id="textarea" ><{$liuyandata.reply_content}></textarea></td><td width="24%" height="40" align="right" style="line-height:20px;"><input type="submit" name="button" id="button" value="提交"></td>
                        </tr>
                  </tbody></table></td>
                </tr>
          </tbody></table></td>
        </tr>
      </tbody></table>
 

  </td>

</tr>

</tbody></table>
</form>


   
</body>
</html>
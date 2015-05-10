<?php /* Smarty version 2.6.18, created on 2015-04-06 13:40:34
         compiled from admin_liuyan.tpl */ ?>
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
   </style>

</head>
<body>
	<header class="cent  h40">
		<h2>FAQ</h2>
	</header>
<form id="form1" action="index.php" method="get">
     <select id="sel">
       <option value="1">查看全部</option>
       <option value="2">未回复</option>
       <option value="3">已回复</option>
     </select>

 <table width="98%" cellspacing="3" cellpadding="0" border="0" bgcolor="#F6F6F6" align="center">
        <tbody><tr>
          <td bgcolor="#FFFFFF"><table width="100%" cellspacing="1" cellpadding="5" border="0" bgcolor="#e0e0e0" align="center">
              <tbody><tr bgcolor="#dfdfdf">
                <td width="17%" height="25" bgcolor="#FEFBF8" align="right">主　题：</td>
                <td bgcolor="#FEFBF8" align="left">学历认证问题</td>
              </tr>
              <tr bgcolor="#dfdfdf">
                <td valign="top" height="25" bgcolor="#FFFFFF" align="right">咨询内容： </td>
                <td bgcolor="#FFFFFF" align="left" style="line-height:200%;">老师，您好。我是精仪90级学生，毕业20年了。现在要做学历认证，要求母校出具学校证明和录取底册，请问该怎么办？应找哪个部门？档案馆的电话能否帮忙提供一下？谢谢。</td>
              </tr>
              <tr bgcolor="#efefef">
                <td height="25" bgcolor="#FFFFFF" align="right">咨询者： </td>
                <td bgcolor="#FFFFFF"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody><tr bgcolor="#efefef">
                      <td align="left" bgcolor="#FFFFFF"><b>颉##</b>(先生)</td>
                      <td width="25%" bgcolor="#FFFFFF" align="right">咨询时间：</td>
                      <td width="30%" bgcolor="#FFFFFF">2015-01-04</td>
                      <td width="5%" bgcolor="#FFFFFF" align="right"></td>
                      <td width="10%" bgcolor="#FFFFFF"></td>
                    </tr>
                </tbody></table></td>
              </tr>
              <tr id="manageRe" bgcolor="#dfdfdf">
                  <td height="22" bgcolor="#FFFFFF" align="right">管理回复： </td>
                  <td bgcolor="#FFFFFF" align="center"><table width="97%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                          <td height="40" align="left" style="line-height:20px;"> 建议把金工B修完。</td><td height="40" align="right" style="line-height:20px;"> <a onclick="relay(this)" href="#">修改OR回复</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="">删除</a></td>
                        </tr>
                  </tbody></table></td>
                </tr>
          </tbody></table></td>
        </tr>
      </tbody></table>
 
<script type="text/javascript">
  var text="<td><form  width='80%' action='admin.php' method='post'><textarea rows='5' style='width:500px' name='reply'></textarea><input type='submit' value='提交'></form></td>";

 function relay(obg){
 var newElement=document.createElement("tr");
 var tr=obg.parentNode.parentNode.parentNode.parentNode.parentNode;
   tr.appendChild(newElement);
   tr.lastChild.innerHTML=text;
   return false;
 }
document.getElementById('sel').onchange = function(){
        var value = this[this.selectedIndex].value;
        document.getElementById('form1').action += '?ln='+value;
        // alert(document.getElementById('form1').action);
        document.getElementById('form1').submit();   
    };

</script>
  </td>

</tr>

</tbody></table>



   
</body>
</html>
<?php /* Smarty version 2.6.18, created on 2015-04-06 17:40:32
         compiled from ../../templates/faq.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FAQ</title>
	<link rel="stylesheet" type="text/css" href="css/base.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
   <style type="text/css">
   .botton{height:25px; line-height:25px; width:auto; border:1px solid #dedede; background:#f0f0f0; padding:0px 20px;}</style>

</head>
<body>
	<header class="cent  h40">
		<h2>FAQ</h2>
	</header>
	<?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['liuyanlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list']['show'] = true;
$this->_sections['list']['max'] = $this->_sections['list']['loop'];
$this->_sections['list']['step'] = 1;
$this->_sections['list']['start'] = $this->_sections['list']['step'] > 0 ? 0 : $this->_sections['list']['loop']-1;
if ($this->_sections['list']['show']) {
    $this->_sections['list']['total'] = $this->_sections['list']['loop'];
    if ($this->_sections['list']['total'] == 0)
        $this->_sections['list']['show'] = false;
} else
    $this->_sections['list']['total'] = 0;
if ($this->_sections['list']['show']):

            for ($this->_sections['list']['index'] = $this->_sections['list']['start'], $this->_sections['list']['iteration'] = 1;
                 $this->_sections['list']['iteration'] <= $this->_sections['list']['total'];
                 $this->_sections['list']['index'] += $this->_sections['list']['step'], $this->_sections['list']['iteration']++):
$this->_sections['list']['rownum'] = $this->_sections['list']['iteration'];
$this->_sections['list']['index_prev'] = $this->_sections['list']['index'] - $this->_sections['list']['step'];
$this->_sections['list']['index_next'] = $this->_sections['list']['index'] + $this->_sections['list']['step'];
$this->_sections['list']['first']      = ($this->_sections['list']['iteration'] == 1);
$this->_sections['list']['last']       = ($this->_sections['list']['iteration'] == $this->_sections['list']['total']);
?>
 <table width="98%" cellspacing="3" cellpadding="0" border="0" bgcolor="#F6F6F6" align="center">
        <tbody><tr>
          <td bgcolor="#FFFFFF"><table width="100%" cellspacing="1" cellpadding="5" border="0" bgcolor="#e0e0e0" align="center">
              <tbody><tr bgcolor="#dfdfdf">
                <td width="17%" height="25" bgcolor="#FEFBF8" align="right">主　题：</td>
                <td bgcolor="#FEFBF8" align="left"><?php echo $this->_tpl_vars['liuyanlist'][$this->_sections['list']['index']]['liuyan_title']; ?>
</td>
              </tr>
              <tr bgcolor="#dfdfdf">
                <td valign="top" height="25" bgcolor="#FFFFFF" align="right">咨询内容： </td>
                <td bgcolor="#FFFFFF" align="left" style="line-height:200%;"><?php echo $this->_tpl_vars['liuyanlist'][$this->_sections['list']['index']]['liuyan_content']; ?>
</td>
              </tr>
              <tr bgcolor="#efefef">
                <td height="25" bgcolor="#FFFFFF" align="right">咨询者： </td>
                <td bgcolor="#FFFFFF"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody><tr bgcolor="#efefef">
                      <td align="left" bgcolor="#FFFFFF"><?php echo $this->_tpl_vars['liuyanlist'][$this->_sections['list']['index']]['liuyan_name']; ?>
</td>
                      <td width="25%" bgcolor="#FFFFFF" align="right">咨询时间：</td>
                      <td width="30%" bgcolor="#FFFFFF"><?php echo $this->_tpl_vars['liuyanlist'][$this->_sections['list']['index']]['liuyan_time']; ?>
</td>
                      <td width="5%" bgcolor="#FFFFFF" align="right"></td>
                      <td width="10%" bgcolor="#FFFFFF"></td>
                    </tr>
                </tbody></table></td>
              </tr>
              <tr bgcolor="#dfdfdf">
                  <td height="22" bgcolor="#FFFFFF" align="right">管理回复： </td>
                  <td bgcolor="#FFFFFF" align="center"><table width="97%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                          <td height="40" align="left" style="line-height:20px;"><?php echo $this->_tpl_vars['liuyanlist'][$this->_sections['list']['index']]['reply_content']; ?>
</td>
                        </tr>
                  </tbody></table></td>
                </tr>
          </tbody></table></td>
        </tr>
      </tbody></table>
	  <?php endfor; endif; ?>
<div class="page"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
      <hr noshade="noshade" style="height:1px; color:#CCC;">
	  
   <table width="98%" cellspacing="3" cellpadding="0" border="0" bgcolor="#F6F6F6" align="center">
<tbody><tr>
  <td valign="top" bgcolor="#FFFFFF">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#e0e0e0">
                <tbody><tr>
                  <td height="30" colspan="4">&nbsp;<b>发布咨询：</b></td>
                </tr>
<form action="?action=liuyan&ts=ask" method="post"  name="message" id="message"  style="margin:0px; padding:0px;">
				<input type="hidden" name="yxdm" value="<?php echo $this->_tpl_vars['yxdm']; ?>
">
                <tr bgcolor="#ffffff">
                  <td width="14%" height="30" align="right" nowrap="">标 题：</td>
                  <td width="37%"><input type="text" class="ipt-txt" name="liuyan_title" id="title" maxlength="50">
                    <font color="#FF0000">*</font></td>
                </tr>
              <tr bgcolor="#ffffff">
                  <td width="14%" height="30" align="right" nowrap="">你的姓名：</td>
                  <td width="37%"><input type="text" class="ipt-txt" value="" name="liuyan_name" id="uname" maxlength="10">
                    <font color="#FF0000">*</font></td>
                </tr>
   <tr bgcolor="#ffffff">
                  <td width="13%" align="right">验证码：</td>
                  <td><input name="checkcode" type="text" class="ipt-txt" id="vdcode" style="width:60px;" maxlength="4" align="absmiddle">
                    <img src="inc/checkcode.php" id="vdimgck" width="50" height="20" align="absbottom" pagespeed_url_hash="726913108" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">   <font color="#FF0000">*</font></td>
                </tr>
                <tr bgcolor="#ffffff">
                  <td width="14%" align="right">留言内容：<br></td>
                  <td height="2" colspan="3" align="left">
                    <textarea class="ipt-txt" rows="5" style="width:96%;" name="liuyan_content" id="msg"></textarea>
                    <font color="#FF0000">*</font></td>
                </tr>
                    <tr bgcolor="#ffffff">
                      <td height="35" colspan="4" align="center"><input type="submit" class="botton" value="提 交" name="Submit">
                        &nbsp;&nbsp;
                        <input type="reset" value="取 消" class="botton" name="Submit2">
                    </tr>
</form>
                  

     </tbody></table>

  </td>

</tr>

</tbody></table>



   
</body>
</html>
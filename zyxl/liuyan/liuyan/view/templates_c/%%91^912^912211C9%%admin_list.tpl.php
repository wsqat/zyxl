<?php /* Smarty version 2.6.18, created on 2015-04-21 17:52:29
         compiled from admin_list.tpl */ ?>
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
  <a href="index.php?action=login&ts=logout">注销</a>
<form id="form1" action="index.php?action=liuyan&ts=list" method="post">
     <select id="sel" name="is_reply">
       <option  value="2" >查看全部</option>
       <option value="0" <?php if ($this->_tpl_vars['is_reply'] == 0): ?> selected<?php endif; ?> >未回复</option>
       <option value="1" <?php if ($this->_tpl_vars['is_reply'] == 1): ?> selected<?php endif; ?> >已回复</option>
     </select>
  </form>
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
        <tbody>
		
		<tr>
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
              <tr id="manageRe" bgcolor="#dfdfdf">
                  <td height="22" bgcolor="#FFFFFF" align="right">管理回复： </td>
                  <td bgcolor="#FFFFFF" align="center"><table width="97%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                          <td height="40" align="left" style="line-height:20px;"> <?php echo $this->_tpl_vars['liuyanlist'][$this->_sections['list']['index']]['reply_content']; ?>
</td><td height="40" align="right" style="line-height:20px;"> <a onclick="relay(this)" href="index.php?action=liuyan&ts=reply&liuyan_id=<?php echo $this->_tpl_vars['liuyanlist'][$this->_sections['list']['index']]['liuyan_id']; ?>
" style="background:#FFF; color:#000"><?php if ($this->_tpl_vars['liuyanlist'][$this->_sections['list']['index']]['is_reply'] == 0): ?>回复 <?php else: ?>修改<?php endif; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?action=liuyan&ts=delete&liuyan_id=<?php echo $this->_tpl_vars['liuyanlist'][$this->_sections['list']['index']]['liuyan_id']; ?>
" style="background:#FFF; color:#000">删除</a></td>
                        </tr>
                  </tbody></table></td>
                </tr>
          </tbody></table></td>
        </tr>
	
      </tbody>
       
	  
	  </table>	<?php endfor; endif; ?>
<div class="page"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
<script type="text/javascript">
  
document.getElementById('sel').onchange = function(){
        var value = this[this.selectedIndex].value;
        //document.getElementById('form1').action +=value;
		
        //alert(document.getElementById('form1').action);
        document.getElementById('form1').submit();   
    };

</script>
  </td>

</tr>

</tbody></table>



   
</body>
</html>
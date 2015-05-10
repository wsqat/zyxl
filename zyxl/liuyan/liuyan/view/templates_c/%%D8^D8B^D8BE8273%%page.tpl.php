<?php /* Smarty version 2.6.18, created on 2015-04-06 15:23:20
         compiled from page.tpl */ ?>
﻿<?php if ($this->_tpl_vars['page']['count'] > 1): ?>
	<?php if ($this->_tpl_vars['page']['current'] > 1): ?>
        <a  href="<?php echo $this->_tpl_vars['page']['url']; ?>
&page=1">首页</a>
	<a  href="<?php echo $this->_tpl_vars['page']['url']; ?>
&page=<?php echo $this->_tpl_vars['page']['current']-1; ?>
">上一页</a>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['page']['current'] != $this->_tpl_vars['page']['count']): ?>
	<a  href="<?php echo $this->_tpl_vars['page']['url']; ?>
&page=<?php echo $this->_tpl_vars['page']['current']+1; ?>
">下一页</a>
        <a  href="<?php echo $this->_tpl_vars['page']['url']; ?>
&page=<?php echo $this->_tpl_vars['page']['count']; ?>
">末页</a>
	<?php endif; ?>
<?php endif; ?>
<?php
//后台入口
session_start();

require_once('../init.php');

//判断登陆
if(@$_SESSION['id']==NULL&&$action!='login'){
		header('Location: index.php?action=login');
}

$DB = MySql::getInstance();
$smarty->template_dir = ROOT.'/admin/templates/';
@$smarty->assign('Name',$_SESSION['name']);



/***页码显示**/
$limit = (($page-1)*COUNTPERPAGE).','.COUNTPERPAGE;
$limit = 'limit '.$limit;
$page_['url'] = getUrl();
$page_['count'] = getCount();
$page_['current'] = $page;
/**页码显示end**/

//seeArr($_SESSION);
//exit;
if($action!="login"){
	$action="liuyan";
}

if(is_file(ROOT.'/admin/action/'.$action.'.php')){	
	
		require_once('action/'.$action.'.php');
	
}else{
	echo '您访问的页面不存在!';exit;
}

?>
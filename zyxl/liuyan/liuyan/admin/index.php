<?php
//��̨���
session_start();

require_once('../init.php');

//�жϵ�½
if(@$_SESSION['id']==NULL&&$action!='login'){
		header('Location: index.php?action=login');
}

$DB = MySql::getInstance();
$smarty->template_dir = ROOT.'/admin/templates/';
@$smarty->assign('Name',$_SESSION['name']);



/***ҳ����ʾ**/
$limit = (($page-1)*COUNTPERPAGE).','.COUNTPERPAGE;
$limit = 'limit '.$limit;
$page_['url'] = getUrl();
$page_['count'] = getCount();
$page_['current'] = $page;
/**ҳ����ʾend**/

//seeArr($_SESSION);
//exit;
if($action!="login"){
	$action="liuyan";
}

if(is_file(ROOT.'/admin/action/'.$action.'.php')){	
	
		require_once('action/'.$action.'.php');
	
}else{
	echo '�����ʵ�ҳ�治����!';exit;
}

?>
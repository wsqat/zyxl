<?php
//前台入口
session_start();
require_once('init.php');


/***页码显示**/
$limit = (($page-1)*COUNTPERPAGE).','.COUNTPERPAGE;
$limit = 'limit '.$limit;
$page_['url'] = getUrl();
$page_['count'] = getCount();
$page_['current'] = $page;
//seeArr($page_);
/**页码显示end**/
if($action==NULL){
	$action="liuyan";
	$ts="list";	
}


if(is_file(ROOT.'/action/'.$action.'.php')){
	require_once('action/'.$action.'.php');
}else{
	echo '您访问的页面不存在!';exit;
}

?>
<?php
switch ($ts){
	case 'list':
		$yxdm=@$_GET['yxdm'];
		if($page==NULL){
			$page=1;
		}
		if(is_file(ROOT.'/view/cache/liuyan_'.$yxdm.'_'.$page.'.html')){
			require_once('/view/cache/liuyan_'.$yxdm.'_'.$page.'.html');
		}else{
			$DB = MySql::getInstance();
			$liuyan = new liuyan($DB);
			$liuyanlist=$liuyan->getLiuyanList($yxdm,$limit,1);
			
			$page_['count'] = getCount();
			
			$smarty->assign('page',$page_);
			$smarty->assign( 'liuyanlist', $liuyanlist );
			$smarty->assign( 'yxdm', $yxdm );
			$smarty->display('faq.tpl');
		}
		
		break;

	case 'ask'://在线提问
		$yxdm=$_POST['yxdm'];

		$checkcode=$_POST['checkcode'];
		if($checkcode!=$_SESSION['check_pic']){
			msg('验证码错误!','index.php?action=liuyan&ts=list&yxdm='.$yxdm,true);
			break;
		}
		$DB = MySql::getInstance();
		$liuyan = new liuyan($DB);		
		$data['liuyan_yxdm']=check_input(strip_tags($yxdm));
		$data['liuyan_title']=check_input(strip_tags($_POST['liuyan_title']));
		$data['liuyan_name']=check_input(strip_tags($_POST['liuyan_name']));
		$data['liuyan_content']=check_input(strip_tags($_POST['liuyan_content']));
		$data['liuyan_time']=date('Y-m-d H:i:s');
		
		$liuyan->addLiuyan($data);
		msg('发布咨询成功!','index.php?action=liuyan&ts=list&yxdm='.$yxdm,true);
		break;
}

?>
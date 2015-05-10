<?php
$liuyan = new liuyan($DB);
switch ($ts){
	case 'list':
		$is_reply=@$_POST['is_reply'];
	

		if($is_reply==NULL){
			$is_reply=2;
			
		}
		$yxdm=$_SESSION['user_yxdm'];

		$liuyanlist=$liuyan->getLiuyanList($yxdm,$limit,$is_reply);
		//print_r($liuyanlist);
		$page_['count'] = getCount();
		$smarty->assign('page',$page_);
		$smarty->assign( 'liuyanlist', $liuyanlist );
		
		$smarty->assign( 'yxdm', $yxdm );
		$smarty->assign( 'is_reply', $is_reply );
		$smarty->display('admin_list.tpl');
		
		
		break;

	case 'reply'://在线提问
		if($_POST==NULL){
			$liuyan_id=$_GET['liuyan_id'];
			$liuyandata=$liuyan->getData($liuyan_id);
			//print_r($liuyandata);
			if($liuyandata['liuyan_yxdm']!=$_SESSION['user_yxdm']){
				msg('你没有权限管理!','index.php?action=liuyan&ts=list',true);
			}			
			$smarty->assign( 'liuyandata', $liuyandata );			
			$smarty->display('admin_reply.tpl');	
		}else{
			$data['liuyan_id']=$_POST['liuyan_id'];
			$data['reply_content']=$_POST['reply_content'];
			$data['reply_name']=$_SESSION['name'];
			$data['is_reply']=1;
			$data['reply_time']=date('Y-m-d H:i:s');
			
			$liuyan->update($data);
			
			////////  静态页面生成
			$yxdm=$_SESSION['user_yxdm'];	
			$liuyanlist=$liuyan->getLiuyanList($yxdm,$limit,1);				
			$page_['count'] = getCount();
			
			for($i=1;$i<=$page_['count'];$i++){					
				$limit2 = (($i-1)*COUNTPERPAGE).','.COUNTPERPAGE;
				$limit2 = 'limit '.$limit2;
				
				$liuyanlist=$liuyan->getLiuyanList($yxdm,$limit2,1);	
				$page_2['url'] = "index.php?action=liuyan&ts=list&yxdm=".$yxdm;
				$page_2['count'] = getCount();
				
				$page_2['current'] = $i;		
				$smarty->assign('page',$page_2);
				$smarty->assign( 'liuyanlist', $liuyanlist );
				$smarty->assign( 'yxdm', $yxdm );
				
				$content=$smarty->fetch("../../templates/faq.tpl");
				MakeHtmlFile(ROOT.'/view/cache/liuyan_'.$yxdm.'_'.$i.'.html',$content);
			
			}
			
			/////////
			
			msg('回复咨询成功!','index.php?action=liuyan&ts=list',true);
			}
		break;
	case 'delete'://在线提问
		
		
		$liuyan_id=$_GET['liuyan_id'];	
		$liuyan->delete($liuyan_id);
		
		
		////////静态页面生成
			$yxdm=$_SESSION['user_yxdm'];	
			$liuyanlist=$liuyan->getLiuyanList($yxdm,$limit,1);				
			$page_['count'] = getCount();
			
			for($i=1;$i<=$page_['count'];$i++){					
				$limit2 = (($i-1)*COUNTPERPAGE).','.COUNTPERPAGE;
				$limit2 = 'limit '.$limit2;
				
				$liuyanlist=$liuyan->getLiuyanList($yxdm,$limit2,1);	
				$page_2['url'] = "index.php?action=liuyan&ts=list&yxdm=".$yxdm;
				$page_2['count'] = getCount();
				
				$page_2['current'] = $i;		
				$smarty->assign('page',$page_2);
				$smarty->assign( 'liuyanlist', $liuyanlist );
				$smarty->assign( 'yxdm', $yxdm );
				
				$content=$smarty->fetch("../../templates/faq.tpl");
				MakeHtmlFile(ROOT.'/view/cache/liuyan_'.$yxdm.'_'.$i.'.html',$content);
			
			}
			
			/////////
		msg('删除成功');
			
		
		break;
}

?>
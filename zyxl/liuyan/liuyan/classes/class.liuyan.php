<?php

class liuyan extends base{
	function getLiuyanList($liuyan_yxdm=NULL,$limit= NULL,$is_reply= 2){
		$condition=NULL;
		if($liuyan_yxdm==NULL){		
			$condition=" 1=1 ";	
		}else{
			$condition = " liuyan_yxdm =".$liuyan_yxdm;
		}
		if($is_reply == 2){
			$condition .= '';
		}elseif($is_reply != 2){
			$condition .= ' and is_reply = '.$is_reply;
		}
		if($limit==NULL){		
			$limit=" ";	
		}
		$order = 'liuyan_id desc';
		return $this->select($condition,'*',$order,$limit);
	}
	function addLiuyan($data){
		
		return $this->add($data);
	}
	
	
	
	
}
?>

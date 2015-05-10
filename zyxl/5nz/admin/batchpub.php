<?php
// 批量发布
//var_dump($_POST['chk']);
include_once "../php/function.php";
include_once "conn.php";
//print_r($_POST['chk']);
$chk = $_POST['chk'];
if($chk!=""){ 
    $del_num=count($chk); 
    for($i=0;$i<$del_num;$i++){ 
		//mysql_query("delete from news where id='$del_id[$i]'"); 
		//$sql = "delete from contest1 where article_id='$chk[$i]'";
		$sql="update contest1 set state =1 where article_id = '$chk[$i]' ";
		mysql_query($sql);
    }  
    if(mysql_affected_rows()){
        echo("<script type='text/javascript'>alert('发布成功！');history.back();</script>"); 
    }else{
        //echo_message("发布失败！",1);
        echo("<script type='text/javascript'>alert('发布失败！');history.back();</script>"); 
    }
    mysql_close();
	
}else{ 
    echo("<script type='text/javascript'>alert('请先选择项目！');history.back();</script>"); 
}
?>
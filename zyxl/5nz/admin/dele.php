<?php
error_reporting(0);
$aid =  trim($_GET['aid']);
$aid = intval(base64_decode($aid));

$op =  trim($_GET['s']);
$op = strval(base64_decode($op));

include_once "../php/function.php";
//$yx_table = contest_yx;
    if(!empty($aid)){
        include_once "conn.php";
        
		if($op=="delete")
	        $sql = "delete from contest_yx where article_id='$aid'";
		else
			$sql = "delete from contest1 where article_id='$aid'";
        mysql_query($sql);
        if(mysql_affected_rows()){
            echo_message("删除成功！",1);
        }else{
            echo_message("删除失败！",1);
        }
        mysql_close();
        
    }else{
        echo_message("文章不存在！",1);
    }
?>

<?php
error_reporting(0);
$aid =  trim($_GET['aid']);
$aid = intval(base64_decode($aid));

include_once "../php/function.php";
//$yx_table = contest_yx;
    if(!empty($aid)){
        include_once "conn.php";
        
		$sql = "delete from liuyans where liuyan_id='$aid'";
        mysql_query($sql);
        if(mysql_affected_rows()){
            echo_message("删除成功！",4);
        }else{
            echo_message("删除失败！",4);
        }
        mysql_close();
        
    }else{
        echo_message("回复不存在！",4);
    }
?>

<?php
include_once "conn.php";
include_once "../php/function.php";

// require_once '../htmlpurifier/library/HTMLPurifier.includes.php';
// require_once '../htmlpurifier/library/HTMLPurifier.auto.php';
error_reporting(0);
if(!isset($_SESSION)){ session_start(); };
if($_SESSION["u_fb"]!=1)
{
    //login;
    header("location:../webadmin/index.php");
}
//print_r($_POST);
$id = intval(trim($_POST['bh']));
//默认配置htmlpurifier
// $config = HTMLPurifier_Config::createDefault();
// $purifier = new HTMLPurifier($config);

// //$clean_html = $purifier->purify($dirty_html);
// $rcontent = trim($_POST['rcontent']);
// $rcontent = $purifier->purify($rcontent);
$rcontent =  check_input(strip_tags($_POST['rcontent']));
$reply_name = $_SESSION["user_name"];

$rtime = date('Y-m-d H:i:s');

$sql="update liuyans set reply_content = '$rcontent' , reply_name = '$reply_name',is_reply=1 , reply_time='$rtime' where liuyan_id = '$id' ";

mysql_query($sql);
//mysql_query($query , $db) or die(mysql_error($db));
//echo $sql;		
if(mysql_affected_rows()){
	//echo "success";
	mysql_close();
	echo_message("修改回复成功！",4);
}else{
	//echo "failed";
	echo_message("修改回复失败！",-1);
}

?>



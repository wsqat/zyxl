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
$bh = intval(trim($_POST['bh']));
$number1 = trim($_POST['number1']);
$number2 = trim($_POST['number2']);
$xuezhi = trim($_POST['xuezhi']);
$beizhu = trim($_POST['beizhu']);
$beizhu = check_input(strip_tags($beizhu));


//$sql="update yx_jh set renshu = '$number1' , xuefei = '$number2' where bh = $bh ";
$sql="update yx_jh set renshu = '$number1' , xuefei = '$number2',xuezhi = '$xuezhi',beizhu= '$beizhu' where bh = $bh ";
mysql_query($sql);
//mysql_query($query , $db) or die(mysql_error($db));
//echo $sql;
if(mysql_affected_rows()){
    //echo "success1";
    $yxdm = $_SESSION["user_sch_id"];
    $sqls="update contest_yx set pstate=0 where yxdm = '$yxdm' ";
    //echo $sqls;
    mysql_query($sqls);
    if(mysql_affected_rows()){
        //echo "success2";
        echo_message("计划更新成功！",3);
    }else{
        //echo "success1";
        mysql_close();
        echo_message("招生计划更新成功！",3);
    }
}else{
	//echo "failed";
	echo_message("招生计划更新失败或原值已存在！",-1);
}

?>



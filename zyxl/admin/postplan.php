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

include_once "../admin/conn.php";
$yxdm = $_SESSION["user_sch_id"];
$query = "select * from yx_jh where yxdm = '$yxdm' order by bh asc  ";
$arr_zydm = array();
$result = mysql_query($query);
if($result&&mysql_num_rows($result)>0){
    $i=0;
    while ($row = mysql_fetch_array($result)) {
        $arr_zydm[$i] = $row['zydm'];
        $i++;
    }
}

//print_r($_POST);
$zydl = intval(trim($_POST['zydl']));
$zymc_index = intval(trim($_POST['zymc_index'.$zydl.'']));
//echo $zymc_index."<br>";
$zydm = $arr_zydm[$zymc_index];
//echo $zydm."<br>";

$number1 = trim($_POST['number1']);
$number2 = trim($_POST['number2']);
$xuezhi = trim($_POST['xuezhi']);
$beizhu = trim($_POST['beizhu']);
$beizhu = check_input(strip_tags($beizhu));

$sql="update yx_jh set renshu = '$number1' , xuefei = '$number2',xuezhi = '$xuezhi',beizhu= '$beizhu' where zydm = $zydm ";
mysql_query($sql);
//mysql_query($query , $db) or die(mysql_error($db));
//echo $sql;
if(mysql_affected_rows()){
	//echo "success";
	mysql_close();
	echo_message("招生计划添加成功！",3);
}else{
	//echo "failed";
	echo_message("招生计划添加失败或原值已存在！",-1);
}

?>



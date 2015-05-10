<?php
/**
 * Created by PhpStorm.
 * User: wsqali
 * Date: 2015/5/8
 * Time: 12:53
 */
include_once "conn.php";
include_once "../php/function.php";

error_reporting(0);
if(!isset($_SESSION)){ session_start(); };
if($_SESSION["u_sh"]!=1)
{
    //login;
    header("location:../webadmin/index.php");
}
//print_r($_POST);
$aid = trim($_GET["aid"]);
$aid = intval(base64_decode($aid));



$sql="update yx_xx set web =''  where bh = $aid ";

mysql_query($sql);
//mysql_query($query , $db) or die(mysql_error($db));
//echo $sql;
if(mysql_affected_rows()){
    //echo "success";
    mysql_close();
    echo_message("删除学校官网链接成功！",5);
}else{
    //echo "failed";
    echo_message("删除学校官网链接失败！",-1);
}


?>
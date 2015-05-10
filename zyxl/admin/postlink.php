<?php
/**
 * Created by PhpStorm.
 * User: wsqali
 * Date: 2015/5/7
 * Time: 22:24
 */
include_once "conn.php";
include_once "../php/function.php";

error_reporting(0);
if(!isset($_SESSION)){ session_start(); };
if($_SESSION["u_fb"]!=1)
{
    //login;
    header("location:../webadmin/index.php");
}
//print_r($_POST);
$id = intval(trim($_POST['bh']));
$link = strval(trim($_POST['link']));



$sql="update yx_xx set web = '$link' where bh = $id ";

mysql_query($sql);
//mysql_query($query , $db) or die(mysql_error($db));
//echo $sql;
if(mysql_affected_rows()){
    //echo "success";
    mysql_close();
    echo_message("添加学校官网链接成功！",1);
}else{
    //echo "failed";
    echo_message("添加学校官网链接失败！",-1);
}


?>
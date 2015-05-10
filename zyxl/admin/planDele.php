<?php
error_reporting(0);
if(!isset($_SESSION)){ session_start(); };
if($_SESSION["u_fb"]!=1)
{
    //login;
    header("location:../webadmin/index.php");
}
$aid =  trim($_GET['id']);
$aid = intval(base64_decode($aid));

include_once "../php/function.php";
//$yx_table = contest_yx;
    if(!empty($aid)){
        include_once "conn.php";
        
		//$sql = "delete from yx_jh where bh='$aid'";
        $sql="update yx_jh set renshu = '' , xuefei = '',xuezhi = '',beizhu= '' where bh = $aid ";
        mysql_query($sql);
        if(mysql_affected_rows()){
            echo_message("清空数据成功！",3);
        }else{
            echo_message("清空数据失败！",-1);
        }
        mysql_close();
        
    }else{
        echo_message("计划不存在！",3);
    }
?>

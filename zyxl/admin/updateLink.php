<?php
/**
 * Created by PhpStorm.
 * User: wsqali
 * Date: 2015/5/8
 * Time: 10:00
 */
include_once "conn.php";
include_once "../php/function.php";
error_reporting(0);
if(!isset($_SESSION)){ session_start(); };
// $state_id = _get('stateid');
// $fb = _get('op');
//if(isset($_POST["article_id"])){
//    $aid = $_POST['article_id'];
//}
//$yx_table = contest_yx;
if(isset($_GET["aid"])){
    $aid =  trim($_GET['aid']);
    $aid = intval(base64_decode($aid));
}

if(isset($_GET["s"])) {
    $op = trim($_GET['s']);
    $op = strval(base64_decode($op));
}


if(!empty($aid)){


    if($op=="yes"){
        $sql = "update yx_xx set state=1 where bh = '".$aid."' ";
    }else{
        $sql = "update yx_xx set state=0 where bh = '".$aid."' ";
    }

    mysql_query($sql);
    //mysql_query($query , $db) or die(mysql_error($db));

    if(mysql_affected_rows()){
        //echo "success";
        echo_message("操作成功！",5);
    }else{
        //echo "failed";
        echo_message("操作失败！",-1);
    }

    mysql_close();


}

?>



<?php
/**
 * Created by PhpStorm.
 * User: wsqali
 * Date: 2015/5/8
 * Time: 19:19
 */

include_once "conn.php";
include_once "../php/function.php";
//error_reporting(0);
if(!isset($_SESSION)){ session_start(); };
// $state_id = _get('stateid');
if(!empty($_POST)) {
//print_r($_POST);
    if (!empty($_POST['yxdm'])) {

        if (intval($_POST["op"]) == 1) {

            $sql = "update contest_yx set pstate =1 where yxdm = '" . trim($_POST['yxdm']) . "' ";

            //echo $sql;
            mysql_query($sql);
            //mysql_query($query , $db) or die(mysql_error($db));

            if (mysql_affected_rows()) {
                //echo "success";
                echo_message("审核成功！", 6);
            } else {
                //echo "failed";
                echo_message("审核失败！", -1);
            }
        } elseif (intval($_POST["op"]) == 2) {
            $comment = trim($_POST['comment']);
            $comment = check_input(strip_tags($comment));
            //echo $comment;
            $sql = "update contest_yx set pstate=-1, pcomment = '$comment' where yxdm = '" . trim($_POST['yxdm']) . "' ";
            //echo $sql;
            mysql_query($sql);
            //mysql_query($query , $db) or die(mysql_error($db));

            if (mysql_affected_rows()) {
                //echo "success";
                echo_message("评论成功！", 6);
            } else {
                //echo "failed";
                echo_message("评论失败！", -1);
            }
        }

        mysql_close();

    }
}
?>

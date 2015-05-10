<?php
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

    if(!empty($op))
        $sql="update contest_yx set state =1 where article_id = '".$aid."' ";
    else
        $sql="update contest1 set state =1 where article_id = '".$aid."' ";

    mysql_query($sql);
    //mysql_query($query , $db) or die(mysql_error($db));

    if(mysql_affected_rows()){
        //echo "success";
        echo_message("发布成功！",1);
    }else{
        //echo "failed";
        echo_message("发布失败！",1);
    }

    mysql_close();


}elseif(!empty($_POST)){
    //print_r($_POST);
    if(!empty($_POST['aid'])){
        if($_POST["op"]=="update")
            $sql="update contest_yx set state =1 where article_id = '".trim($_POST['aid'])."' ";
        else
            $sql="update contest1 set state =1 where article_id = '".trim($_POST['aid'])."' ";

        mysql_query($sql);
        //mysql_query($query , $db) or die(mysql_error($db));

        if(mysql_affected_rows()){
            //echo "success";
            echo_message("审核成功！",1);
        }else{
            //echo "failed";
            echo_message("审核失败！",1);
        }

        mysql_close();
    }elseif($_POST['title']==""){
        //header("location:../webadmin/content.php");}
        echo_message("标题不得为空！",1);
        //echo "kong";
    }elseif(!empty($_POST['article_id'])){

        //过滤敏感词
        //filter_arr($_POST);
        // 提交的编辑器内容使用
        // addslashes()来进行转义后再保存，
        // 展示时使用
        // stripslashes()先去除转义再来展示。
        $title = addslashes(trim($_POST['title']));
        $editor1 = addslashes(trim($_POST['editor1']));
        $ptime = date('Y-m-d H:i:s');
        $aid = $_POST["article_id"];
        //print_r($_POST);
        //$article_author_id=$_SESSION["user_id"];
        //$user_sch_id=$_SESSION["user_sch_id"];

        if($_POST["op"]=="update")
            $sql="update contest_yx set state = 0, article_title = '".$title."' , article_content = '".$editor1."' , 		article_time = '".$ptime."' where article_id = '".$aid."' ";
        else
            $sql="update contest1 set article_title = '".$title."' , article_content = '".$editor1."' , 		article_time = '".$ptime."' where article_id = '".$aid."' ";


        mysql_query($sql);
        //mysql_query($query , $db) or die(mysql_error($db));

        if(mysql_affected_rows()){
            //echo "success";
            echo_message("信息更新成功！",1);
        }else{
            //echo "failed";
            echo_message("信息更新失败！",-1);
        }

        mysql_close();
    }




}else{
    echo_message("内容不得为空！",2);
}

?>



<?php
/**
 * Created by PhpStorm.
 * User: wsqali
 * Date: 2015/5/8
 * Time: 9:45
 */
if(!isset($_SESSION)){ session_start(); };
error_reporting(0);

if($_SESSION["login"]!=true)

{
    //login;
    header("location:../webadmin/index.php");
}

if($_SESSION["user_role"]!=10 && $_SESSION["u_sh"]!=1 && $_SESSION["u_fb"]!=1)
{
    //login;
    header("location:../webadmin/index.php");
}

$yx_table = yx_xx;
?>
    <!DOCTYPE html>
    <html lang="zh-cn">
<html>
    <head>
        <meta charset="utf-8">
        <title>审核链接</title>
        <link rel="stylesheet" href="ckeditor/_samples/sample.css">
        <link rel="stylesheet" href="../webadmin/css/pintuer.css">
        <link rel="stylesheet" href="../webadmin/css/admin.css">
        <script src="../webadmin/js/jquery.js"></script>
        <script src="../webadmin/js/pintuer.js"></script>
        <script src="../webadmin/js/respond.js"></script>
        <script src="../webadmin/js/admin.js"></script>
        <link type="image/x-icon" href="../webadmin/favicon.ico" rel="shortcut icon" />
        <link href="/favicon.ico" rel="bookmark icon" />
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="ckeditor/ckfinder/ckfinder.js"></script>
    </head>
<body>
    <div class="lefter">
        <div class="logo"><a href="#"><img src="../webadmin/images/logo.png" alt="后台管理系统" /></a></div>
    </div>
    <div class="righter nav-navicon" id="admin-nav">
        <div class="mainer">
            <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main" href="../index.php">前台首页</a>
                <a class="button button-little bg-yellow" href="../php/logout_action.php">注销登录</a>
            </span>
                <ul class="nav nav-inline admin-nav">
                    <li><a href="../webadmin/systeming.php" class="icon-home"> 开始</a>
                    </li>
                    <?php
                    if($_SESSION["user_role"]==10){
                        echo "<li><a href='../webadmin/systeming.php' class='icon-cog'> 系统</a>";
                    }
                    ?>
                    </li>
                    <li class="active"><a href="../webadmin/content.php" class="icon-file-text"> 内容</a>
                        <ul>
                            <?php

                            if($_SESSION["u_fb"]==1){
                                echo "<li class='active'><a href='../webadmin/content.php'>内容发布</a></li>";
                                include ('../config/settings.php');
                                $settings = new Settings_INI;
                                $settings->load('../config/config.ini');
                                $FAQ = $settings->get('db.FAQ');
                                echo "<li><a href='../webadmin/planadmin.php'>计划管理</a></li>";
                                if(!empty($FAQ)){
                                    echo "<li><a href='../webadmin/message.php'>FAQ管理</a></li>";
                                }
                            }
                            if($_SESSION["u_sh"]==1)
                            {
                                echo "<li><a href='../webadmin/contentadmin.php'>简章审核</a></li>";
                                echo "<li  class='active'><a href='../webadmin/linkVerify.php'>链接审核</a></li>";
                                echo "<li><a href='../webadmin/planVerify.php'>计划审核</a></li>";
                            }
                            if($_SESSION["user_role"]==10)
                            {
                                echo "<li><a href='../webadmin/content.php'>内容发布</a></li>";
                                echo "<li><a href='../webadmin/systeming.php'>后台管理</a></li>";
                            }

                            echo "<li><a href='../webadmin/password.php'>修改密码</a></li>";

                            ?>

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="admin-bread">
                <span>您好，<?php echo $_SESSION["user_name"]; ?>，欢迎您的光临。</span>
                <ul class="bread">
                    <li><a href="../webadmin/index.php" class="icon-home"> 开始</a></li>
                    <li><a href="../webadmin/contentadmin.php">审核</a></li>
                    <li><a href="../webadmin/linkVerify.php">链接审核</a></li>
                </ul>
            </div>
        </div>
    </div>
<div class="admin">

    <button class="button win-back icon-arrow-left"> 后退</button>
    <button class="button win-forward">前进 <span class="icon-arrow-right"></span></button>
    <br><br><br>


    <form method="post" class="form-x x7 x2-move" action="postplan.php" >
<?php
include_once "../php/function.php";
include_once "conn.php";
$aid =  trim($_GET['aid']);
$aid = intval(base64_decode($aid));

$op =  trim($_GET['s']);
$op = strval(base64_decode($op));
if(!empty($aid)){

    //echo $aid;
    if($op=="update")
        $row = mysql_fetch_assoc(mysql_query("select * from  ".$yx_table." where bh = '".$aid."' "));
    else
        $row = mysql_fetch_assoc(mysql_query("select * from contest1 where bh = '".$aid."' "));
    //print_r($row);
    $id = $row["bh"];
    $aid = base64_encode($id);
    $mc = $row["mc"];
    $web = $row["web"];
    $dm = $row["dm"];
    //审核是否通过
    $y = base64_encode("yes");
    $n = base64_encode("no");


//    $array = mysql_fetch_assoc(mysql_query("select * from user_role where user_id = '".$uid."' "));
//    $uname = $array['user_name'];

    // $parray = mysql_fetch_assoc(mysql_query("select * from t_publish where pid = '".$pid."' "));
    // $pname = $parray['pname'];



    ?>

    <form>
        <div class="form-group">
            <div class="x3 x1-move"><strong><label for="yxmc">院校名称:</label></strong></div>
            <div class="x4">
                <strong><label for="yxmc"><?php echo $mc;?></label></strong>
            </div>
        </div>
        <div class="form-group">
            <div class="x3 x1-move"><strong><label for="yxmc">官网链接:</label></strong></div>
            <div class="x4">
                <strong><label for="web"><?php echo $web;?></label></strong>
            </div>
        </div>
<br/><br/>
        <div class="form-group">
  	<div class="x3 x1-move">
<!--  	    <a class='button border-yellow button-little' href='../admin/updateLink.php?s=".$y."&aid=".$aid."'>通过</a> <a class='button border-yellow button-little' href='../admin/updateLink.php?s=".$n."&aid=".$aid."'>不通过</a>-->
  		<a href="updateLink.php?s=<?php echo $n; ?>&aid=<?php echo $aid?>"><button class="button border-green" type="button" >不通过</button></a>
  	</div>
  	<div class="x3">
<!--  		<button class="button border-green" type="button">不通过</button>-->

  		<a href="updateLink.php?s=<?php echo $y; ?>&aid=<?php echo $aid?>"><button class="button border-red" type="button" >通过</button></a>
  	</div>

  </div>

    </form>




    </div>
    </body>
    </html>

<?php
}else{
    echo_message("此文章不存在!",1);
}

?>
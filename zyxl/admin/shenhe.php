<?php
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

$yx_table = contest_yx;
?>
    <!DOCTYPE html>
    <html lang="zh-cn">
<html>
    <head>
        <meta charset="utf-8">
        <title>修改文章</title>
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
                                echo "<li class='active'><a href='../webadmin/contentadmin.php'>简章审核</a></li>";
                                echo "<li><a href='../webadmin/linkVerify.php'>链接审核</a></li>";
                                echo "<li><a href='../webadmin/planVerify.php'>计划审核</a></li>";
                            }
                            if($_SESSION["user_role"]==10)
                            {
                                echo "<li  class='active'><a href='../webadmin/content.php'>内容发布</a></li>";
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
                    <li><a href="../webadmin/contentadmin.php">简章审核</a></li>
                </ul>
            </div>
        </div>
    </div>
<div class="admin">
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
        $arr = mysql_fetch_assoc(mysql_query("select * from  ".$yx_table." where article_id = '".$aid."' "));
    else
        $arr = mysql_fetch_assoc(mysql_query("select * from contest1 where article_id = '".$aid."' "));

    $aid = $arr['article_id'];
    $atitle = $arr['article_title'];
    //echo $atitle;
    $acontent = $arr['article_content'];
    $comment = $arr['comment'];
    $atime = $arr['article_time'];

    $uid = $arr['article_author_id'];
    $array = mysql_fetch_assoc(mysql_query("select * from user_role where user_id = '".$uid."' "));
    $uname = $array['user_name'];

    // $parray = mysql_fetch_assoc(mysql_query("select * from t_publish where pid = '".$pid."' "));
    // $pname = $parray['pname'];



    ?>

    <form action="dealshenhe.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="editor1" style="font-size:16px;">文章标题:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--                <input type="text" name="title" style="width:600px;height:36px;font-size:26px;"-->
<!--                       value="">-->
                <?php echo $atitle;?>
                <input name="op" type="hidden" value="1" >
                &nbsp;&nbsp;&nbsp;&nbsp;

                <button class="button win-back icon-arrow-left"> 后退</button>
                <button class="button win-forward">前进 <span class="icon-arrow-right"></span></button>
                <input type="submit" value="通过" class="button bg-main"  >
        </p>
        </label>
        <label for="editor1" style="font-size:16px;">发布人:<?php echo $uname;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发布时间：<?php echo $atime;?>
            <input type="hidden" value="<?php echo $aid;?>" name="aid">
        </label>
        <br>
        <br>
        <label for="editor1" style="font-size:16px;">文章内容:</label><br><br><br>

<!--			<textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="60">-->
<!--			-->
<!--			</textarea>-->
            <?php echo $acontent;?>
        </form>

        <br><br><br>
    <form action="dealshenhe.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $aid;?>" name="aid">
        <input name="op" type="hidden" value="2" >
        <div class="form-group">
            <div class="label"><label for="detail" style="font-size:16px;">未通过必须填写改进意见</label>
            </div>
            <div class="field">
                <?php
                    if(empty($comment)){
                ?>
                <textarea class="input" id="comment" name="comment" placeholder="未通过必须填写改进意见" data-validate="required:必填,length#<600:内容长度小于100位"></textarea>
                <?php }else{?>
                        <textarea class="input" id="comment" name="comment"  data-validate="required:必填,length#<600:内容长度小于100位"><?php echo $comment;?></textarea>
                    <?php
                    }
                ?>
            </div>
        </div>
        <button class="button border-dot">未通过</button>
    </form>


        </p>
        <p>
            <!-- <input type="submit" value="发布"></p> -->
    </div>
    </body>
    </html>

<?php
}else{
    echo_message("此文章不存在!",1);
}

?>
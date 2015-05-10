<?php
/**
 * Created by PhpStorm.
 * User: wsqali
 * Date: 2015/5/8
 * Time: 8:41
 */

session_start();
if($_SESSION["login"]==true)
{
    $user_name=$_SESSION["user_name"];
}
else {
    header("location:login.html");
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理-后台管理</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/respond.js"></script>
<!--    <script src="js/admin.js"></script>-->
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />

    <script>
        function check()
        {
            with(document.all){
                if(passwd1.value!=passwd2.value)
                {
                    alert("两次密码输入不相同")
                    passwd2.value = "";
                    passwd1.value = "";
                }
                else document.forms[0].submit();
            }
        }
    </script>


</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#"><img src="images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main" href="../index.php">前台首页</a>
                <a class="button button-little bg-yellow" href="../php/logout_action.php">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li class="active"><a href="index.php" class="icon-home"> 开始</a>
                    <ul>
                        <?php

                        if($_SESSION["u_fb"]==1){
                            echo "<li><a href='content.php'>内容发布</a></li>";
                            include ('../config/settings.php');
                            $settings = new Settings_INI;
                            $settings->load('../config/config.ini');
                            $FAQ = $settings->get('db.FAQ');
                            echo "<li><a href='planadmin.php'>计划管理</a></li>";
                            if(!empty($FAQ)){
                                echo "<li><a href='message.php'>FAQ管理</a></li>";
                            }
                        }
                        elseif($_SESSION["u_sh"]==1){
                            echo "<li><a href='contentadmin.php'>简章审核</a></li>";
                            echo "<li><a href='linkVerify.php'>链接审核</a></li>";
                            echo "<li><a href='planVerify.php'>计划审核</a></li>";
                        }
                        elseif($_SESSION["user_role"]==10){
                            echo "<li><a href='content.php'>内容发布</a></li>";
//                            echo "<li><a href='systeming.php'>后台管理</a></li>";
                        }


                        ?>
                        <li class="active"><a href="password.php">修改密码</a></li>

                    </ul>
                </li>
                <?php
                if($_SESSION["user_role"]==10){
                    echo "<li><a href='systeming.php' class='icon-cog'> 系统</a>";
                }
                ?>

                <!-- <ul><li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul> -->
                </li>
                <li><a href="content.php" class="icon-file-text"> 内容</a>
                    <!-- <ul><li><a href="#">添加内容</a></li><li class="active"><a href="#">内容管理</a></li><li><a href="#">分类设置</a></li><li><a href="#">链接管理</a></li></ul> -->
                </li>

            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，<?php echo $user_name; ?>，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="index.php" class="icon-home"> 开始</a></li>
                <li>修改密码</li>
            </ul>
        </div>
    </div>
</div>

<div class="admin">
    <div class="line-big">
        <div class="x6 x1-move">
            <div class="panel border-back">

                <form method="post" class="form-x" action="../php/passwd_change.php">
                    <div class="form-group">
                        <div class="label"><label for="siteurl">原密码</label></div>
                        <div class="field">
                            <input type="text" class="input" id="passwd" name="passwd" size="50" placeholder="请输入原始密码" data-validate="required:请输入原密码" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="title">新密码</label></div>
                        <div class="field">
                            <input type="text" class="input" id="passwd1" name="passwd1" size="50" placeholder="请输入新密码" data-validate="required:请输入新密码。" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="keywords">新密码</label></div>
                        <div class="field">
                            <input type="text" class="input" id="passwd2" name="passwd2" size="50" placeholder="请再次输入新密码" data-validate="required:请再次输入新密码。" />
                        </div>
                    </div>
                    <div class="form-button"><button class="button bg-main" type="submit" onclick="check()">提交</button></div>
                </form>
            </div>
        </div>
    </div>


    <br />
</div>


</body>
</html>
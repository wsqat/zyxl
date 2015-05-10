<?php
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
    <script src="js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
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
						if($_SESSION["u_fb"]==1)
                            {
                            echo "<li><a href='content.php'>内容发布</a></li>";
                            }
						if($_SESSION["u_sh"]==1)
                            {
                            echo "<li><a href='contentadmin.php'>内容审核</a></li>";
                            }
                        if($_SESSION["user_role"]==10)
                            {
                            echo "<li><a href='content.php'>内容发布</a></li>";
                            echo "<li><a href='contentadmin.php'>内容审核</a></li>";
                            }
                        
						
							
							
							?>
							<li><a href='system.php'>后台管理</a></li>


					</ul>
                </li>
                <li><a href="system.php" class="icon-cog"> 系统</a>
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
                <li><a href="index.html" class="icon-home"> 开始</a></li>
                <li>后台首页</li>
            </ul>
        </div>
    </div>
</div>

<div class="admin">
	<div class="line-big">
    	<div class="xm3">
        	<div class="panel border-back">
            	<div class="panel-body text-center">
                	<img src="images/face.jpg" width="120" class="radius-circle" /><br />
                    <?php echo $user_name; ?>
                </div>
			<div class="panel-foot bg-back border-back">您好，<?php echo $user_name; ?>，这是您第<?php 
            if(isset($_SESSION["u_count"])) echo $_SESSION["u_count"];else echo "0";?>次登录，上次登录为<?php if(isset($_SESSION["last_login"])) echo $_SESSION["last_login"];else echo "0000-00-00";?>。</div>
            </div>
            <br />
        	<div class="panel">
            	<div class="panel-head"><strong>站点统计</strong></div>
                <ul class="list-group">
                	<li><span class="float-right badge bg-red">88</span><span class="icon-user"></span> 会员</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-file"></span> 文件</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-shopping-cart"></span> 订单</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-file-text"></span> 内容</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-database"></span> 数据库</li>
                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
        	
            <div class="alert">
                <!-- <h4>拼图前端框架介绍</h4>
                <p class="text-gray padding-top">拼图是优秀的响应式前端CSS框架，国内前端框架先驱及领导者，自动适应手机、平板、电脑等设备，让前端开发像游戏般快乐、简单、灵活、便捷。</p> -->
                <h4>后台功能介绍</h4>
                <p class="text-gray padding-top"><b>超级管理员</b>可以发布通知公告;<br>
                    <b>审核人员&nbsp;&nbsp;&nbsp;&nbsp;</b>可以审核文章;<br><b>发布人员&nbsp;&nbsp;&nbsp;&nbsp;</b>可以发布学校简章、学校计划;</p>
                <p>您现在的身份是：
            	<?php

                //echo  $_SESSION["user_role"]."~~~";
				//echo $_SESSION["u_fb"]."<br>ss";
                //echo $_SESSION["u_sh"];
				if($_SESSION["u_fb"]==1)
							{
                                echo "发布人员</p><a class='button bg-dot icon-code' href='../admin/publish.php'>招生简章</a> "; 
							echo "<a class='button border-main icon-file' href='../admin/publish.php'>招生计划</a> ";
							}
						if($_SESSION["u_sh"]==1)
							{
							echo "审核人员</p><a class='button bg-main icon-download' href='contentadmin.php'> 审核文章</a> "; 
							}
						if($_SESSION["user_role"]==10)
							{
                            echo "超级管理员</p>"; 
							echo "<a class='button bg-dot icon-code' href='../admin/publish.php'>通知公告</a> "; 
							echo "<a class='button bg-main icon-download' href='contentadmin.php'> 审核文章</a> "; 
							
							}
				?>
            </div>
			<div class="panel">
            	<div class="panel-head"><strong>系统信息</strong></div>
                <table class="table">
                	<tr><th colspan="2">服务器信息</th><th colspan="2">系统信息</th></tr>
                    <tr><td width="110" align="right">操作系统：</td><td><?php echo php_uname('s');?></td><td width="90" align="right">系统开发：</td><td><a href="#" target="_blank">框架</a></td></tr>
                    <tr><td align="right">Web服务器：</td><td><?php $arr = explode(" ",apache_get_version()); echo $arr[0];?></td><td align="right">主页：</td><td><a href="#" target="_blank"><?php echo $_SERVER["HTTP_HOST"]; ?></a></td></tr>
                    <tr><td align="right">程序语言：</td><td><?php echo "PHP/".PHP_VERSION;?></td><td align="right">客户端IP：</td><td>
                        <?php echo $_SERVER['REMOTE_ADDR'];?>
                    </td></tr>
                    <tr><td align="right">数据库：</td><td>MYSQL/<?php echo mysql_get_server_info(); ?></td><td align="right">群交流：</td><td><a href="http://shang.qq.com/wpa/qunwpa?idkey=a08e4d729d15d32cec493212f7672a6a312c7e59884a959c47ae7a846c3fadc1" target="_blank">201916085</a> (点击加入)</td></tr>
                </table>
            </div>
        </div>
    </div>
    
    
    <br />
</div>


</body>
</html>
<?php
	   if(!isset($_SESSION)){ session_start(); };
	   error_reporting(0);

	   if($_SESSION["login"]!=true)

	   {
			//login;
			header("location:../webadmin/index.php");
			}

	   if($_SESSION["u_fb"]!=1)
		{
			//login;
			header("location:../webadmin/index.php");
			}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<html>
<head>
	<meta charset="utf-8">
	<title>修改计划</title>
	<!--<link rel="stylesheet" href="ckeditor/_samples/sample.css">-->
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
            	<a class="button button-little bg-main" href="../index.php" >前台首页</a>
                <a class="button button-little bg-yellow" href="../php/logout_action.php">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li><a href="../webadmin/index.php" class="icon-home"> 开始</a>
                    <!-- <ul><li><a href="system.html">系统设置</a></li><li><a href="content.html">内容管理</a></li></ul> -->
                </li>
                <?php
                    if($_SESSION["user_role"]==10){
                        echo "<li><a href='../webadmin/systeming.php' class='icon-cog'> 系统</a>";
                    }
                ?>
            		<!-- <ul><li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul> -->
                </li>
                <li class="active"><a href="../webadmin/content.php" class="icon-file-text"> 内容</a>
					<ul>
					<!-- <li><a href="../admin/publish.php" target='_blank'>添加内容</a></li> -->
					<?php

						if($_SESSION["u_fb"]==1){
							echo "<li><a href='../webadmin/content.php'>内容发布</a></li>";
              include ('../config/settings.php');
              $settings = new Settings_INI;  
              $settings->load('../config/config.ini');  
              $FAQ = $settings->get('db.FAQ');
              echo "<li><a href='../webadmin/planadmin.php'>计划管理</a></li>";
              if(!empty($FAQ)){
                  echo "<li class='active'><a href='../webadmin/message.php'>FAQ管理</a></li>";
              }
						}
						if($_SESSION["u_sh"]==1)
							{
							echo "<li><a href='contentadmin.php'>内容审核</a></li>";
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
                <!-- <li><a href="#" class="icon-shopping-cart"> 订单</a></li>
                <li><a href="#" class="icon-th-list"> 栏目</a></li> -->
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，<?php echo $_SESSION["user_name"]; ?>，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="../webadmin/index.php" class="icon-home"> 开始</a></li>
                <li><a href="../webadmin/content.php">内容</a></li>
                <li><a href="../webadmin/message.php">FAQ管理</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="admin">

    <button class="button win-back icon-arrow-left"> 后退</button>
	<button class="button win-forward">前进 <span class="icon-arrow-right"></span></button>
	<br><br><br>

    	    
	<form method="post" class="form-x x7 x2-move" action="postedmessage.php" >
  	<?php

  	include_once "../admin/conn.php";
		$yxdm = $_SESSION["user_sch_id"];
    $id =  trim($_GET['aid']);
    $id = intval(base64_decode($id));
    $op =  trim($_GET['up']);
    $op = strval(base64_decode($op));
    //echo $id;

		// $arr_mc  = mysql_fetch_array(mysql_query("select mc from yx_xx where dm = '$yxdm'"));
		// $mc = $arr_mc['mc'];

		//$sql = "select * from yx_jh where bh ='$aid' ";
    $row  = mysql_fetch_array(mysql_query("select * from liuyans where liuyan_id ='$id' "));
    $id = $row["liuyan_id"];
    //$id = base64_encode($id);

    $title = $row["liuyan_title"];
    //$title = mb_substr($title , 0 , 10,'utf-8');
    $content = $row["liuyan_content"];
    //$content = mb_substr($content , 0 , 10,'utf-8');
    $time = $row["liuyan_time"];
    $lname = $row["liuyan_name"];
    //$lname = mb_substr($lname , 0 , 10,'utf-8');
    $rcontent = $row["reply_content"];
    //$rcontent = mb_substr($rcontent , 0 , 10,'utf-8');
    $state=$row['is_reply'];

		
		//$zymcu=array_unique($zymc);

  	?>
	
  <div class="form-group">	
   <div class="x3 x1-move"><strong><label for="title">主题:</label></strong></div>
    <div class="x4">
          <strong><label for="title"><?php echo $title;?></label></strong>
    </div>
  </div>
  <div class="form-group">
    <div class="x3 x1-move"><strong><label for="content">咨询内容:</label></strong></div>
    <div class="x4">
      	 <strong><label for="content"><?php echo $content;?></label></strong>
         <input type="hidden" name="bh" value="<?php echo $id;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="x3 x1-move"><strong><label for="lname">咨询者:</label></strong></div>
    <div class="x4">
         <strong><label for="lname"><?php echo $lname;?></label></strong>
    </div>
  </div>
  <div class="form-group">
    <div class="x3 x1-move"><strong><label for="time">咨询时间:</label></strong></div>
    <div class="x4">
         <strong><label for="time"><?php echo $time;?></label></strong>
    </div>
  </div>
  
  <div class="form-group">
    <div class="x3 x1-move"><strong><label for="time">管理员回复:</label></strong></div>
    <div class="x4">
         <textarea rows="5" name="rcontent" class="input"><?php if(empty($op)) echo $rcontent; ?></textarea>
    </div>
  </div>
  <br>
 	

  <div class="form-group">
  	<div class="x3 x1-move">
  		<button class="button border-red" type="reset">重置</button>
  	</div>
  	<div class="x3">
  		<button class="button border-green" type="submit">提交</button>
  	</div>
  	
  </div>
</form>
    </div>
    
	<!-- <form action="postplan.php" method="post"  class="detail">
		<input type="text" class="input" placeholder="文本框" />
	</form> -->
</body>
</html>

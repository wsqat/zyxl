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
              echo "<li class='active'><a href='../webadmin/planadmin.php'>计划管理</a></li>";
              if(!empty($FAQ)){
                  echo "<li><a href='../webadmin/message.php'>FAQ管理</a></li>";
              }
						}
						if($_SESSION["u_sh"]==1)
							{
							echo "<li><a href='contentadmin.php'>内容审核</a></li>";
							}
						if($_SESSION["user_role"]==10)
							{
							
							echo "<li><a href='../webadmin/content.php'>内容发布</a></li>";
							// echo "<li><a href='../webadmin/contentadmin.php'>内容审核</a></li>";
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
                <li><a href="../webadmin/planadmin.php">计划管理</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="admin">

    <button class="button win-back icon-arrow-left"> 后退</button>
	<button class="button win-forward">前进 <span class="icon-arrow-right"></span></button>
	<br><br><br>

    	    
	<form method="post" class="form-x x7 x2-move" action="postedplan.php" >
  	<?php

  	include_once "../admin/conn.php";
		$yxdm = $_SESSION["user_sch_id"];
    $aid =  trim($_GET['id']);
    $aid = intval(base64_decode($aid));

		$arr_mc  = mysql_fetch_array(mysql_query("select mc from yx_xx where dm = '$yxdm'"));
		$mc = $arr_mc['mc'];

		//$sql = "select * from yx_jh where bh ='$aid' ";
    $arr_jh  = mysql_fetch_array(mysql_query("select * from yx_jh where bh ='$aid' "));
    $bh = $arr_jh["bh"];
		$zydl = $arr_jh["zydl"];
    $zymc = $arr_jh["zymc"];
    $number1 = $arr_jh["renshu"];
    $number2 = $arr_jh["xuefei"];
    $beizhu = $arr_jh["beizhu"];

		
		//$zymcu=array_unique($zymc);

  	?>
	<div class="form-group">
	    <div class="x3 x1-move"><strong><label for="yxmc">院校名称:</label></strong></div>
	    <div class="x4">
	    	  <strong><label for="yxmc"><?php echo $mc;?></label></strong>
	    </div>
  	</div>
	<br>
  <div class="form-group">	
   <div class="x3 x1-move"><strong><label for="zydl">专业大类:</label></strong></div>
    <div class="x4">
          <strong><label for="zydl"><?php echo $zydl;?></label></strong>
    </div>
  </div>
  <div class="form-group">
    <div class="x3 x1-move"><strong><label for="zymc">专业名称:</label></strong></div>
    <div class="x4">
      	 <strong><label for="zymc"><?php echo $zymc;?></label></strong>
         <input type="hidden" name="bh" value="<?php echo $bh;?>">
    </div>
  </div>

  <div class="form-group">
    <div class="x3 x1-move"><strong><label for="zymc">计划招生数:</label></strong></div>
    <div class="x4">
    	  <input type="number" class="input" id="number1" name="number1" size="30" data-validate="required:必填,plusinteger:招生数为正整数" placeholder="请输入招生数,招生数为正整数"  value="<?php echo $number1;?>"/>
    	  <p class="text-dot">(*请输入招生数,招生数为正整数)</p>
    </div>
  </div>
  <div class="form-group">
    <div class="x3 x1-move"><strong><label for="zymc">学费:</label></strong></div>
    <div class="x4">
    	  <input type="number" class="input" id="number2" name="number2" size="30" data-validate="required:必填,currency,学费为货币" placeholder="请输入学费,学费为货币"  value="<?php echo $number2;?>" />
    	  <p class="text-dot">(*请输入学费,学费为货币)</p>
    </div>
  </div>
        <!--        学制 和 备注1年，1年半，2年，3年，5年，弹性-->
        <div class="form-group">
            <div class="x3 x1-move"><strong><label for="zyxz">学制:(不为空)</label></strong></div>
            <div class="x4">
                <!--                <input type="text" class="input" id="xuezhi" name="xuezhi" size="30" data-validate="required:必填" placeholder="请输入学制" />-->
                <select class="input" name="xuezhi">
                    <?php
                    echo "<option value='1年'>1年</option>";
                    echo "<option value='1年半'>1年半</option>";
                    echo "<option value='2年'>2年</option>";
                    echo "<option value='3年'>3年</option>";
                    echo "<option value='5年'>5年</option>";
                    echo "<option value='弹性'>弹性</option>";
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="x3 x1-move"><strong><label for="zyxz">备注:(可为空)</label></strong></div>
            <div class="x4">
                <input type="text" class="input" id="beizhu" name="beizhu" size="30"  placeholder="请输入备注" value="<?php echo $beizhu;?>" />
            </div>
        </div>
 	

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

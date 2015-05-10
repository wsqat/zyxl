<?php
session_start();
if($_SESSION["login"]==true){
	$user_name=$_SESSION["user_name"];
}else{
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
    <title>后台管理</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/admin.js"></script>
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
    <div class="logo"><a href="#" target="_blank"><img src="images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main" href="#">前台首页</a>
                <a class="button button-little bg-yellow" href="login.html">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li><a href="index.php" class="icon-home"> 开始</a>
                    <!-- <ul><li><a href="system.php">系统设置</a></li><li><a href="content.php">内容管理</a></li><li><a href="#">订单管理</a></li><li class="active"><a href="#">会员管理</a></li><li><a href="#">文件管理</a></li><li><a href="#">栏目管理</a></li></ul> -->
                </li>


                <?php
                    if($_SESSION["user_role"]==10){
                        echo "<li class='active'><a href='system.php' class='icon-cog'> 系统</a>";
                    }
                ?>
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
                            echo "<li><a href='contentadmin.php'>内容审核</a></li>";
                        }
                        elseif($_SESSION["user_role"]==10){
                            echo "<li><a href='content.php'>内容发布</a></li>";
                            echo "<li  class='active'><a href='system.php'>后台管理</a></li>";
                        }

						

                    ?>
                        
					
					
					</ul>
                </li>
                <li><a href="content.php" class="icon-file-text"> 内容</a>
					<!-- <ul><li><a href="#">添加内容</a></li><li class="active"><a href="#">内容管理</a></li><li><a href="#">分类设置</a></li><li><a href="#">链接管理</a></li></ul> -->
                </li>
                <!-- <li><a href="#" class="icon-shopping-cart"> 订单</a></li>
                <li><a href="#" class="icon-user"> 会员</a></li>
                <li><a href="#" class="icon-file"> 文件</a></li>
                <li><a href="#" class="icon-th-list"> 栏目</a></li> -->
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，<?php echo $_SESSION["user_name"];?>，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="index.php" class="icon-home"> 开始</a></li>
                <li><a href="system.php">设置</a></li>
                <li>系统设置</li>
            </ul>
        </div>
    </div>
</div>

<div class="admin">

    <div class="tab">
      <div class="tab-head">
        <strong>系统设置</strong>
        <ul class="tab-nav">
          <li class="active"><a href="#tab-set">系统设置</a></li>
          <li><a href="#tab-email">邮件设置</a></li>
          <li><a href="#tab-passwd">修改密码</a></li>
          <li><a href="#tab-visit">访问限制</a></li>
        </ul>
      </div>
      <div class="tab-body">
        <br />
        <div class="tab-panel active" id="tab-set">
        	<form method="post" class="form-x" action="system.html">
				<div class="form-group">
                	<div class="label"><label>网站维护状态</label></div>
                	<div class="field">
                        <div class="button-group button-group-small radio">
                            <label class="button active"><input name="pintuer" value="yes" checked="checked" type="radio"><span class="icon icon-check"></span> 开启</label>
                            <label class="button"><input name="pintuer" value="no" type="radio"><span class="icon icon-times"></span> 关闭</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="readme">维护说明</label></div>
                    <div class="field">
                    	<textarea class="input" rows="5" cols="50" placeholder="请填写维护说明" data-validate="required:请填写维护说明"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="sitename">网站名称</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="sitename" name="sitename" size="50" placeholder="网站名称" data-validate="required:请填写你网站的名称" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="siteurl">网址</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="siteurl" name="siteurl" size="50" placeholder="请填写网址" data-validate="required:请填写网址" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="logo">标志</label></div>
                    <div class="field">
                    	<a class="button input-file" href="javascript:void(0);">+ 浏览文件<input size="100" type="file" name="logo" data-validate="required:请选择上传文件,regexp#.+.(jpg|jpeg|png|gif)$:只能上传jpg|gif|png格式文件" /></a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="title">优化标题</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="title" name="title" size="50" placeholder="title标题内容，用于搜索引擎优化" data-validate="required:请填写优化标题，建议在80字以内。" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="keywords">关键词</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="keywords" name="keywords" size="50" placeholder="站点关键词，用于搜索引擎优化" data-validate="required:请填写站点关键词，建议在100字以内。" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="desc">描述</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="desc" name="desc" size="50" placeholder="网站的描述，用于搜索引擎优化" data-validate="required:请填写网站的描述，建议在200字以内。" />
                    </div>
                </div>
                <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
            </form>
        </div>
        <div class="tab-panel" id="tab-email">邮件设置</div>
        <div class="tab-panel" id="tab-passwd">
		

		
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
        <div class="tab-panel" id="tab-visit">访问限制</div>
      </div>
    </div>
</div>

</body>
</html>
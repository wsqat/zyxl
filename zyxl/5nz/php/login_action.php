<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>后台管理-管理员登录</title>
</head>
<body>

<?php
//	header("Content-type: text/html; charset=gbk2312");
	include("../admin/conn.php");
	//print_r($_POST);
	$user_role='user_role';
	$query="select * from ".$user_role." where user_name=\"".$_POST["user_name"]."\" AND user_pw=md5(\"".$_POST["user_password"]."\")";
	$result=@mysql_query($query) or die("出错了，请联系管理员！！");
	$no=mysql_num_rows($result);
	//session_start();
	if(!isset($_SESSION)){  
		session_start();  
		}  
		if($no)
		{
			//login;
			$_SESSION["login"]=true;
			$_SESSION["user_name"]=$_POST["user_name"];

			$query="select * from ".$user_role." where user_name=\"".$_SESSION["user_name"]."\"";
			$result=@mysql_query($query) or die("出错了，请联系管理员");
			$row=mysql_fetch_array($result);
			//update user_role set u_count='1' where user_name='admin'
			$count = $row["u_count"]+1;
			$addsql="update ".$user_role." set u_count=".$count." where user_name=\"".$_SESSION["user_name"]."\"";
		    mysql_query($addsql, $db) or die(mysql_error($db));
			
			$user_role=$row["user_role"];
			$user_id=$row["user_id"];
			//获取院校信息
			$user_sch_id=$row["u_yxdm"];
			//获取地区信息
			$user_dsdm=$row["u_dsdm"];
			//获取上次登录时间
			$_SESSION["last_login"]=$row["last_login"];

			$u_sh=$row["u_sh"];
			$u_fb=$row["u_fb"];

			
			//获取上次登录时间
			$_SESSION["last_login"]=$row["last_login"];

			//更新登录时间
			$last_login = date('Y-m-d H:i:s',time());
			$updsql="update user_role set last_login='$last_login' where user_name=\"".$_SESSION["user_name"]."\"";
		    mysql_query($updsql, $db) or die(mysql_error($db));

			$_SESSION["user_role"]=$user_role;
			$_SESSION["user_id"]=$user_id;
			$_SESSION["u_count"]=$count;//登录次数
			$_SESSION["user_sch_id"]=$user_sch_id;
			$_SESSION["user_dsdm"]=$user_dsdm;
			$_SESSION["u_fb"]=$u_fb;
			$_SESSION["u_sh"]=$u_sh;


			//print_r($_SESSION);
			header("location:../webadmin/index.php");
			}
		else
		{
			$_SESSION["login"]=false;
			//echo "passwod  error";
			// echo "<script>alert('账号密码错误!')</script>";
			// header("location:../webadmin/index.php");
			//header("Content-type: text/html; charset=gbk2312");
			header("Content-type: text/html; charset=utf-8");
			//echo "<script charset='utf-8' type='text/javascript'>alert('wrong password or username !');window.location.href='../webadmin/index.php';</script>";
			echo "<script charset='utf-8' type='text/javascript'>alert('账号密码错误!');window.location.href='../webadmin/index.php';</script>";
		}
	
	
?>
</body>
</html>
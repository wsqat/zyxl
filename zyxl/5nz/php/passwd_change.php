<?php
	if(!isset($_SESSION)){  
		session_start();  
		} 
	if($_SESSION["login"]!=true)
		{
			header("location:../index.php");
			die("û�е�½�أ�");
		}
		

	include("sql.php");
	$user_role='user_role';
	$query="select * from ".$user_role." where user_name=\"".$_SESSION["user_name"]."\" AND user_pw=md5(\"".$_POST["passwd"]."\")";
	$result=@mysql_query($query) or die("�����ˣ�����ϵ����123����");
	$no=mysql_num_rows($result);
	if(!$no)
		{
			header("location:../webadmin/index.php");
			die("ԭʼ�������");
			}
		else
		{
			$query="update ".$user_role." set user_pw=md5(\"".$_POST["passwd1"]."\") where user_name=\"".$_SESSION["user_name"]."\"";
			$result=@mysql_query($query) or die("�����ˣ�����ϵ��������");
			
			}		
?>

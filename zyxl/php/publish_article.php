<?php
include("sql.php");
if(!isset($_SESSION)){  
		session_start();  
		}  
		if($_SESSION["user_role"]!=11&&$_SESSION["user_role"]!=10)
		{
			//login;
			header("location:../webadmin/index.php");
		}
if($_GET["article_id"]=="")
	{
		//header("location:../webadmin/index.php");
	}

			$contest1='contest1';
			$query="select * from ".$contest1." where article_id=\"".$_GET["article_id"]."\"";
			$result=mysql_query($query) or die("1234");
			$row=mysql_fetch_array($result);
			$authorid=$row["article_author_id"];//文章作者id
			$user_articlecheck_role='user_articlecheck_role';
			$query="select * from ".$user_articlecheck_role." where adminid=\"".$_SESSION["user_id"]."\" AND authorid=\"".$authorid."\"";
			
			$result=mysql_query($query) ;
			
			$no=mysql_num_rows($result);
			if($no)
			{
			//发布文章
			echo "ok文章发布成功";
			$query="update ".$contest1." set state=1 where article_id=\"".$_GET["article_id"]."\"";
			$result=@mysql_query($query) or die("出错了，请联系管理！！");
			}
			
?>
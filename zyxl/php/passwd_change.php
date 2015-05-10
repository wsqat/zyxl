<?php
    error_reporting(0);
	if(!isset($_SESSION)){  
		session_start();  
		} 
	if($_SESSION["login"]!=true)
		{
			header("location:../index.php");
		}
		

	include("../admin/conn.php");
    include("function.php");
	$user_role='user_role';
	$query="select * from ".$user_role." where user_name=\"".$_SESSION["user_name"]."\" AND user_pw=md5(\"".$_POST["passwd"]."\")";
    //echo $query;
	$result=@mysql_query($query);
	$no=mysql_num_rows($result);

	    if(!$no) {
			//header("location:../webadmin/index.php");
			//echo "原密码错误!";
            echo_message("原密码错误!",-1);

		}
		else {
			$query="update ".$user_role." set user_pw=md5(\"".$_POST["passwd1"]."\") where user_name=\"".$_SESSION["user_name"]."\"";
            //echo $query;
			$result=@mysql_query($query);
            $no = mysql_num_rows($result);
            if(!$no){
                echo_message("修改成功!",1);
            }else{
                echo_message("密码修改失败!",-1);
            }
			
		}
?>


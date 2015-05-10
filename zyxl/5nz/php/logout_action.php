<?php

	if(!isset($_SESSION)){  
		session_start();  
		}  
		
			$_SESSION["login"]=false;
			//$_SESSION["user_name"]="";
			//$_SESSION["user_role"]="";
			//$_SESSION["user_id"]="";
			//$_SESSION["user_sch_id"]="";
			//$_SESSION["user_dsdm"]="";
			//$_SESSION["u_fb"]="";
			//$_SESSION["u_sh"]="";
			//session_destroy(); //清空以创建的所有SESSION
			session_unset("user_name");//清空指定的session
			session_unset("user_role");//清空指定的session
			session_unset("user_id");//清空指定的session
			session_unset("user_sch_id");//清空指定的session
			session_unset("user_dsdm");//清空指定的session
			session_unset("u_fb");//清空指定的session
			session_unset("u_sh");//清空指定的session

			header("location:../webadmin/index.php");
			
	
?>
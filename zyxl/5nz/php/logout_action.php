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
			//session_destroy(); //����Դ���������SESSION
			session_unset("user_name");//���ָ����session
			session_unset("user_role");//���ָ����session
			session_unset("user_id");//���ָ����session
			session_unset("user_sch_id");//���ָ����session
			session_unset("user_dsdm");//���ָ����session
			session_unset("u_fb");//���ָ����session
			session_unset("u_sh");//���ָ����session

			header("location:../webadmin/index.php");
			
	
?>
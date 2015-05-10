<?php

$username=isset($_POST['user_name']) ? $_POST['user_name'] : '';
$password=isset($_POST['user_pw']) ? $_POST['user_pw'] : '';
$checkcode=isset($_POST['checkcode']) ? $_POST['checkcode'] : '';
if($ts=="logout"){
		session_destroy();
		header('location:index.php');		
}

$login = new login($DB);
if(!empty($username))
{
	$login->masterLogin($username, $password, $checkcode);
}
$smarty->display('login.tpl');
?>
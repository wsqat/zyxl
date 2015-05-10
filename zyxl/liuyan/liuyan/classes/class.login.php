<?php
/**
 * 
 * 管理员登陆。
 * 登录时，验证其登陆信息，成功登录后，由用户名确认其ID并确认去所在分组和对应的权限。
 * 并且将其写入session中，在执行动作时，由此判断是否有对应的权限
 * @author Administrator
 *
 */
class login{
	public $db;
	function login($dbhandle){
		$this->db=$dbhandle;
	}
	
	/**
	 * 检验是否管理员登陆
	 * 是则进入后台，否则返回重新登陆
	 * @param string $username  用户名
	 * @param string $password  原始密码（未加密）
	 * @param string $checkcode 验证码
	 */
	function masterLogin($username,$password,$checkcode){
		$username = addslashes($username);
		$password = addslashes($password);
		$checkcode = addslashes($checkcode);
		if(empty($username)||empty($password)){
			msg("用户名和密码不能为空！");
		}else{
			if($checkcode!=$_SESSION['check_pic']){
					msg("验证码错误");
					return 0;
			}
			
			$res=$this->db->query("select * from users where user_name='$username'");

			$num=$this->db->num_rows($res);
			if($num<1){
				msg("该用户不存在！请重新登录！");
			}else{
				$row=$this->db->fetch_array($res);
				if($row['user_pw']!=$password){
					msg("密码错误，请重新输入");
				}else{
					$_SESSION['id'] = $row['user_id'];
					
					
					$_SESSION['name'] = $row['user_name'];					
					$_SESSION['user_yxdm'] = $row['user_yxdm'];
					
					header('location:index.php?action=liuyan');
				}
					
			}
		}
	}
}
?>
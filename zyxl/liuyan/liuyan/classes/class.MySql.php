<?php
/**
 * 数据库类
 * 实现了数据库的相关操作
 * @author Administrator
 *
 */
class MySql
	{
		private static $instance = NULL;
		private $connect = NULL;
		private $result;
		
		
		//get the quote of mysql
		public static function  getInstance(){
			if ( ! self::$instance instanceof self )
				self::$instance = new self();
			return self::$instance;
		}
		
		
		/* constructor
		 * @access private
		 */
		 private function __construct(){
			//do nothing here. 
		}
		//连接数据库
		private function MySql($dbHost='', $dbUser='', $dbPassword='', $dbName='')
			{
				if (!function_exists('mysqli_connect'))
					{
						msg('服务器PHP不支持MySql数据库');
						exit;
					}
				if (!$this->connect= @mysqli_connect($dbHost, $dbUser, $dbPassword))
					{
						msg("连接数据库失败,可能是数据库用户名或密码错误");
						exit;
					}
					
				mysqli_query($this->connect,"SET NAMES 'utf8'");
				@mysqli_select_db($this->connect,$dbName) OR msg("未找到指定数据库");
				
			}
		//创建数据库连接
		
		private function connect(){
				if (!function_exists('mysqli_connect'))
					{
						msg('服务器PHP不支持MySql数据库');
						exit;
					}
				if (!$this->connect= @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD))
					{
						msg("连接数据库失败,可能是数据库用户名或密码错误");
						exit;
					}
					
				mysqli_query($this->connect,"SET NAMES 'utf8'");
				@mysqli_select_db($this->connect,DB_NAME) OR msg("未找到指定数据库");
		}	
	
		//关闭数据库
		function close()
			{
				return mysqli_close($this->connect);
			}
		//查询
		function query($sql)
			{
				if ( $this->connect == NULL ){
					$this->connect();	
				}
				$this->result=@mysqli_query($this->connect,$sql);
				if (!$this->result)
					{
						Msg("SQL语句执行错误");
					} 
				else
					{
						return $this->result;
					}
			}
		/**
		 * 将数据库查询得到的数据格式化成数组形式
		 * Enter description here ...
		 * @param $result
		 */
		function getList($result){
			$res = array();
			while($row=$this->fetch_array($result))
					{
						$res[]=$row;
					}
			return $res;
		}
		//从结果集中取出一行作为关联数组/数字索引数组
		function fetch_array($query)
			{
				return mysqli_fetch_array($query);
			}
		function once_fetch_array($sql)
			{
				$this->result = $this->query($sql);
				return $this->fetch_array($this->result);
			}
		//获取行的数目
		function num_rows($query)
			{
				return mysqli_num_rows($query);
			}
		//获取影响的行
		function affected_rows()
			{
				return mysqli_affected_rows();
			}
		//获取数据库版本信息
		function getMysqlVersion()
			{
				return mysqli_get_server_info($this->connect);
			}
	}
?>
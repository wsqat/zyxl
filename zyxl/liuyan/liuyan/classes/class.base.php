<?php
//基类
/**
 * 基类，实现每个类的基本功能，其子类可在此基础上进行扩展。
 * 实现MySQL的接口，对数据库库进行操作
 *cjn 于2012年7月19日20:39:22
 */

class base
{
	public $db;
	public $name;
	public $primary_key;
	
	
	
	/**
	 * 1.构造函数，使用与类同名的函数实现。
	 * 2.使用此方法进行构造，可向下兼容PHP4，但是在新版本中，建议直接使用魔术方法构造。function __construct()
	 * 3.传入的参数$dbhandle为数据库连接句柄
	 * 4.属性，name,primary_key与数据库有关，分别为对应操作的数据表和主键
	 * 5.每个类基本只操作一个数据表，在出现不同表关联查询时，将以此查询分解为多次，每次只对一个表进行操作
	 */
	function base($dbhandle){
		$this->db = $dbhandle;
		$this->name = DB_PRE.get_class($this).'s';		
		//设定默认值
		$this->primary_key = get_class($this).'_id';
	}
	
	/**
	 * bool add(array $data);
	 * 1.将数据插入名为对应name值的表中。
	 * 2.$data为一个数组，若要插入多行，数组的每一个元素为一个要插入的一组数据。
	 * 3.每组数据的格式也为数组，其键和值分别为对应数据表中的字段和对应值
	 * 4.changData在后面描述。它将数据格式化为SQL语句中的字符串格式
	 *
	 */
	function add($data){
		
		$string = $this->changData($data);
		$sql = 'insert into '.$this->name.' set '.$string;
		
		$this->db->query($sql);
		return true;
	}
	/**
	 * string changData(array $data)
	 * $data数组有两种形式。包含一组数据，或多组数据
	 * 将data数据编程string，可直接加在SQL语句中
	 * $data的数据格式如add方法中的$data格式
	 * @param $data
	 */
	function changData($data){
		$Item=array();
		foreach($data as $key=>$value){
			$Item[]="$key='$value'";
			}
		$addStr=implode(',',$Item);
		return $addStr;
	}
	/* 
	 * 按要求查询
	 * string condition
	 * string filed  *
	 * string limit	 defalut 
	 * string order  defalut primary_key
	 * return array
	 */	
	/**
	 * 
	 * array select ($condition = '',$filed = '',$order='',$limit='' );
	 * @param string $condition 查询条件，多个时用逗号隔开，直接用在ＳＱＬ语句中ＷＨＥＲＥ后。当只有数字时为查找对应主键
	 * @param string $filed 查询的字段，多个时使用逗号隔开。默认查询所有字段
	 * @param string $order 排序条件
	 * @param string $limit 直接写入SQL语句的limit语句
	 * 返回所有符合查询条件的元素所组成的数组
	 * 注意此处的 “统计符合条件记录数“结果写入session，作为分页的依据
	 */
	function select($condition = '',$filed = '',$order='',$limit=''){
		if($order == ''){
			$order = $this->primary_key.' desc '; 
		}
		if($filed == ''){
			$filed = '*';
		}
		if($condition == ''){
			$condition = '1=1';
		}elseif(is_numeric($condition)){
			$condition = $this->primary_key.'='.$condition; 
		}
		/***统计符合条件记录数****/
		$count = 'select '.$filed.' from '.$this->name.' where '.$condition;
		$result = $this->db->query($count);
		$count = $this->db->num_rows($result);
		$_SESSION['count'] = $count;
		/******end************/
		$sql = 'select '.$filed.' from '.$this->name.' where '.$condition.' order by '.$order.' '.$limit;
		
		$result = $this->db->query($sql);
		$result = $this->db->getList($result);

		return $result;
	}
	
	/**
	 * bool update($data,$condition = '')
	 * @param array $data  需要更新的数据。格式如add方法中的$data。
	 * @param string $condition 需要更新的记录的特征，一般直接使用对应的ID作为条件
	 */
	function update($data,$condition = ''){
		
		$string = $this->changData($data);
		
		if($condition == ''){
			$condition = $this->primary_key.' = '.$data[$this->primary_key];
		}
		$sql = 'update '.$this->name.' set '.$string.'  where '.$condition;
		$this->db->query($sql);
		return true;
	}
	
	
	/**
	 * bool delete($condition)
	 * 删除指定的记录
	 * @param string(int--ID) $condition 查找需删除记录的条件（一般直接使用对应ID）
	 */
	function delete($condition){
		if(is_numeric($condition)&&!empty($condition)){
			$condition = $this->primary_key.' = '.$condition;
		}
		$sql = 'delete from '.$this->name .' where '.$condition;
		$this->db->query($sql);
		return true;
	}
	
	/**
	 * array getData($condition,$field='*')
	 * 查询记录，用于获得单个记录，如一篇文章等
	 * @param string(int) $condition 查询条件，一般使用ID
	 * @param string $field 查询中字段 ，一般查询全部
	 * 返回的数组，以字段名为键
	 */
	function getData($condition,$field='*'){
		if(is_numeric($condition)&&!empty($condition)){
			$condition = $this->primary_key.' = '.$condition;
		}
		$sql = 'select '.$field.' from '.$this->name.' where '.$condition.' order by '.$this->primary_key.' desc limit 0,1';
		$result = $this->db->once_fetch_array($sql);
		if($result < 1){
			msg('所选项目不存在！'."$sql");
		}elseif($result){
			return $result;
		}
	}
	
	/**
	 * object query($sql)
	 * 直接执行SQL语句。
	 * @param string $sql
	 */
	function query($sql){
		return $this->db->query($sql);
	}
	

	

	function getClassCondition($class_id){
		global $Classes;
		if(array_key_exists($class_id,$Classes)){
			$item = array();
			foreach ($Classes[$class_id] as $temp){
				$item[] = 'class_id = '.$temp;
			}
			$re = implode(' or ', $item);
			$re = '('.$re.')';
		}else{
			$re = 'class_id = '.$class_id;
		}
		return $re;
	}
}
?>
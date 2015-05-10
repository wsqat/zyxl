<?php
	//session_start()
	ob_start();
	$c_file="counter.txt";  							//文件名赋值给变量
	if(!file_exists($c_file))  							//如果文件不存在的操作
	{
		$myfile=fopen($c_file,"w");  					//创建文件
		fwrite($myfile,"0");  							//置入“0”
		fclose($myfile);  							//关闭文件
	}
	$t_num=file($c_file);  							
	//把文件内容读入变量
	//COOKIE变为SESSION
	if($_COOKIE["date"]!=date('Y年m月d日'))  			//判断COOKIE内容与当前日期是否一致
	{
		$t_num[0]++;  									//原始数据自增1
		$myfile=fopen($c_file,"w");  						//写入方式打开文件
		fwrite($myfile,$t_num[0]);  						//写入新数值
		fclose($myfile);  								//关闭文件
		setcookie("date",date("Y年m月d日"),time()+60*60*24);	//重新将当前日期写入COOKIE并设定Cookie的有效期为24小时
	}
?>
<html>
<head>
<meta charset="utf-8">
	<title>PHP图形化计数器</title>
</head>
<body>
<?php
	echo "欢迎！您是本站第".$t_num[0]."位访客！";  	
	ob_end_flush();	
	// echo "欢迎！您是本站第";  						//显示内容头部
	// $myfile=fopen($c_file,"r");  						//以只读方式打开文件
	// while(!feof($myfile))  							//循环读出文件内容
	// {
	// 	$num=fgetc($myfile);  						//当前指针处字符赋值给变量
	// 	if($num)  								//如果数值存在执行操作
	// 	{
	// 		echo "<img src=images\\".$num.".gif>";  			//显示相应图片
	// 	}
	// }
	// fclose($myfile);  								//关闭文件
	// echo "位访客！";  								//显示内容尾部
?>
</body>
</html>
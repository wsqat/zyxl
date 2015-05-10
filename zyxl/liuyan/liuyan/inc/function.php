<?php
/**
 * 使用魔术方法加载类。
 * 当实例化一个为定义的类时，将尝试执行此函数
 * @param $className
 */
function check_input($value)
{
// 去除斜杠
if (get_magic_quotes_gpc())
  {
  $value = stripslashes($value);
  }
// 如果不是数字则加引号
if (!is_numeric($value))
  {
  $value =mysql_real_escape_string($value);
  }
return $value;
}


function autoload($className){
    if (file_exists(ROOT.'/classes/class.'.$className.'.php')){
     	require_once ROOT.'/classes/class.'.$className.'.php';
    }else{ 
   		 die('类'.$className.'文件不存在');
    }
}
spl_autoload_register("autoload");

	
/**
 * 系统消息
 * 在进程中语带错误时输出或给出相关的提示信息
 * @param string $msg  提示消息
 * @param string $url  跳转至指定的地址
 * @param bool  $isAutoGo    自动跳转
 */
function msg($msg,$url='javascript:history.back(-1);', $isAutoGo=false)
{
echo <<<EOT
<html>
<head>
EOT;
if($isAutoGo)
{
echo "<meta http-equiv=\"refresh\" content=\"2;url=$url\" />";
}
echo <<<EOT
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>返回</title>
<style type="text/css">
<!--
body {
background-color:#F7F7F7;
font-family: Arial;
font-size: 12px;
line-height:150%;
}
.main {
background-color:#FFFFFF;
margin-top:20px;
font-size: 12px;
color: #666666;
width:580px;
margin:10px 200px;
padding:10px;
list-style:none;
border:#DFDFDF 1px solid;
}
.main p {
line-height: 18px;
margin: 5px 20px;
}
-->
</style>
</head>
<body>
<div class="main">
<p>$msg</p>
<p><a href="$url">&laquo;返回</a></p>
</div>
</body>
</html>
EOT;
exit;
}
/**
* 分页函数
*
* @param int $count 条目总数
* @param int $perlogs 每页显示条数目
* @param int $page 当前页码
* @param string $url 页码的地址
* @return unknown
*/
function pagination($count,$perlogs,$page,$url)
{
$pnums =@ceil($count / $perlogs);
$re = '';
for ($i = $page-5;$i <= $page+5 && $i <= $pnums; $i++)
	{
		if ($i > 0)
			{
				if ($i == $page)
					{
						$re .= " <span class='current'>$i</span> ";
					}
				else 
					{
						$re .= " <a href=\"$url=$i\">$i</a> ";
					}
			}
	}
if ($page > 6) $re = "<a href=\"$url=1\" title=\"首页\">&laquo;</a> ...$re";
if ($page + 5 < $pnums) $re .= "... <a href=\"$url=$pnums\" title=\"尾页\">&raquo;</a>";
if ($pnums <= 1) $re = '';
return $re;
}

/**
 * 验证是否为超级管理员
 * Enter description here ...
 * @param $groupList
 */
function isSuperAdmin($groupList){
	if(is_array($groupList)){
		foreach ($groupList as $value){
			//if($value['group_id'] == 1){
			if($value == 1){/********2012-03-13_dkzg16修改*************/
				return true;				
			}
		}
	}
	return false;
}


/**
 * 获得http请求的地址。
 * 并且将分页内容去除，替换成新的分页信息
 * 用于分页中
 */
function getUrl(){
	$url ='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$url = preg_replace('/&page=\d*/', '', $url);
	return $url;
}

/**
 * 用于分页、
 * 注意，在每次执行getList()时，都将统计符合条件的数量写入session
 * @param $count
 */
function getCount($count=''){
	if($count==''){
		@$count = $_SESSION['count'];
	}
	unset($_SESSION['count']);
	if($count % COUNTPERPAGE){
		$count = (int)($count/COUNTPERPAGE)+1;
	}else{
		$count = (int)($count/COUNTPERPAGE);
	}
	return $count;
}

/**
 * 保留用户输入的原内容，
 * 用于登陆时输入用户名和密码的处理
 * Enter description here ...
 * @param $clean_string
 */

	
function ip_xz($ip_id,$ipAdress){
		//print_r($ipAdress);
		$userips_head = explode(".", $ipAdress[0]['ip_head']);//把获得的ip切开成数组
		$userips_tail = explode(".", $ipAdress[0]['ip_tail']);//把获得的ip切开成数组 
		
		 if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) { 
        $userip = getenv('HTTP_CLIENT_IP'); 
        } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) { 
        $userip = getenv('HTTP_X_FORWARDED_FOR'); 
        } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) { 
        $userip = getenv('REMOTE_ADDR'); 
        } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) { 
        $userip = $_SERVER['REMOTE_ADDR']; 
         } 
		 $userip_server = explode(".", $userip);//把获得的ip切开成数组
		//var_dump($userip_server);exit;
		//限制ip 
		
		if($ip_id == '2'){
		if ($userip==$ipAdress[0]['ip_head']){ 
		
		echo"您的ip限制访问！"; 
		header("location:index.php");//被禁止后跳转到首页
		exit; 
		}
		}
		else if($ip_id =='1')
		{ 
			if(($userip_server[0]<=$userips_tail[0]&&$userip_server[0]>=$userips_head[0])&&($userip_server[1]<=$userips_tail[1]&&      $userip_server[1]>=$userips_head[1])&&($userip_server[2]<=$userips_tail[2] && $userip_server[2]>=$userips_head[2])&&($userip_server[3]<=$userips_tail[3] && $userip_server[3]>=$userips_head[3])){
			echo "您的ip不符!"; 
			
			header("location:index.php");//被禁止后跳转到首页
			exit; 
			}
			}
		
	}	
function MakeHtmlFile($file_name, $content)
    {     //目录不存在就创建
        if (!file_exists (dirname($file_name))) {
            if (!@mkdir (dirname($file_name), 0777)) {
                die($file_name."目录创建失败！");
            }
        }
                    
          if(!$fp = fopen($file_name, "w")){
            echo "文件打开失败！";
            return false;
        }
          if(!fwrite($fp, $content)){
            echo "文件写入失败！";
            fclose($fp);
            return false;
        }
        
        fclose($fp);
        chmod($file_name,0666);
    }
?>
<?php
//封装常用函数

//alert输出信息  重定向至首页
//防乱码
function echo_message($message , $url){
	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
	//echo "<script charset='utf-8' type='text/javascript'>window.history.go(-1)</script>";
	if($url == 1){
		echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../webadmin/content.php';</script>";
	}else if($url == 2){
		echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../webadmin/contentadmin.php';</script>";
	}elseif($url==-1){
    	echo"<script>alert('$message');history.go(-1);</script>";  
  }else if($url == 3){
    echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../webadmin/planadmin.php';</script>";
  }else if($url == 4){
    echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../webadmin/message.php';</script>";
  }else if($url == 5){
        echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../webadmin/linkVerify.php';</script>";
  }else if($url == 6){
        echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../webadmin/planVerify.php';</script>";
  }
}

function _get($str){ 
	$val = !empty($_GET[$str]) ? $_GET[$str] : null; 
	return $val; 
} 

//过滤评论敏感词
function filter_word($str,$pid){
	//echo $pid;
	if (is_file("filterwords.txt")){          //判断给定文件名是否为一个正常的文件
        //$filter_word = file("./filterwords.txt");     //把整个文件读入一个数组中
        $filename = "filterwords.txt";
        $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
        
        //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
        $contents = fread($handle, filesize ($filename));
        fclose($handle);        

        $filter_word = explode(";",$contents);
        //print_r($filter_word);
        //echo $str;
        //$str=$str;
        for($i=0;$i<count($filter_word)-1;$i++){          //应用For循环语句对敏感词进行判断
           //if(preg_match("/\b".trim($filter_word[$i])."\b/i",$str)){        //
           if(preg_match("/".trim($filter_word[$i])."/i",$str)){        
           //应用正则表达式，判断传递的留言信息中是否含有敏感词
              echo "<script> alert('评论信息中包含敏感词！');history.back(-1);</script>";
              //echo_message("评论信息中包含敏感词！" ,5 , $pid);
              exit;
            }
        }
    }
}

function filter_arr($arr){
	for($j=0;$j<count($arr);$j++){

		if (is_file("filterwords.txt")){          //判断给定文件名是否为一个正常的文件
	        //$filter_word = file("./filterwords.txt");     //把整个文件读入一个数组中
	        $filename = "filterwords.txt";
	        $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
	        
	        //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
	        $contents = fread($handle, filesize ($filename));
	        fclose($handle);        

	        $filter_word = explode(";",$contents);
	        //print_r($filter_word);
	        //echo $str;
	        //$str=$str;
	        for($i=0;$i<count($filter_word)-1;$i++){          //应用For循环语句对敏感词进行判断
	           //if(preg_match("/\b".trim($filter_word[$i])."\b/i",$str)){        //
	           if(preg_match("/".trim($filter_word[$i])."/i",trim($arr[$j]))){        
	           //应用正则表达式，判断传递的留言信息中是否含有敏感词
	              echo "<script> alert('信息中包含敏感词！');history.back(-1);</script>";
	              //echo_message("评论信息中包含敏感词！" ,5 , $pid);
	              exit;
	            }
	        }
    	}	

	}

}


//防XSS过滤
// function RemoveXSS($value){
// 	$value = stripslashes(trim($value));
//     $value = strip_tags($value);
//     return $value;
// }

/**
* @去除XSS（跨站脚本攻击）的函数
* @par $val 字符串参数，可能包含恶意的脚本代码如<script language="javascript">alert("hello world");</script>
* @return  处理后的字符串
* @Recoded By Androidyue
**/
function RemoveXSS($val) {  
   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed  
   // this prevents some character re-spacing such as <java\0script>  
   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs  
   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);  
 
   // straight replacements, the user should never need these since they're normal characters  
   // this prevents like <IMG SRC=@avascript:alert('XSS')>  
   $search = 'abcdefghijklmnopqrstuvwxyz'; 
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';  
   $search .= '1234567890!@#$%^&*()'; 
   $search .= '~`";:?+/={}[]-_|\'\\'; 
   for ($i = 0; $i < strlen($search); $i++) { 
      // ;? matches the ;, which is optional 
      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars 
 
      // @ @ search for the hex values 
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ; 
      // @ @ 0{0,7} matches '0' zero to seven times  
      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ; 
   } 
 
   // now the only remaining whitespace attacks are \t, \n, and \r 
   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base'); 
   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'); 
   $ra = array_merge($ra1, $ra2); 
 
   $found = true; // keep replacing as long as the previous round replaced something 
   while ($found == true) { 
      $val_before = $val; 
      for ($i = 0; $i < sizeof($ra); $i++) { 
         $pattern = '/'; 
         for ($j = 0; $j < strlen($ra[$i]); $j++) { 
            if ($j > 0) { 
               $pattern .= '(';  
               $pattern .= '(&#[xX]0{0,8}([9ab]);)'; 
               $pattern .= '|';  
               $pattern .= '|(&#0{0,8}([9|10|13]);)'; 
               $pattern .= ')*'; 
            } 
            $pattern .= $ra[$i][$j]; 
         } 
         $pattern .= '/i';  
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag  
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags  
         if ($val_before == $val) {  
            // no replacements were made, so exit the loop  
            $found = false;  
         }  
      }  
   }  
   return $val;  
}
//测试一下效果
//echo RemoveXSS("<script language='javascript'>alert('hello world');</script>") ;




//liuyan

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
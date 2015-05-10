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
		echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../webadmin/content.php';</script>";
	}elseif($url==-1){
    	echo"<script>alert('$message');history.go(-1);</script>";  
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
	for($j=0;$i<count($arr);$j++){

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
?>
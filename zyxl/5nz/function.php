<?php
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
?>
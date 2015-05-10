<?php
header("Content-type: text/html; charset=utf-8");
//读取当前文件目录
//echo getcwd() . "<br/>"; 
//echo dirname(__FILE__); 
echo getcwd() . "<br/>"; 
//改变为 images 目录
chdir("datas");
echo getcwd() . "<br/>"; 
//$filepath = dirname(__FILE__);
$filepath = getcwd();
if (is_dir ( $filepath )) {//判断是不是文件夹
    $ch = opendir ( $filepath );//打开文件夹的句柄
    if ($ch) {
        while ( ($filename = readdir ( $ch )) != false ) {//判断是不是有子文件或者文件夹
            $filetype = substr ( $filename, strripos ( $filename, "." ) + 1 );
            if ($filename == "counter"){
                exit();
            }else{
                if ($filetype == "txt" && is_file ( $filepath . "/" . $filename )) {
                //判断是不是以txt结尾并且是文件
                echo $filepath . "/" . $filename."内容如下:"."<br/>";
                $f = fopen ( $filepath . "/" . $filename, "r" );//打开文件
                while (! feof ( $f )) {//循环输出
                    $line = fgets ( $f );
                    echo  $line."<br />";
                }
                echo "<br />";
                fclose($f);
            }    
            }
            
        }
        closedir ( $ch );
    }
}
?>
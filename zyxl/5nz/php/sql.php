<?php
$dbhost='localhost';// 数据库服务器
$dbuser='root';// 数据库用户名
$dbpass='ckq888start';// 数据库密码

$dbname='xcxx1';// 数据库名
@mysql_pconnect($dbhost,$dbuser,$dbpass) or die("<div align='center'>不能连接服务器!</div>");
@mysql_select_db($dbname) or die("<div align='center'>不能选择数据库!</div>");
mysql_query("SET NAMES `UTF-8`");
header("Content-type: text/html; charset=utf-8");

?>

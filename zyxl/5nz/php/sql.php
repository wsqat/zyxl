<?php
$dbhost='localhost';// ���ݿ������
$dbuser='root';// ���ݿ��û���
$dbpass='ckq888start';// ���ݿ�����

$dbname='xcxx1';// ���ݿ���
@mysql_pconnect($dbhost,$dbuser,$dbpass) or die("<div align='center'>�������ӷ�����!</div>");
@mysql_select_db($dbname) or die("<div align='center'>����ѡ�����ݿ�!</div>");
mysql_query("SET NAMES `UTF-8`");
header("Content-type: text/html; charset=utf-8");

?>
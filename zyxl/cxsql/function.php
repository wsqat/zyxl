<?php
$host="localhost";
$db_user="root";//用户名
//$db_pass="";//密码
$db_pass="ckq888start";//密码
//$db_name="email";//数据库
//$timezone="Asia/Shanghai";
$link=mysql_connect($host,$db_user,$db_pass);
$db = mysql_connect('localhost','root','ckq888start') or die('can not connect to database');
//$db = mysql_connect('localhost','root','') or die('can not connect to database');
mysql_select_db('ahzy2015',$db) or die(mysql_error($db));
mysql_query("set names 'utf8'");	
//设置时区
date_default_timezone_set('Asia/Hong_Kong');
//关闭错误提示
//error_reporting(0);
header("Content-type:text/html;charset=utf-8");

$yxdm='3416010002';
//根据院校代码获取非五年制院校信息
function no5cxyx_xx_dm($yxdm) 
{ 
	$sql = "select * from yx_xx where dm= '".mysql_real_escape_string($yxdm)."'  ";
	$result = mysql_query($sql);
	$row=mysql_fetch_array($result);
	return $row;
} 
//获取非五年计划人数（根据院校代码）
function no5cxyx_renshu_dm($yxdm) 
{ 
	$a=0;
	$sql = "select * from yx_jh  where yxdm='".mysql_real_escape_string($yxdm)."' ";
    $result = mysql_query($sql);
        if($result&&mysql_num_rows($result)>0){
                while ($row = mysql_fetch_array($result)) {
                    $a=$a+$row['renshu'];
                    }
                }
            if($pstate!='1'){
                $a="更新中...";
            }
            else {
                $a=$a."人";
            }
    echo $a;
}

//获取非五年计划审核状态（根据院校代码）
function no5cxyx_jhstate_dm($yxdm) 
{ 
	$sql = "select * from contest_yx where yxdm= '".mysql_real_escape_string($yxdm)."'  ";
    $result = mysql_query($sql);
    $row=mysql_fetch_array($result);
    $pstate=$row['pstate'];
    return $pstate;
}      

?>
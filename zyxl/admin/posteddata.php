<?php
include_once "conn.php";
include_once "../php/function.php";
// require_once '../htmlpurifier/library/HTMLPurifier.includes.php';
// require_once '../htmlpurifier/library/HTMLPurifier.auto.php';

//$dirty_html = "<a href='introduction.php' class='btn btn-primary' role='button'>阅读使用说明</a>";
// $config = HTMLPurifier_Config::createDefault();
// $purifier = new HTMLPurifier($config);
// $clean_html = $purifier->purify($dirty_html);

error_reporting(0);
//echo $_POST["class_id"];
//招生计划，招生简章放在表 contest_yx 中
$yx_table = contest_yx;

if(!isset($_SESSION)){ session_start(); };

// print_r($_POST);
// echo $_SESSION["user_sch_id"];
// echo $_SESSION["user_id"];

//默认配置htmlpurifier
// $config = HTMLPurifier_Config::createDefault();
// $purifier = new HTMLPurifier($config);

//$clean_html = $purifier->purify($dirty_html);
$title = trim($_POST['title']);
//$title = $purifier->purify($title);
$title =  check_input(strip_tags($title));

$editor1 = trim($_POST['editor1']);
//$editor1 = $purifier->purify($editor1);
$editor1 =  check_input(strip_tags($editor1));
//echo "htmlpurifier";
//echo $title."<br>";
//echo $editor1."<br>";
//转义
//$editor1 = addslashes($editor1);
//echo $editor1."<br>";
//print_r($_POST);
if(!empty($_POST)){
	//print_r($_POST);
	if(trim($title)==""){
		//header("location:../webadmin/content.php");}	
		echo_message("标题不得为空！",-1);
		//echo "kong";
	}else{
		//过滤敏感词
		//print_r($_POST);
	 	//filter_arr($_POST);
		// 提交的编辑器内容使用
		// addslashes()来进行转义后再保存，
		// 展示时使用
		// stripslashes()先去除转义再来展示。
		//$title = addslashes($title);
		//$editor1 = addslashes($editor1);
		// print_r($_POST);
		// $title = RemoveXSS(trim($_POST['title']));
		// $editor1 = RemoveXSS(trim($_POST['editor1']));

		// echo "RemoveXSS";
		// echo $title."<br >";
		// echo $editor1."<br >";

		//echo stripslashes();
		$ptime = date('Y-m-d H:i:s');
		$article_author_id=$_SESSION["user_id"];
		$user_sch_id=$_SESSION["user_sch_id"];
		$class_id = $_POST["class_id"];
		

		if(!empty($class_id)){
			//每个学校只有一个招生简章和招生计划，否则覆盖
			if($_POST["class_id"]==3 || $_POST["class_id"]==4){
				$ssql = "select * from ".$yx_table." where article_author_id= ".$_SESSION["user_id"]." 
    			and class_id=".$_POST["class_id"]." order by article_id desc  "; 
    			$result = mysql_query($ssql);
    			if($result&&mysql_num_rows($result)>0){
    				$row = mysql_fetch_array($result);
    				$aid = $row["article_id"];
					$sql="update ".$yx_table." set article_title = '".$title."' , article_content = '".$editor1."' , article_time = '".$ptime."',state=1 where article_id = '".$aid."' ";
			        mysql_query($sql);
					//mysql_query($query , $db) or die(mysql_error($db));
							
					if(mysql_affected_rows()){
						//echo "success";
						mysql_close();
						echo_message("信息更新成功！",1);
					}else{
						//echo "failed";
						echo_message("信息更新失败！",-1);
					}

    			}else{
					$query = 'insert into '.$yx_table.'(class_id,article_title,article_content,article_time,article_author_id,yxdm,state) values ("'.trim($_POST["class_id"]).'","'.$title.'",
					"'.$editor1.'","'.$ptime.'","'.$article_author_id.'","'.$user_sch_id.'",0)';		
				}
			}else{
					$query = 'insert into contest1(class_id,article_title,article_content,article_time,article_author_id,sch_id,state) values ("'.trim($_POST["class_id"]).'","'.$title.'",
					"'.$editor1.'","'.$ptime.'","'.$article_author_id.'","'.$user_sch_id.'",1)';
					//echo $query;		
			}
				//echo "sssss";
				mysql_query($query);

				if(mysql_affected_rows()){
					//echo "success";
					mysql_close();
					echo_message("信息发布成功！",1);
				}else{
					//echo "failed";
					echo_message("信息发布失败！",-1);
				}
		}
		

	}
	

	
 	
}else{
	echo_message("内容不得为空！",-2);
}

?>



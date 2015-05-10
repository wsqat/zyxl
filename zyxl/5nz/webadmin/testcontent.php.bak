<?php
header("Content-type: text/html; charset=utf-8");


include_once "../admin/conn.php"; 

$sql = 'select * from contest1';
    $result = mysql_query($sql);
    if($result&&mysql_num_rows($result)>0){
    	while ($row = mysql_fetch_array($result)) {
    		$id = $row["article_id"];
    		$title = $row["article_title"];
    		//$content = $row["article_content"];
    		$time = $row["article_time"];
			$state=$row['state'];


			if($row['state']==1){
						  echo "<tr><td><input type='checkbox' name='id' value=".$row['article_id']." /></td><td><a class='button border-blue button-little' > 已发布 </a></td><td>".$row['article_title']."</td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='#'>修改</a> <a class='button border-yellow button-little' href='#' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}
						if($row['state']==0){
						  echo "<tr><td><input type='checkbox' name='id' value=".$row['article_id']." /></td><td><a class='button border-blue button-little' > 审核中 </a></td><td>".$row['article_title']."</td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='#'>修改</a> <a class='button border-yellow button-little' href='#' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}

    		
    	}
    }

	

	mysql_close();

						
          
            ?>

<?php
	   if(!isset($_SESSION)){ session_start(); };
	   error_reporting(0);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<html>
<head>
	<meta charset="utf-8">
	<title>Replace Textareas by Class Name &mdash; CKEditor Sample</title>
	<link rel="stylesheet" href="ckeditor/_samples/sample.css">
	<style type="text/css">
		tr td{
			border:1px solid #000;
		}
	</style>
	</head>

	<body>
	<table style="border:1px solid #000;">


</table>
</body>
</html>


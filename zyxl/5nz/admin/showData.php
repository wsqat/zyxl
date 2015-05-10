
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

<?php
include_once "conn.php"; 	
	//过滤敏感词
 	//filter_arr($_POST);
	// 提交的编辑器内容使用
	// addslashes()来进行转义后再保存，
	// 展示时使用
	// stripslashes()先去除转义再来展示。
 	// $title = addslashes(trim($_POST['title']));
	// $editor1 = addslashes(trim($_POST['editor1']));
	// $ptime = date('Y-m-d H:i:s');
	

	$sql = 'select * from contest1';
    $result = mysql_query($sql);
    if($result&&mysql_num_rows($result)>0){
    	while ($row = mysql_fetch_array($result)) {
    		$id = $row["article_id"];
    		$title = $row["article_title"];
    		$content = $row["article_content"];
    		$time = $row["article_time"];

    		echo "<tr><td>".$id."</td><td>".$title."</td><td>".$content."</td><td>".$time."</td></tr>";
    	}
    }else{
    	echo "string";
    }

	

	mysql_close();
 	

?>
</table>
</body>
</html>


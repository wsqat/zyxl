<?php


session_start();
if($_SESSION["login"]==true)
    {
    $user_name=$_SESSION["user_name"];
    }
    else {
    header("location:index.php");
    }


//文章预览
include_once "admin/conn.php"; 
//数据库名称列表
$table_article_id='article_id';//文章id数据库名称
$table_article_title='article_title';//文章标题
$table_article_content='article_content';//文章内容
$table_article_time='article_time';//文章发布时间
$table_state='state';//文章可见性



$article_id=$_GET["articleid"];
$article_id=(int)$article_id;  
    //过滤敏感词
    //filter_arr($_POST);
    // 提交的编辑器内容使用
    // addslashes()来进行转义后再保存，
    // 展示时使用
    // stripslashes()先去除转义再来展示。
    // $title = addslashes(trim($_POST['title']));
    // $editor1 = addslashes(trim($_POST['editor1']));
    // $ptime = date('Y-m-d H:i:s');
    

    $sql = "select * from ".$contest1_table." where ".$table_article_id."= ".$article_id."   ";
	//echo $sql;
    $result = mysql_query($sql);
    if($result&&mysql_num_rows($result)>0){

        while ($row = mysql_fetch_array($result)) {
            $title = $row[$table_article_title];
            $content = $row[$table_article_content];
            $time = $row[$table_article_time];
            $state = $row[$table_state];
        }
    }
    mysql_close();
    

?>











<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Head Navbar -->
<!-- Body Main -->
<div class="container" >
    <div class="jumbotron">
        <img src="images/hfutphoto1.jpg" alt="合肥工业大学--千寻网" id="bg">

    </div>

    


    <div style="text-align:center;">
    <h1 style="font-family:verdana"><?php echo $title; ?></h1>
    </div>
    <hr>


    <div >
    <?php
     echo $content; 
    ?>
    </div>
    
        
                
            
           
</div>


<!-- Footer -->
<div class="container-fluid" id="bottom">
    <p>Copyright 2014 <span><a href="index.php">123</a></span> 版权所有 
    &nbsp;&nbsp;&nbsp;&nbsp;
    <?php
        include_once "counter.php";
    ?>
    </p>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>
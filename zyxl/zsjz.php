<?php
include_once "admin/cxcon.php"; 
error_reporting(0);
//数据库名称列表
$table_article_id='article_id';//文章id数据库名称
$table_article_title='article_title';//文章标题
$table_article_content='article_content';//文章内容
$table_article_time='article_time';//文章发布时间
$table_state='state';//文章可见性
$table_sch_id='sch_id';//文章来源学校
$table_class_id='class_id';//文章类别
//参数
$avaiable=1;//文章可见时$table_state的值
$avaiableclass=3;//招生简介分类类别

$getschool_id=$_GET["schoolid"];
//$getschool_id=(int)$getschool_id;  
$getschool_id=mysql_real_escape_string($getschool_id); 
$getschool_id=trim($getschool_id); 
    //过滤敏感词
    //filter_arr($_POST);
    // 提交的编辑器内容使用
    // addslashes()来进行转义后再保存，
    // 展示时使用
    // stripslashes()先去除转义再来展示。
    // $title = addslashes(trim($_POST['title']));
    // $editor1 = addslashes(trim($_POST['editor1']));
    // $ptime = date('Y-m-d H:i:s');
    

    $sql = "select * from contest_yx where yxdm = ".$getschool_id." and  ".$table_class_id."= ".$avaiableclass." ";
    $result = mysql_query($sql);
    if($result&&mysql_num_rows($result)>0){

        while ($row = mysql_fetch_array($result)) {
            $title = $row[$table_article_title];
            $content = $row[$table_article_content];
            $time = $row[$table_article_time];
            $state = $row[$table_state];
        }
    }
    else {
        $content="更新中...";
        $title = "更新中...";
    }
    if($state!=$avaiable)
    {   
        $content="更新中...";
        $title = "更新中...";
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
        <img src="images/ahzcj.jpg" alt="安徽" id="bg">
        <h1>
         </h1>
    <br></br>
    

        <p>
           
        </p>

        

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
<?php require("footer.php");?>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>
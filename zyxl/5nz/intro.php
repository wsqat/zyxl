<?php
header("Content-type: text/html; charset=utf-8");
if($_GET["schoolid"]=="")
	{
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>网址导航</title>
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
<?php
//include_once "php/header.php";
//echo __FILE__;

?>
<!-- Body Main -->
<div class="container">
    <div class="jumbotron">
        <img src="images/hfutphoto1.jpg" alt="合肥工业大学--千寻网" id="bg">

    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1 class="panel-title">Hi!亲们：</h1>
                </div>
                <div class="panel-body">
                    <Iframe src="http://www.hfut.edu.cn/" width="341" height="372" frameborder="0" name="I1">
                    </iframe>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#home" role="tab" data-toggle="tab">区块1</a></li>
                <li class=""><a href="#profile" role="tab" data-toggle="tab">区块2</a></li>
                <li class=""><a href="#profile1" role="tab" data-toggle="tab">区块3</a></li>
                <li class=""><a href="#profile2" role="tab" data-toggle="tab">区块4</a></li>
                <li class="dropdown">
                    <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">查看更多
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                        <li class=""><a role="menuitem" tabindex="-1" href="zhao_info.php">更多招领信息</a></li>
                        <li class=""><a role="menuitem" tabindex="-1" href="shi_info.php">更多失物信息</a></li>
                    </ul>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <table class="table table-hover table-responsive">
                       
                        <tbody>
                      <?php
        
            $menu="admin.txt";
        
            
        ?>
  

    
        <?php
        //禁用错误报告
error_reporting(0);

//        header("Content-type: text/html; charset=utf-8");



    if(!$_GET["page"])                          //如果没有参数page
        $page=1;                                    //则显示第一页内容
    else
        $page=$_GET["page"];                        //如果带有参数page则显示相应页内容

    $list_num = 10;
//echo $menu;
//读取当前文件目录
//echo getcwd() . "<br/>"; 
//echo dirname(__FILE__); 
//echo getcwd() . "<br/>"; 
//改变为 images 目录
chdir("datas");
//echo getcwd() . "<br/>"; 
//$filepath = dirname(__FILE__);
$filepath = getcwd();
if (is_dir ( $filepath )) {//判断是不是文件夹
    $ch = opendir ( $filepath );//打开文件夹的句柄
    if ($ch) {
        while ( ($filename = readdir ( $ch )) != false ) {//判断是不是有子文件或者文件夹
 
            $filetype = substr ( $filename, strripos ( $filename, "." ) + 1 );
 
            if ($filetype == "txt" && is_file ( $filepath . "/" . $filename )) {
            //判断是不是以txt结尾并且是文件

                if($filename == $menu){

                    $file = $filepath . "/" . $filename;

                    $myfile=file($file);                       //使用file()函数把所有信息读入一个数组
                    if($myfile[0]=="")                          //如果文件为空，即没有任何留言信息
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;目前记录条数为：0";                   //显示没有记录的信息
                    else
                    {
                        $temp=explode("||",$myfile[0]);             //读出数组第一条记录到数组 
                        $total= 12;
                        //echo $temp[0];
                        //echo intval($temp[0]);
                        //$list_nums=10;
                        //读出该数组第一个元素（代表记录总条数）
                        //echo ceil($total/$list_num);
                        //echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                        //echo "每页显示".$list_num."条记录";                //输入总页数
                        //echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                        $p_count=ceil($temp[0]/$list_num);          
                        //计算总页数为记录总条数除以每页显示条数
                        //echo (float)($temp[0]."/".$list_num);
                        //echo ceil($temp[0]."/".$list_num);
                        if($p_count < 1){
                            //echo "分1页显示";                //输入总页数    
                        }else{
                            //echo "分".$p_count."页显示";                //输入总页数    
                        }
                        
                       // echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                       // echo "当前显示第".$page."页";             //当前页
                        if($page!=ceil($temp[0]/$list_num))         //如果当前页不是最后一页
                            $current_size=$list_num;                    
                            //当前页最多可显示$list_num条记录
                        else                                    //如果当前页是最后一页
                            $current_size=$temp[0]%$list_num;           
                            //当前页显示的条数为总条数除以$lsit_num的余数
                        if($current_size==0)
                            $current_size=$list_num;                    //如果正好是显示条数的倍数则显示$list_num条内容
                        
                        for($i=0;$i<$current_size;$i++)
                        {
                            $temp=explode("||",$myfile[($page-1)*$list_num+$i]);//把相应的记录按“||”分割到数组          echo "<tr>";
                     
                        }

                    $content = file_get_contents($file); //读取文件中的内容
                    //echo $content;
                    //echo $_GET["parentid"];
                    $array = explode("||", $content);
                    	$ai=0;
                        $arrs = explode("--", $content);
                        for($i=0;$i<count($arrs);$i++){
                            $arr = explode('||',$arrs[$i]);

                            $ai=$ai+1;

                            

                            $page001=($page-1)*10+1;
                            $page002=$page*10;


                            $last=$totalhref-($page-1)*10;
                            $first=$totalhref-$page*10+1;
                            if($ai>=$page001&$ai<=$page002){
                            	echo " <tr><td><a href='".$arr[2]."' target='_blank'>".$arr[1]."</a></td></tr>";
                            }

                              
                        

                    }
                }
            }
            
       
            }
            
        }
        closedir ( $ch );
    }
}
        ?>
   

         <?php



         //以下内容为分页显示连接
            $prev_page=$page-1;                             //前一页
            $next_page=$page+1;                             //下一页
            if ($page<=1)
            {
                // echo "<a href='#'>第一页 </a>| ";
                //echo "第一页 | ";
            }
            else
            {
                //echo "<a href='$PATH_INFO?page=1'>第一页</a> | ";
            }
            if ($prev_page<1)
            {
               // echo "上一页 | ";
            }
            else
            {
               // echo "<a href='$PATH_INFO?page=$prev_page'>上一页</a> | ";
            }
            if ($next_page>$p_count)
            {
                //echo "下一页 | ";
            }
            else
            {
                //echo "<a href='$PATH_INFO?page=$next_page'>下一页</a> | ";
            }
            if ($page>=$p_count)
            {
                //echo "最后一页</p>\n";
            }
            else
            {
                //echo "<a href='$PATH_INFO?page=$p_count'>最后一页</a></p>\n";
            }
         ?>

              
                        
                        
                        </tbody>
                    </table>
                    <div class="inline pull-right page">
                         <!-- 共<?php echo $i;?> 条记录 <?php echo $curpage;?>/<?php if($i/$pageSize< 1){ echo "1";}else{ echo $countPage; }
                         ?> 页  

                        <a href="index.php?page=1">首页</a>
                        <?php if ($curpage != 1) {?>
                            <a href="index.php?page=<?php 
                            echo $curpage - 1;?>">上一页</a>
                        <?php }?>
                        <?php 
                            if ($curpage < ((int)$i/$pageSize)  ) {
                        ?>
                            <a href="index.php?page=<?php 
                            echo $curpage + 1;?>">下一页</a>
                        <?php 
                            }
                            
                            
                        ?>
 -->
                        
                        <a class="btn btn-default" role="button" href="#">首页</a>
                        <?php 
                        echo "<a class='btn btn-default' role='button' href='index.php?page=$prev_page'>上一页</a>  ";?>
                        <?php 
                        echo "<a class='btn btn-default' role='button' href='index.php?page=$next_page'>下一页</a>  ";?>
                        <a class="btn btn-default" role="button" href="index.php?page=<?php echo $countPage;?>">尾页</a>

                        
                </div>

                </div>
                <div class="tab-pane fade" id="profile">
                    <table class="table table-hover table-responsive">
                        
                        <tbody>





<?php
include_once "admin/conn.php"; 
//echo "ddd".$_SESSION["user_id"];
$sql = "select * from contest1 where sch_id=".$_GET[schoolid]." and class_id=0 and state=1 order by sch_id desc  ";
//$sql = "select * from sch where article_author_id= ".$_SESSION["user_id"]." order by article_id desc  ";
$result = mysql_query($sql);
$i=0;
if($result&&mysql_num_rows($result)>0){
while ($row = mysql_fetch_array($result)) {
    		$article_id = $row["article_id"];
    		$article_title = $row["article_title"];
			$i++;		
			if(($i%2)==1){
						  echo "<tr>
                            <td><a href='#'>".$article_title."</a></td>
                            
                        </tr>";}
			else {
						  echo "<tr  class='info'>
                            <td><a href='#'>".$article_title."</a></td>
                            
                        </tr>";}

    		
    	}
    }

	

	mysql_close();

						
          
            ?>




                        
                        
                        </tbody>
                    </table>
                    <div class="inline pull-right page">
                         <!-- 共<?php echo $i;?> 条记录 <?php echo $curpage;?>/<?php if($i/$pageSize< 1){ echo "1";}else{ echo $countPage; }
                         ?> 页  

                        <a href="index.php?page=1">首页</a>
                        <?php if ($curpage != 1) {?>
                            <a href="index.php?page=<?php 
                            echo $curpage - 1;?>">上一页</a>
                        <?php }?>
                        <?php 
                            if ($curpage < ((int)$i/$pageSize)  ) {
                        ?>
                            <a href="index.php?page=<?php 
                            echo $curpage + 1;?>">下一页</a>
                        <?php 
                            }
                            
                            
                        ?>
 -->
                        
                        <a class="btn btn-default" role="button" href="#">首页</a>
                        <a class="btn btn-default" role="button" href="#">上一页</a>
                        <a class="btn btn-default" role="button" href="#">下一页</a>
                        <a class="btn btn-default" role="button" href="index.php?page=<?php echo $countPage;?>">尾页</a>

                        
                </div>
                </div>

                <!-- 新闻栏目 -->
                <div class="tab-pane fade" id="profile1">
                    <table class="table table-hover table-responsive">
                       
                        <tbody>
                        <tr>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                        </tr>
                        <tr class="info">
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                        </tr>
                          
                        </tbody>
                    </table>
                </div>


                <!-- 游戏栏目 -->
                <div class="tab-pane fade" id="profile2">
                    <table class="table table-hover table-responsive">
                        <!-- <thead>
                        <tr>
                            <th>类型</th>
                            <th>名称</th>
                            <th>地点</th>
                            <th>时间</th>
                            <th>详情</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                        </thead> -->
                        <tbody>
                        <tr>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                        </tr>
                        <tr class="info">
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                            <td><a href="#">优酷网</a></td>
                        </tr>
                          
                        
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
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
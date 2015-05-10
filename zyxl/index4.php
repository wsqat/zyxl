﻿<?php
//数据库字段
	$sch_table='yxdmb';
    $table_article_id='article_id';       //文章id
    $table_article_title='article_title'; //文章标题
    $table_class_id='class_id';//文章类别id
    $table_sch_id='FYXDM';//学校唯一id
    $table_sch_name='FYXMC';//学校名称
    $table_state='state';//文章状态
    $table_dsdm='FDSDM';
    $table_dsmc='FDSMC';
    $dsdmb_table='dsdmb';
    $Fyxwzdm_table='Fyxwzdm';//院校位置代码
    $Fyxgw_table ='FYXWZ';//院校网站
    $zy_table='xx_zy';//专业表
//变量控制
    $articlestate=1;         //文章可见$table_state值
    $newsarticletypeid=2;   //首页通知公告id
    $indexarticletypeid=1;    //首页最新资讯id
    $num=10;                //学校列表每页显示条数
    $indexnum=10;           //最新资讯每页显示10条数据
    $index0num=13;          //通知公告显示条数
    $page=isset($_GET['page'])?intval($_GET['page']):1;
    $indexpage=isset($_GET['indexpage'])?intval($_GET['indexpage']):1;
    $index0page=isset($_GET['index0page'])?intval($_GET['index0page']):1;
    $placepage=isset($_GET['placepage'])?intval($_GET['placepage']):1;
    $place2page=isset($_GET['place2page'])?intval($_GET['place2page']):1;
    $getplaceid = isset($_GET["placeid"])?$_GET["placeid"]:"";
    $getplacename = isset($_GET["placename"])?$_GET["placename"]:"";
    if($getplaceid!=''&$getplaceid!='index')
        $getplaceid=isset($_GET['placeid'])?intval($_GET['placeid']):1;
    //echo $getplaceid;
    
?>


<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>安徽</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
        <img src="images/ahzcj.jpg" alt="安徽" id="bg">
        <h1>
         </h1>
	<br></br>
	

        <p>
           
        </p>

        

    </div>
    <div class="row">

        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1 class="panel-title">通知公告</h1>
                </div>
				
                <div class="panel-body">


                     <table class="table table-hover table-responsive">
                        <tbody>
                        
        <?php
        //禁用错误报告
        error_reporting(0);
        //header("Content-type: text/html; charset=utf-8");
        ?>





        <?php

            //首页通知公告
        header("Content-type: text/html; charset=utf-8");
        include_once "admin/conn.php"; 
        $sql = "select * from ".$contest1_table." where ".$table_state."=".$articlestate." and ".$table_class_id."=".$newsarticletypeid." order by ".$table_article_id." desc  ";
        $index0total=mysql_num_rows(mysql_query($sql));  //获取文章总记录数
        //echo $index0total;
        $index0pagenum=ceil($index0total/$index0num);      //获得文章总页数 pagenum
        //echo $index0pagenum;
        //页面参数检测
            if($index0pagenum==0){
                echo "暂时无文章";
             }
            else if($index0page>$index0pagenum || $index0page == 0){
                Echo "Error : Can Not Found The page .";
                $index0page=1;
            //Exit;
            }
        $index0prev_page=$index0page-1;
        $index0next_page=$index0page+1;
        $off0set=($index0page-1)*$index0num;
        $sql = "select * from ".$contest1_table."  where ".$table_state."=".$articlestate." and ".$table_class_id."=".$newsarticletypeid."  order by ".$table_article_id." desc   limit $off0set,$index0num ";
        $result = mysql_query($sql);
        $i=0;//判断奇偶行
        if($result&&mysql_num_rows($result)>0){
            while ($row = mysql_fetch_array($result)) {
                $article_id = $row[$table_article_id];
                $article_title = $row[$table_article_title];
                $i++;       
                if(($i%2)==1){
                          echo "<tr>
                            <td><a href='article.php?articleid=".$article_id."' target='_blank'>".$article_title."</a></td>
                        </tr>";}
                    else {
                          echo "<tr>
                            <td><a href='article.php?articleid=".$article_id."' target='_blank'>".$article_title."</a></td>        
                        </tr>";
                    }
                }
            }
        //mysql_close();
        ?>
                        </tbody>
                    </table> 



            <div class="inline pull-right page">
                          共<?php echo $index0pagenum;?>页 &nbsp;当前第<?php echo $index0page; 
                         ?>页  

                     
                        <?php
                        if($index0page!=1){
                            echo "<a class='btn btn-default' role='button' href='index.php?index0page=1'>首页</a>";
                        }

                        
                        ?>

                         <?php
                        if($index0page>1)
                        echo "<a class='btn btn-default' role='button' href='index.php?index0page=".$index0prev_page."'>上一页</a>";
                        ?>

                        <?php
                        if($index0page<$index0pagenum)
                        echo "<a class='btn btn-default' role='button' href='index.php?index0page=".$index0next_page."'>下一页</a>";
                        ?>
                        <?php
                        if($index0page<$index0pagenum)
                        echo "<a class='btn btn-default' role='button' href='index.php?index0page=".$index0pagenum."'>尾页</a>";
                        ?>
                    </div>



                </div>
            </div>
        </div>

       


        <div class="col-lg-8">

            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li class="<?php 
                                if(!$_GET['schoolname'])
                                    if(!$_GET['placeid'])
                                        if(!$_GET['placename'])
                                            echo  "active"; ?>"><a href="#home" target="_blank" role="tab" data-toggle="tab">最新资讯</a></li>
                
                <li class=""><a href="#profile2" role="tab" data-toggle="tab">专业查询(非五年制)</a></li>
                <li class=""><a href="#profile4" role="tab" data-toggle="tab">地区查询(非五年制)</a></li>
                <li class=""><a href="jiansuo" role="tab" >检索</a></li>
                 <li class=""><a href="jiansuo" role="tab"  class="btn btn-primary" style=" font-size:18px;">在线报名</a></li>
            </ul>


            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade <?php if(!$_GET['schoolname']&!$_GET['placeid']&!$_GET['placename']) echo  "active in"; ?>" id="home">
                    <table class="table table-hover table-responsive">
                        <tbody>
        <?php
        //禁用错误报告
        error_reporting(0);
        //header("Content-type: text/html; charset=utf-8");
        ?>





        <?php

            //首页最新资讯
        header("Content-type: text/html; charset=utf-8");
        include_once "admin/conn.php"; 
        $sql = "select * from ".$contest1_table." where ".$table_state."=".$articlestate." and ".$table_class_id."=".$indexarticletypeid." order by ".$table_article_id." desc  ";
            $indextotal=mysql_num_rows(mysql_query($sql));  //获取文章总记录数
            $indexpagenum=ceil($indextotal/$indexnum);      //获得文章总页数 pagenum

        //页面参数检测
            if($indexpagenum==0){
                echo "暂时无文章";
             }
            else if($indexpage>$indexpagenum || $indexpage == 0){
                Echo "Error : Can Not Found The page .";
                $indexpage=1;
            //Exit;
            }
        $indexprev_page=$indexpage-1;
        $indexnext_page=$indexpage+1;
        $offset=($indexpage-1)*$indexnum;
        if(!$_GET["schoolid"]) 
            $sql = "select * from ".$contest1_table."  where ".$table_state."=".$articlestate." and ".$table_class_id."=".$indexarticletypeid."  order by ".$table_article_id." desc   limit $offset,$indexnum ";
        else{
            $school_id=$_GET["schoolid"];
            $sql = "select * from ".$contest1_table." where ".$table_sch_id."=".$school_id."  and  ".$table_state."=".$articlestate." and ".$table_class_id."=".$indexarticletypeid."  order by ".$table_article_id." desc  limit $offset,$indexnum  ";}
            $result = mysql_query($sql);
            $i=0;//判断奇偶行
            if($result&&mysql_num_rows($result)>0){
                while ($row = mysql_fetch_array($result)) {
                    $article_id = $row[$table_article_id];
                    $article_title = $row[$table_article_title];
                    $i++;       
                    if(($i%2)==1){
                          echo "<tr>
                            <td><a href='article.php?articleid=".$article_id."' target='_blank'>".$article_title."</a></td>
                        </tr>";}
                    else {
                          echo "<tr  >
                            <td><a href='article.php?articleid=".$article_id."' target='_blank'>".$article_title."</a></td>        
                        </tr>";
                    }
                }
            }
        //mysql_close();
        ?>
 
                        
                        
                        </tbody>
                    </table>
                    <div class="inline pull-right page">
                          共<?php echo $indexpagenum;?>页 &nbsp;当前第<?php echo $indexpage; 
                         ?>页  

                     
                        <?php
                        if($indexpage!=1)
                        echo "<a class='btn btn-default' role='button' href='index.php?indexpage=1'>首页</a>";
                        ?>

                         <?php
                        if($indexpage>1)
                        echo "<a class='btn btn-default' role='button' href='index.php?indexpage=".$indexprev_page."'>上一页</a>";
                        ?>

                        <?php
                        if($indexpage<$indexpagenum)
                        echo "<a class='btn btn-default' role='button' href='index.php?indexpage=".$indexnext_page."'>下一页</a>";
                        ?>
                        <?php
                        if($indexpage<$indexpagenum)
                        echo "<a class='btn btn-default' role='button' href='index.php?indexpage=".$indexpagenum."'>尾页</a>";
                        ?>
                    </div>
                </div>


                <div class="tab-pane fade <?php if($_GET['schoolname']) echo  "active in"; ?>" id="profile">
                    <table class="table table-hover table-responsive"  >
                        
                        <tbody>


                        <tr  border="0">
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=index'>全部</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=a'>A</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=b'>B</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=c'>C</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=d'>D</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=e'>E</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=f'>F</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=g'>G</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=h'>H</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=j'>J</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=k'>K</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=l'>L</a></td>
                            
                        </tr>
                            <tr  border="0">
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=m'>M</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=n'>N</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=o'>O</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=p'>P</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=q'>Q</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=r'>R</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=s'>S</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=t'>T</a></td>
                           
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=w'>W</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=x'>X</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=y'>Y</a></td>
                            <td><a class="btn btn-default" role="button"   href='index.php?schoolname=z'>Z</a></td>

                        </tr>
                        </tr>
                        </tbody>
                        </table>

						

<table class="table table-hover table-responsive">
    <tbody>


<?php

	
    header("Content-type: text/html; charset=utf-8");
	if(!$_GET['schoolname'])
		$sql = "select * from ".$sch_table." order by  convert(FYXMC using gbk) asc;  ";
    else if($_GET['schoolname']=='index')
        $sql = "select * from ".$sch_table." order by  convert(FYXMC using gbk) asc;  ";
	else if($_GET['schoolname']=='a')
	    $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 45217 and 45252;  ";
    else if($_GET['schoolname']=='b')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 45253 and 45760;  ";
    else if($_GET['schoolname']=='c')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 45761 and 46317;  ";
    else if($_GET['schoolname']=='d')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 46318 and 46825;  ";
    else if($_GET['schoolname']=='e')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 46826 and 47009;  ";
    else if($_GET['schoolname']=='f')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 47010 and 47296;  ";
    else if($_GET['schoolname']=='g')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 47297 and 47613;  ";
    else if($_GET['schoolname']=='h')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 47614 and 48118;  ";
    else if($_GET['schoolname']=='j')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 48119 and 49061;  ";
    else if($_GET['schoolname']=='k')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 49062 and 49323;  ";
    else if($_GET['schoolname']=='l')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 49324 and 49895;  ";
    else if($_GET['schoolname']=='m')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 49896 and 50370;  ";
    else if($_GET['schoolname']=='n')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 50371 and 50613;  ";
    else if($_GET['schoolname']=='o')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 50614 and 50621;  ";
    else if($_GET['schoolname']=='p')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 50622 and 50905;  ";
    else if($_GET['schoolname']=='q')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 50906 and 51386;  ";
    else if($_GET['schoolname']=='r')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 51387 and 51445;  ";
    else if($_GET['schoolname']=='s')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 51446 and 52217;  ";
    else if($_GET['schoolname']=='t')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 52218 and 52697;  ";
    else if($_GET['schoolname']=='w')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 52698 and 52979;  ";
    else if($_GET['schoolname']=='x')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 52980 and 53688;  ";
    else if($_GET['schoolname']=='y')
            $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 53689 and 54480;  ";
    else if($_GET['schoolname']=='z')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 54481 and 55289;  ";
    else{
        Echo "Error : 非法参数 .";
        Exit;
    }

    $total=mysql_num_rows(mysql_query($sql)); //查询数据的总数total
    $pagenum=ceil($total/$num);  //获得总页数 pagenum
    //假如传入的页数参数apge 大于总页数 pagenum，则显示错误信息
    If($page>$pagenum || $page == 0){
       Echo "暂无数据.";
       //Exit;
   }
    $offset=($page-1)*$num;

    $prev_page=$page-1;                             //前一页
    $next_page=$page+1;                             //下一页



    if(!$_GET['schoolname'])
        $sql = "select * from ".$sch_table." order by  convert(FYXMC using gbk) asc limit $offset,$num;  ";
    if($_GET['schoolname']=='index')
        $sql = "select * from ".$sch_table." order by  convert(FYXMC using gbk) asc limit $offset,$num;  ";
    if($_GET['schoolname']=='a')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 45217 and 45252 limit $offset,$num;  ";
    if($_GET['schoolname']=='b')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 45253 and 45760 limit $offset,$num;  ";
    if($_GET['schoolname']=='c')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 45761 and 46317 limit $offset,$num;  ";
    if($_GET['schoolname']=='d')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 46318 and 46825 limit $offset,$num;  ";
    if($_GET['schoolname']=='e')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 46826 and 47009 limit $offset,$num;  ";
    if($_GET['schoolname']=='f')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 47010 and 47296 limit $offset,$num;  ";
    if($_GET['schoolname']=='g')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 47297 and 47613 limit $offset,$num;  ";
    if($_GET['schoolname']=='h')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 47614 and 48118 limit $offset,$num;  ";
    if($_GET['schoolname']=='j')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 48119 and 49061 limit $offset,$num;  ";
     if($_GET['schoolname']=='k')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 49062 and 49323  limit $offset,$num;  ";
     if($_GET['schoolname']=='l')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 49324 and 49895 limit $offset,$num;  ";
     if($_GET['schoolname']=='m')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 49896 and 50370 limit $offset,$num;  ";
     if($_GET['schoolname']=='n')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 50371 and 50613 limit $offset,$num;  ";
     if($_GET['schoolname']=='o')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 50614 and 50621 limit $offset,$num;  ";
    if($_GET['schoolname']=='p')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 50622 and 50905 limit $offset,$num;  ";
    if($_GET['schoolname']=='q')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 50906 and 51386 limit $offset,$num;  ";
    if($_GET['schoolname']=='r')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 51387 and 51445 limit $offset,$num;  ";
      if($_GET['schoolname']=='s')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 51446 and 52217 limit $offset,$num;  ";
      if($_GET['schoolname']=='t')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 52218 and 52697 limit $offset,$num;  ";
     if($_GET['schoolname']=='w')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 52698 and 52979 limit $offset,$num;  ";
        if($_GET['schoolname']=='x')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 52980 and 53688 limit $offset,$num;  ";
        if($_GET['schoolname']=='y')
            $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 53689 and 54480 limit $offset,$num;  ";

    if($_GET['schoolname']=='z')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(FYXMC USING gbk),1)),16,10) between 54481 and 55289 limit $offset,$num;  ";



	//echo $_GET['schoolname'];
    if($_GET['schoolname']!='index')
        echo "<tr  class='info'><td><a href='#'>以字母".$_GET['schoolname']."检索</a></td><td>共".$total."个学校</td><td></td></tr>"; 
    else echo "<tr  class='info'><td><a href='#'>以汉语拼音首字母排序</a></td><td></td><td>共".$total."个学校</td><td></td></tr>"; 


    $result = mysql_query($sql);
    $i=0;
    if($result&&mysql_num_rows($result)>0){
        while ($row = mysql_fetch_array($result)) {
    		$sch_id = $row[$table_sch_id];
			//echo $sch_id;
    		$sch_name = $row[$table_sch_name];
            //$guanwang = $row[$Fyxgw_table];
           	
           	$guanwang = $row[$Fyxgw_table];
            //echo $guanwang;
            //echo $sch_id;
            //echo $sch_name;
			$i++;		
			if(($i%2)==1){
						  echo "<tr>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            
                            <td><a href='zsjz.php?schoolid=".$sch_id."' target='_blank'>招生简章</a></td>
                            <td><a href='zsjh.php?schoolid=".$sch_id."' target='_blank'>招生计划</a></td>
                        </tr>"; 
                        }
			else {
						  echo "<tr  class='info'>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            
                            <td><a href='zsjz.php?schoolid=".$sch_id."' target='_blank'>招生简章</a></td>
                            <td><a href='zsjh.php?schoolid=".$sch_id."' target='_blank'>招生计划</a></td>
                        </tr>"; }

    		
    	}
    }
    //mysql_close();
?>





                        
                        
                        </tbody>
                    </table>
                    <div class="inline pull-right page">
                          共<?php echo $pagenum;?>页 &nbsp;当前第<?php echo $page; 
                         ?>页  

                     
                        <?php
                        if($page!=1)
                        echo "<a class='btn btn-default' role='button' href='index.php?schoolname=".$_GET['schoolname']."&page=1'>首页</a>";
                        ?>

                         <?php
                        if($page>1)
                        echo "<a class='btn btn-default' role='button' href='index.php?schoolname=".$_GET['schoolname']."&page=".$prev_page."'>上一页</a>";
                        ?>

                        <?php
                        if($page<$pagenum)
                            if($_GET['schoolname']=='')
                                echo "<a class='btn btn-default' role='button' href='index.php?schoolname=index&page=".$next_page."'>下一页</a>";
                                else
                                    echo "<a class='btn btn-default' role='button' href='index.php?schoolname=".$_GET['schoolname']."&page=".$next_page."'>下一页</a>";


                        ?>
                        <?php
                        if($page<$pagenum)
                            if($_GET['schoolname']=='')
                                echo "<a class='btn btn-default' role='button' href='index.php?schoolname=index&page=".$pagenum."'>尾页</a>";
                            else
                                echo "<a class='btn btn-default' role='button' href='index.php?schoolname=".$_GET['schoolname']."&page=".$pagenum."'>尾页</a>";
                        ?>
                       

                        
                </div>
                </div>

                <!-- 按地区查询 -->
                <div class="tab-pane fade <?php if($_GET['placeid']) echo  "active in"; ?>" id="profile1">
                    <table class="table table-hover table-responsive">
                       
                        <tbody>


<?php
                        
        $sql = "select * from ".$dsdmb_table."   ";
        $result = mysql_query($sql);
        $i=0;//判断奇偶行
        if($result&&mysql_num_rows($result)>0){
        while ($row = mysql_fetch_array($result)) {
            $sqlplaceid = $row[$table_dsdm];
            //echo $sch_id;
            $sqlplacename = $row[$table_dsmc];
            $i++;       
            if(($i%8)==1)
                          echo "<tr>";
            echo "<td><a class='btn btn-default' role='button'   href='index.php?placeid=".$sqlplaceid."'>".$sqlplacename."</a></td>";
            if(($i%8)==0)
                          echo "</tr>";
            }
        }

?>
</tbody>
</table>


<table class="table table-hover table-responsive">
                       
                        <tbody>



                        <?php

    
    header("Content-type: text/html; charset=utf-8");
    if(!$_GET['placeid'])
        $sql = "select * from ".$sch_table." order by  convert(FYXMC using gbk) asc;  ";
    else if($_GET['placeid']=='index')
        $sql = "select * from ".$sch_table." order by  convert(FYXMC using gbk) asc;  ";
    else 
        $sql = "select * from ".$sch_table." where  ".$Fyxwzdm_table."=".$getplaceid.";  ";

    $placetotal=mysql_num_rows(mysql_query($sql)); //查询数据的总数total
    $placepagenum=ceil($placetotal/$num);  //获得总页数 pagenum
    //假如传入的页数参数apge 大于总页数 pagenum，则显示错误信息
    If($placepage>$placepagenum || $placepage == 0){
       Echo "暂无数据.";
       //Exit;
   }
    $placeoffset=($placepage-1)*$num;

    $placeprev_page=$placepage-1;                             //前一页
    $placenext_page=$placepage+1;                             //下一页



    if(!$_GET['placeid'])
        $sql = "select * from ".$sch_table." order by  convert(FYXMC using gbk) asc limit $offset,$num;  ";
    else if($_GET['placeid']=='index')
        $sql = "select * from ".$sch_table." order by  convert(FYXMC using gbk) asc limit $offset,$num;  ";
    else    {

        $sql = "select * from ".$dsdmb_table." where ".$table_dsdm."=".$getplaceid."  ";
        $result = mysql_query($sql);
        if($result&&mysql_num_rows($result)>0){
        while ($row = mysql_fetch_array($result)) {
            $selectplacename = $row[$table_dsmc];
        }
        $sql = "select * from ".$sch_table." where ".$Fyxwzdm_table."= ".$getplaceid." limit $placeoffset,$num;  ";
    }

        }



        





    //echo $_GET['schoolname'];
    if($_GET['placeid']=='index')
        echo "<tr  class='info'><td><a href='#'>以地区检索</a></td><td>共".$placetotal."个学校</td><td></td></tr>"; 
    else if($_GET['placeid']=='')
        echo "<tr  class='info'><td><a href='#'>以地区检索</a></td><td>共".$placetotal."个学校</td><td></td></tr>"; 
    else echo "<tr  class='info'><td><a href='#'>以地区&nbsp;".$selectplacename."&nbsp;检索</a></td><td></td><td>共".$placetotal."个学校</td></tr>"; 


    $result = mysql_query($sql);
    $i=0;
    if($result&&mysql_num_rows($result)>0){
        while ($row = mysql_fetch_array($result)) {
            $sch_id = $row[$table_sch_id];
            //echo $sch_id;
            $sch_name = $row[$table_sch_name];
            $guanwang = $row[$Fyxgw_table];
            $i++;       
            if(($i%2)==1){
                          echo "<tr>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='zsjz.php?schoolid=".$sch_id."' target='_blank'>招生简章</a></td>
                            <td><a href='zsjh.php?schoolid=".$sch_id."' target='_blank'>招生计划</a></td>
                        </tr>"; 
                        }
            else {
                          echo "<tr  class='info'>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='zsjz.php?schoolid=".$sch_id."' target='_blank'>招生简章</a></td>
                            <td><a href='zsjh.php?schoolid=".$sch_id."' target='_blank'>招生计划</a></td>
                        </tr>"; }

            
        }
    }
    //mysql_close();
?>

                          
                        </tbody>
                    </table>
                    

                    <div class="inline pull-right page">
                          共<?php echo $placepagenum;?>页 &nbsp;当前第<?php echo $placepage; 
                         ?>页  

                     
                        <?php
                        if($placepage!=1)
                        echo "<a class='btn btn-default' role='button' href='index.php?placeid=".$_GET['placeid']."&placepage=1'>首页</a>";
                        ?>

                         <?php
                        if($placepage>1)
                        echo "<a class='btn btn-default' role='button' href='index.php?placeid=".$_GET['placeid']."&placepage=".$placeprev_page."'>上一页</a>";
                        ?>

                        <?php
                        if($placepage<$placepagenum)
                            if($_GET['placeid']=='')
                                echo "<a class='btn btn-default' role='button' href='index.php?placeid=index&placepage=".$placenext_page."'>下一页</a>";
                                else
                                    echo "<a class='btn btn-default' role='button' href='index.php?placeid=".$_GET['placeid']."&placepage=".$placenext_page."'>下一页</a>";


                        ?>
                        <?php
                        if($placepage<$placepagenum)
                            if($_GET['placeid']=='')
                                echo "<a class='btn btn-default' role='button' href='index.php?placeid=index&page=".$placepagenum."'>尾页</a>";
                            else
                                echo "<a class='btn btn-default' role='button' href='index.php?placeid=".$_GET['placeid']."&placepage=".$placepagenum."'>尾页</a>";
                        ?>
                       

                        
                
                </div>
                </div>


                <!-- 游戏栏目 -->
                <div class="tab-pane fade" id="profile2">



                <table class="table table-hover table-responsive">
                       
                        <tbody>


<?php
                        
        $sql = "select * from ".$zy_table."   ";
        $result = mysql_query($sql);
        $data = array();
         while($row=mysql_fetch_array($result))
        {
            $data[] = $row["zydl"]; // 把第一列压入到数组中
        }
        $unique_data = array_unique ( $data ); 
        //print_r ( $unique_data );
        
        foreach($unique_data as $key=>$value){
            echo "<tr  class='info'><td>".$value."</td><td></td><td></td><td></td></tr>";
            $sql = "select * from ".$zy_table." where zydl='".$value."'  ";
            $result1 = mysql_query($sql);
            $data1 = array();
            while($row1=mysql_fetch_array($result1))
            {
                $data1[] = $row1["zymc"]; // 把第一列压入到数组中
            }
            $unique_data1 = array_unique ( $data1 );
            $i=1;
            $szcd=count($data1);
            foreach($unique_data1 as $key1=>$value1){
                if(($i%3)==1)
                    echo "<tr><td></td><td><a href='index2.php?zy=".$value1."'>".$value1."</a></td>";
                if(($i%3)==2)
                    echo "<td><a href='index2.php?zy=".$value1."'>".$value1."</a></td>";
                if(($i%3)==0)
                    echo "<td><a href='index2.php?zy=".$value1."'>".$value1."</a></tr>";
                $i++;
                


            }
            


            echo "</tr>";
        }
        
        

?>
</tbody>
</table>



                    
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
                       


                       

    
                          
                      
                </div>
                <div class="tab-pane fade" id="profile3">



                <table class="table table-hover table-responsive">
                       
                        <tbody>


<?php
                        
        $sql = "select * from ".$zy_table."   ";
        $result = mysql_query($sql);
        $data = array();
         while($row=mysql_fetch_array($result))
        {
            $data[] = $row["sq"]; // 把第一列压入到数组中
        }
        $unique_data = array_unique ( $data ); 
        //print_r ( $unique_data );
        
        foreach($unique_data as $key=>$value){
            echo "<tr  class='info'><td>".$value."</td><td></td><td></td><td></td></tr>";
            $sql = "select * from ".$zy_table." where sq='".$value."'  ";
            $result1 = mysql_query($sql);
            $data1 = array();
            while($row1=mysql_fetch_array($result1))
            {
                $data1[] = $row1["xxmc"]; // 把第一列压入到数组中
            }
            $unique_data1 = array_unique ( $data1 );
            $i=1;
            $szcd=count($data1);
            foreach($unique_data1 as $key1=>$value1){
                if(($i%3)==1)
                    echo "<tr><td></td><td><a href='index2.php?zy=".$value1."'>".$value1."</a></td>";
                if(($i%3)==2)
                    echo "<td><a href='index2.php?zy=".$value1."'>".$value1."</a></td>";
                if(($i%3)==0)
                    echo "<td><a href='index2.php?zy=".$value1."'>".$value1."</a></tr>";
                $i++;
                


            }
            


            echo "</tr>";
        }
        
        

?>
</tbody>
</table>



                    
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
                       


                       

    
                          
                      
                </div>
                <!-- 新闻栏目 -->
                <div class="tab-pane fade <?php if($_GET['placename']) echo  "active in"; ?>" id="profile4">
                    <table class="table table-hover table-responsive">
                       
                         <tbody>


<?php
                        
        
        $sql = "select * from yx_xx   ";
        $result = mysql_query($sql);
         $data = array();
         $i=0;
         while($row=mysql_fetch_array($result))
        {
            $data[] = $row["ds"]; // 把第一列压入到数组中
        }
        $unique_data = array_unique ( $data ); 


        foreach($unique_data as $key=>$value){
            $i++;
            if(($i%8)==1)
                          echo "<tr>";
            echo "<td><a class='btn btn-default' role='button'   href='index.php?placename=".$value."'>".$value."</a></td>";
            if(($i%8)==0)
                          echo "</tr>";
        }        


?>
</tbody>
</table>


<table class="table table-hover table-responsive">
                       
                        <tbody>



                        <?php

    
    header("Content-type: text/html; charset=utf-8");
    if(!$_GET['placename'])
        $sql = "select * from yx_xx order by  convert(mc using gbk) asc;  ";
    else if($_GET['placename']=='index')
        $sql = "select * from yx_xx order by  convert(mc using gbk) asc;  ";
    else 
        $sql = "select * from yx_xx where  ds='".$getplacename."';  ";
    echo $sql;

    $placetotal=mysql_num_rows(mysql_query($sql)); //查询数据的总数total
    $placepagenum=ceil($placetotal/$num);  //获得总页数 pagenum
    //假如传入的页数参数apge 大于总页数 pagenum，则显示错误信息
    If($placepage>$placepagenum || $placepage == 0){
       Echo "暂无数据.";
       //Exit;
   }
   $placeoffset=($placepage-1)*$num;
    $placeprev_page=$placepage-1;                             //前一页
    $placenext_page=$placepage+1;  


 
    
    //echo $_GET['schoolname'];
    if($_GET['placename']=='index')
        echo "<tr  class='info'><td><a href='#'>以地区检索</a></td><td>共".$placetotal."个学校</td><td></td></tr>"; 
    else if($_GET['placename']=='')
        echo "<tr  class='info'><td><a href='#'>以地区检索</a></td><td>共".$placetotal."个学校</td><td></td></tr>"; 
    else echo "<tr  class='info'><td><a href='#'>以&nbsp;".$getplacename."&nbsp;检索</a></td><td></td><td>共".$placetotal."个学校</td></tr>"; 

           
            
          $result = mysql_query($sql);
    $i=0;
    if($result&&mysql_num_rows($result)>0){
        while ($row = mysql_fetch_array($result)) {
            $sch_id = $row['bh'];
            //echo $sch_id;
            $sch_name = $row['mc'];
            $guanwang = $row['web'];
            $i++;       
            if(($i%2)==1){
                          echo "<tr>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='zsjz.php?schoolid=".$sch_id."' target='_blank'>招生简章</a></td>
                            <td><a href='zsjh.php?schoolid=".$sch_id."' target='_blank'>招生计划</a></td>
                        </tr>"; 
                        }
            else {
                          echo "<tr  class='info'>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='zsjz.php?schoolid=".$sch_id."' target='_blank'>招生简章</a></td>
                            <td><a href='zsjh.php?schoolid=".$sch_id."' target='_blank'>招生计划</a></td>
                        </tr>"; }

            
        }
    }
           
  
    //mysql_close();
?>

                          
                        </tbody>
                    </table>
                    

                    <div class="inline pull-right page">
                          共<?php echo $place2pagenum;?>页 &nbsp;当前第<?php echo $place2page; 
                         ?>页  

                     
                        <?php
                        if($place2page!=1)
                        echo "<a class='btn btn-default' role='button' href='index.php?placename=".$_GET['placename']."&place2page=1'>首页</a>";
                        ?>

                         <?php
                        if($place2page>1)
                        echo "<a class='btn btn-default' role='button' href='index.php?placename=".$_GET['placename']."&place2page=".$place2prev_page."'>上一页</a>";
                        ?>

                        <?php
                        if($place2page<$place2pagenum)
                            if($_GET['placename']=='')
                                echo "<a class='btn btn-default' role='button' href='index.php?placename=index&place2page=".$place2next_page."'>下一页</a>";
                                else
                                    echo "<a class='btn btn-default' role='button' href='index.php?placename=".$_GET['placename']."&place2page=".$place2next_page."'>下一页</a>";


                        ?>
                        <?php
                        if($place2page<$place2pagenum)
                            if($_GET['placename']=='')
                                echo "<a class='btn btn-default' role='button' href='index.php?placename=index&place2page=".$place2pagenum."'>尾页</a>";
                            else
                                echo "<a class='btn btn-default' role='button' href='index.php?placename=".$_GET['placename']."&place2page=".$place2pagenum."'>尾页</a>";
                        ?>
                       

                        
                
                </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php require("footer.php");?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/index.js"></script>

<script type="text/javascript">//<![CDATA[
var curpage=document.hash.substr(1);
for (var i=1;i<=4;++i) {
  document.getElementById('qukuai'+i).style.display=(i==curpage)?'':'none';
}
//]]></script>
</body>
</html>
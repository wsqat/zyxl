<?php
ob_start();
error_reporting(0);
header("Content-type: text/html; charset=utf-8");

if(!isset($_SESSION)){  
        session_start();  
        }  
       if($_SESSION["user_role"]!=10 && $_SESSION["u_fb"]!=1)
        {
            //login;
            header("location:../webadmin/index.php");
            }
    
    $yx_table = contest_yx;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#"><img src="images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
                <a class="button button-little bg-main" href="../index.php">前台首页</a>
                <a class="button button-little bg-yellow" href="../php/logout_action.php">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li><a href="index.php" class="icon-home"> 开始</a>
                    <!-- <ul><li><a href="system.php">系统设置</a></li><li><a href="content.php">内容管理</a></li><li><a href="#">订单管理</a></li><li class="active"><a href="#">会员管理</a></li><li><a href="#">文件管理</a></li><li><a href="#">栏目管理</a></li></ul> -->
                </li>
                <li><a href="system.php" class="icon-cog"> 系统</a>
                    <!-- <ul><li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul> -->
                </li>
                <li class="active"><a href="content.php" class="icon-file-text"> 内容</a>
                    <ul>
                    <!-- <li><a href="../admin/publish.php" target='_blank'>添加内容</a></li> -->
                    <?php

                        if($_SESSION["u_fb"]==1)
                            {
                            echo "<li class='active'><a href='content.php'>内容发布</a></li>";
                            }
                        elseif($_SESSION["u_sh"]==1)
                            {
                            echo "<li><a href='contentadmin.php'>内容审核</a></li>";
                            }
                        elseif($_SESSION["user_role"]==10)
                            {
                            echo "<li  class='active'><a href='content.php'>内容发布</a></li>";
                            echo "<li><a href='contentadmin.php'>内容审核</a></li>";
                            }
                        
                            
                            
                            ?>
                            <li><a href='system.php'>后台管理</a></li>
                </ul>
                </li>
                <!-- <li><a href="#" class="icon-shopping-cart"> 订单</a></li>
                <li><a href="#" class="icon-user"> 会员</a></li>
                <li><a href="#" class="icon-file"> 文件</a></li>
                <li><a href="#" class="icon-th-list"> 栏目</a></li> -->
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，<?php echo $_SESSION["user_name"]; ?>，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="index.php" class="icon-home"> 开始</a></li>
                <li><a href="content.php">内容</a></li>
                <li>内容管理</li>
            </ul>
        </div>
    </div>
</div>

<div class="admin">
    <form method="post" action="content.php">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>内容列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="../admin/publish.php"><input type="button" class="button button-small border-green" value="添加内容" /></a>
            <br><br>
            <?php
            if($_SESSION["u_fb"]==1)
                {
                echo "<input type='button' class='button button-small checkall' name='checkall' checkfor='id' value='分类查询'' />
            <a href='content.php?cid=3'><input type='button' class='button button-small border-green' value='招生简章' /></a>
            <a href='content.php?cid=4'><input type='button' class='button button-small border-green' value='招生计划' /></a>";
                }
            elseif($_SESSION["u_sh"]==1)
                {
                    echo "<input type='button' class='button button-small checkall' name='checkall' checkfor='id' value='是否审核' />
            <a href='content.php?sid=1'><input type='button' class='button button-small border-green' value='已发布' /></a>
            <a href='content.php?sid=0'><input type='button' class='button button-small border-green' value='审核中' /></a>";

                }
            elseif($_SESSION["user_role"]==10)
                {
                //echo "<input type='button' class='button button-small checkall' name='checkall' checkfor='id' value='是否审核' /><a href='content.php?sid=1'><input type='button' class='button button-small border-green' value='已发布' /></a><a href='content.php?sid=0'><input type='button' class='button button-small border-green' value='审核中' /></a><br><br>";
                echo "<input type='button' class='button button-small checkall' name='checkall' checkfor='id' value='分类查询'' />
            <a href='content.php?cid=1'><input type='button' class='button button-small border-green' 
                value='最新资讯' /></a>
            <a href='content.php?cid=2'><input type='button' class='button button-small border-green' value='通知公告' /></a>
            <a href='content.php?cid=3'><input type='button' class='button button-small border-green' value='招生简章' /></a>
            <a href='content.php?cid=4'><input type='button' class='button button-small border-green' value='招生计划' /></a>";
                }
            ?>
                    

            <!-- <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="是否审核" />
            <a href="content.php?sid=1"><input type="button" class="button button-small border-green" value="已发布" /></a>
            <a href="content.php?sid=0"><input type="button" class="button button-small border-green" value="审核中" /></a>
            <br><br>
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="分类查询" />
            <a href="content.php?cid=2"><input type="button" class="button button-small border-green" value="通知公告" /></a>
            <a href="content.php?cid=1"><input type="button" class="button button-small border-green" value="学校简介" /></a> -->
            <!-- <a href="content.php?cid=3"><input type="button" class="button button-small border-green" value="招生简章" /></a>
            <a href="content.php?cid=4"><input type="button" class="button button-small border-green" value="招生计划" /></a> -->
        </div>
        <table class="table table-hover">
            <tr><th width="45">序号</th><th width="120">状态</th><th width="120">类型</th><th width="*">名称</th><th width="200">时间</th><th width="100">操作</th></tr>


<?php
include_once "../admin/conn.php"; 
//echo $_SERVER["QUERY_STRING"]."<br>";
// if(!empty($_SERVER["QUERY_STRING"])){
//     $arr = explode('=', $_SERVER["QUERY_STRING"]);
//     if($arr[0]=="sid"){
//         $sid_value= explode('&', $_SERVER["QUERY_STRING"]);
//         echo $sid_value;

//     }elseif($arr[0]=="cid"){
//         $cid_value= explode('&', $_SERVER["QUERY_STRING"]);
//         echo $cid_value;

//     }
// }
//echo isset($_GET['cid']);
if(trim($_GET['sid'])!= null){
    if($_SESSION["user_role"]==10){
        $sql = "select * from contest1 where state=".trim($_GET['sid'])." order by article_id desc  ";    
    }elseif($_SESSION["u_fb"]==1){
        $sql = "select * from ".$yx_table." where article_author_id= ".$_SESSION["user_id"]." and 
    state=".trim($_GET['sid'])." order by article_id desc  ";    
    }
}elseif(trim($_GET['sid'])== null ){
    if(trim($_GET['cid'])!= null ){
        //echo $_SESSION['user_id'];
        if($_SESSION["user_role"]==10){//admin
            //echo $_SESSION['user_role'];
            if($_GET['cid']==3 || $_GET['cid']==4 )
                $sql = "select * from ".$yx_table." where class_id=".trim($_GET['cid'])." order by article_id desc  ";   
            else
                $sql = "select * from contest1 where class_id=".trim($_GET['cid'])." order by article_id desc  ";   
        }elseif($_SESSION["u_fb"]==1){//fb
            $sql = "select * from ".$yx_table." where article_author_id= ".$_SESSION["user_id"]." and 
    class_id=".trim($_GET['cid'])." order by article_id desc  ";    
            //echo $_SESSION['user_id'];
        }

    }elseif(trim($_GET['cid'])== null){
        //发布人员只能看学校简章，学校计划
        //echo $_SESSION['user_id'];
        //echo $_SESSION['user_role'];
        if($_SESSION["u_fb"]==1){
            $sql = "select * from ".$yx_table." where article_author_id= ".$_SESSION["user_id"]." and (class_id=3 or class_id=4) order by article_id desc  "; 
        }else{
            $sql = "select * from contest1 where ( class_id= 1 || class_id=2  )order by article_id desc  ";     
        }
        
        //echo "string2";   
    }
}

    $result = mysql_query($sql);
    if($result&&mysql_num_rows($result)>0){
        $pageSize = 10;
        $curpage = 1;
        $countPage = 0;
        $curpage = $_GET["page"] == null ? "1" : $_GET["page"];
        $i = 0;

        while ($row = mysql_fetch_array($result)) {
            $i++;
            $id = $row["article_id"];
            $cid = $row["class_id"];
            if($cid==1){
                $cid = "最新资讯";
            }elseif($cid==2){
                $cid = "通知公告";
            }elseif($cid==1){
                $cid = "学校简介";
            }elseif($cid==3){
                $cid = "招生简章";
            }elseif($cid==4){
                $cid = "招生计划";
            }

            $title = $row["article_title"];
            //$content = $row["article_content"];
            $time = $row["article_time"];
            $state=$row['state'];
            $aid = base64_encode($row['article_id']);
                //操作加密
            $lo = base64_encode("look");
            $up = base64_encode("update");
            $de = base64_encode("delete");
            $fb = base64_encode("fabu");

            if ($i > ($curpage - 1) * $pageSize && $i <= $curpage * $pageSize) {
            if($_SESSION["user_role"]==10){
                if($row['state']==1){
                // <input type='checkbox' name='id' value=".$row['article_id']." />
                echo "<tr><td>".$row["article_id"]."</td><td><a class='button border-blue button-little' > 已发布 </a></td><td>".$cid."</td><td><a href='../admin/look.php?aid=".$aid."'>".$row['article_title']."</a></td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?aid=".$aid."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?aid=".$aid."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}
            if($row['state']==0){
                echo "<tr><td>".$row["article_id"]."</td><td><a class='button border-blue button-little' > 审核中 </a></td><td>".$cid."</td><td><a href='../admin/look.php?aid=".$aid."'>".$row['article_title']."</a></td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?aid=".$aid."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?aid=".$aid."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}

            }else{
                if($row['state']==1){
                // <input type='checkbox' name='id' value=".$row['article_id']." />
                echo "<tr><td>".$row["article_id"]."</td><td><a class='button border-blue button-little' > 已发布 </a></td><td>".$cid."</td><td><a href='../admin/look.php?s=".$lo."&aid=".$aid."'>".$row['article_title']."</a></td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?s=".$up."&aid=".$aid."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?s=".$de."&aid=".$aid."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}
            if($row['state']==0){
                echo "<tr><td>".$row["article_id"]."</td><td><a class='button border-blue button-little' > 审核中 </a></td><td>".$cid."</td><td><a href='../admin/look.php?s=".$lo."&aid=".$aid."'>".$row['article_title']."</a></td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?s=".$up."&aid=".$aid."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?s=".$de."&aid=".$aid."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}
            }
            
            
    
            }
            
        }
        $countPage = ($i + $pageSize - 1) / $pageSize;
        $countPage = floor($countPage);
    }
    mysql_close();
            ?>

        </table>
        <div class="panel-foot text-center">
         共<?php echo $i;?> 条记录 <?php echo $curpage;?>/<?php if($i/$pageSize< 1){ echo "1";}else{ echo 
            floor($countPage); }
         ?> 页  

        <a href="content.php?<?php if($_SERVER["QUERY_STRING"]) echo $_SERVER["QUERY_STRING"]."&";?>page=1">首页</a>
        <?php if ($curpage != 1) {?>
            <a href="content.php?<?php if($_SERVER["QUERY_STRING"]) echo $_SERVER["QUERY_STRING"]."&";?>page=<?php 
            echo $curpage - 1;?>">上一页</a>
        <?php }?>
        <?php 
            if ($curpage < ((int)$i/$pageSize)  ) {
        ?>
            <a href="content.php?<?php if($_SERVER["QUERY_STRING"]) echo $_SERVER["QUERY_STRING"]."&";?>page=<?php 
            echo $curpage + 1;?>">下一页</a>
        <?php 
            }
            
        ?>
        <a href="content.php?<?php if($_SERVER["QUERY_STRING"]) echo $_SERVER["QUERY_STRING"]."&";?>page=<?php echo $countPage;?>">尾页</a>
        
</div>
    </div>
    </form>
    <br />
    
</div>

</body>
</html>
<?php
ob_end_flush();
?>
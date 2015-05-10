<?php
ob_start();
error_reporting(0);
header("Content-type: text/html; charset=utf-8");

if(!isset($_SESSION)){  session_start();  }  
if($_SESSION["user_role"]!=10 && $_SESSION["u_fb"]!=1){
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
                    <!-- <ul><li><a href="systeming.php">系统设置</a></li><li><a href="content.php">内容管理</a></li><li><a href="#">订单管理</a></li><li class="active"><a href="#">会员管理</a></li><li><a href="#">文件管理</a></li><li><a href="#">栏目管理</a></li></ul> -->
                </li>
                <?php
                    if($_SESSION["user_role"]==10){
                        echo "<li><a href='systeming.php' class='icon-cog'> 系统</a>";
                    }
                ?>
                    <!-- <ul><li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul> -->
                </li>
                <li class="active"><a href="content.php" class="icon-file-text"> 内容</a>
                    <ul>
                    <!-- <li><a href="../admin/publish.php" target='_blank'>添加内容</a></li> -->
                    <?php

                        if($_SESSION["u_fb"]==1){
                            echo "<li class='active'><a href='content.php'>内容发布</a></li>";
                            include ('../config/settings.php');
                            $settings = new Settings_INI;  
                            $settings->load('../config/config.ini');  
                            $FAQ = $settings->get('db.FAQ');
                            echo "<li><a href='planadmin.php'>计划管理</a></li>";
                            if(!empty($FAQ)){
                                echo "<li><a href='message.php'>FAQ管理</a></li>";
                            }
                        }
                        elseif($_SESSION["u_sh"]==1){
                            echo "<li><a href='contentadmin.php'>内容审核</a></li>";
                        }
                        elseif($_SESSION["user_role"]==10){
                            echo "<li  class='active'><a href='content.php'>内容发布</a></li>";
//                            echo "<li><a href='systeming.php'>后台管理</a></li>";
                        }

                    echo "<li><a href='password.php'>修改密码</a></li>";
                            
                    ?>
                        

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
<!--            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--            <a href="../admin/publish.php"><input type="button" class="button button-small border-green" value="添加简章" /></a>-->
            <?php
            if($_SESSION["u_fb"]==1)
                {
//                echo "<input type='button' class='button button-small checkall' name='checkall' checkfor='id' value='分类查询'' />
            echo "<a href='content.php?cid=3'><input type='button' class='button button-small border-green' value='招生简章' /></a>&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a href='../admin/publish.php'><input type='button' class='button button-small border-green' value='添加简章' /></a>";
            // <a href='content.php?cid=4'><input type='button' class='button button-small border-green' value='招生计划' /></a>
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
                echo "<input type='button' class='button button-small checkall' name='checkall' checkfor='id' value='分类查询'' />";
//            <a href='content.php'><input type='button' class='button button-small border-green' value='所有内容' /></a>
//            <a href='content.php?cid=1'><input type='button' class='button button-small border-green' value='最新资讯' /></a>

            echo "&nbsp;&nbsp;<a href='content.php'><input type='button' class='button button-small border-green' value='通知公告' /></a>";
                }

            ?>
                
        </div>
        <table class="table table-hover">



<?php
include_once "../admin/conn.php";
$cid = intval(trim($_GET['cid']));
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
            $sql = "select * from contest1 where class_id='$cid' order by article_id desc  ";   
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
            //$sql = "select * from contest1 where ( class_id= 1 || class_id=2  )order by article_id desc  ";
            $sql = "select * from contest1 where class_id=2 order by article_id desc  ";
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
        $curpage = base64_decode($curpage);
        if(is_numeric($curpage))
            $curpage = intval($curpage);
        else
            $curpage = 1;
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
            $title = mb_substr($title , 0 , 31,'utf-8');
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
                if($i==1){
                    echo "<tr><th width='120'>状态</th><th width='120'>类型</th><th width='*'>名称</th><th width='200'>时间</th><th width='100'>操作</th></tr>";
                }

                if($row['state']==1){
                // <input type='checkbox' name='id' value=".$row['article_id']." />
                echo "<tr><td><a class='button border-blue button-little' > 已发布 </a></td><td>".$cid."</td><td><a href='../admin/look.php?aid=".$aid."'>".$title."</a></td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?aid=".$aid."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?aid=".$aid."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}
            if($row['state']==0){
                echo "<tr><td><a class='button border-blue button-little' > 审核中 </a></td><td>".$cid."</td><td><a href='../admin/look.php?aid=".$aid."'>".$title."</a></td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?aid=".$aid."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?aid=".$aid."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}

            }else{
                if($state==1){
                    echo "<tr><th width='120'>状态</th><th width='120'>类型</th><th width='*'>名称</th><th width='200'>时间</th><th width='100'>操作</th></tr>";
                // <input type='checkbox' name='id' value=".$row['article_id']." />
                    echo "<tr><td><a class='button border-blue button-little' > 已发布 </a></td><td>".$cid."</td><td><a href='../admin/look.php?s=".$lo."&aid=".$aid."'>".$title."</a></td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?s=".$up."&aid=".$aid."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?s=".$de."&aid=".$aid."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}
                elseif($state==0){
                    echo "<tr><th width='120'>状态</th><th width='120'>类型</th><th width='*'>名称</th><th width='200'>时间</th><th width='100'>操作</th></tr>";
                    echo "<tr><td><a class='button border-blue button-little' > 审核中 </a></td><td>".$cid."</td><td><a href='../admin/look.php?s=".$lo."&aid=".$aid."'>".$title."</a></td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?s=".$up."&aid=".$aid."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?s=".$de."&aid=".$aid."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}
                elseif($state==-1){
                    echo "<tr><th width='120'>状态</th><th width='120'>类型</th><th width='*'>名称</th><th width='200'>退回意见</th><th width='200'>时间</th><th width='100'>操作</th></tr>";
                    $comment = $row['comment'];
                    //echo $comment;
                    $comment = mb_substr($comment , 0 , 10,'utf-8');

                    echo "<tr><td><a class='button border-blue button-little' > 未通过 </a></td><td>".$cid."</td>
                    <td><a href='../admin/look.php?s=".$lo."&aid=".$aid."'>".$title."</a></td><td>".$comment."</td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?s=".$up."&aid=".$aid."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?s=".$de."&aid=".$aid."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";}

            }
            
            
    
            }
            
        }
        $countPage = ($i + $pageSize - 1) / $pageSize;
        $countPage = floor($countPage);
    }
    //mysql_close();
            ?>

        </table>
        <br/>
        <div class="padding border-bottom">
        <?php

        if($_SESSION["u_fb"]==1)
        {
//                echo "<input type='button' class='button button-small checkall' name='checkall' checkfor='id' value='分类查询'' />
            echo "<a href='planadmin.php'><input type='button' class='button button-small border-green' value='招生计划' /></a>&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a href='planadmin.php'><input type='button' class='button button-small border-green' value='修改计划' /></a>";
            // <a href='content.php?cid=4'><input type='button' class='button button-small border-green' value='招生计划' /></a>
        }

        ?>
        </div>
        <table class="table table-hover">
        <?php
        if($_SESSION["u_fb"]==1){
        include_once "../admin/conn.php";
        $yxdm = $_SESSION["user_sch_id"];
        //echo $yxdm;
        $sql = "select * from yx_xx where dm = '$yxdm'";
        //echo $sql;
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);

        $mc = $row['mc'];
        $dm = $row['dm'];

        $sqls = "select * from contest_yx where yxdm = '$yxdm'";
        //echo $sqls;
        $results = mysql_query($sqls);
        $rows = mysql_fetch_array($results);
        //echo $mc;
        $state = $rows['pstate'];
        $comment = $rows['pcomment'];

        //echo $state;
        if($state==1){
            echo "<tr><th width='120'>状态</th><th width='*'>院校编码</th><th width='*'>院校名称</th></tr>";
            // <input type='checkbox' name='id' value=".$row['article_id']." />
            echo "<tr><td><a class='button border-blue button-little' > 已发布 </a></td><td>".$dm."</td>
            <td>".$mc."</td></tr>";}
        elseif($state==0){
            echo "<tr><th width='120'>状态</th><th width='*'>院校编码</th><th width='*'>院校名称</th></tr>";
            echo "<tr><td><a class='button border-blue button-little' > 审核中 </a></td><td>".$dm."</td>
            <td>".$mc."</td></tr>";}
        elseif($state==-1){
            echo "<tr><th width='120'>状态</th><th width='120'>院校编码</th><th width='150'>院校名称</th><th width='*'>退回意见</th></tr>";
            //echo $comment;
            //$comment = mb_substr($comment , 0 , 80,'utf-8');

            echo "<tr><td><a class='button border-blue button-little' > 未通过 </a></td><td>".$dm."</td>
                    <td>".$mc."</td><td>".$comment."</td></tr>";}

        }
        ?>
        </table>



        <br/><br/>
        <?php
            if($_SESSION["u_fb"]==1) {
                echo "&nbsp;&nbsp; <a href='content.php?cid=3'><input type='button' class='button button-small border-green' value='学校官网' /></a>&nbsp;&nbsp;";


        ?><a href="../admin/addlink.php"><input type="button" class="button button-small border-green" value="添加链接" /></a>
                <br><br>
                <div class="table-responsive x6">
                    <table class="table table-bordered table-striped table-hover" >
                        <thead>
                        <tr><th>状态</th><th>学校名称</th><th>学校链接</th><th>操作</th></tr>
                        </thead>
                        <tbody>
                        <?php
                            include_once "../admin/conn.php";
                            $yxdm = $_SESSION["user_sch_id"];
                            //echo $yxdm;
                            $sql = "select * from yx_xx where dm = '$yxdm'";
                            //echo $sql;
                            $result = mysql_query($sql);
                            $row = mysql_fetch_array($result);
                            //print_r($row);
//                            $bh = $row['bh'];
//                            $aid = base64_encode($bh);
//                            $up =base64_encode("update");
                            $mc = $row['mc'];
                            $web = $row['web'];
                            //echo $mc;
                            $state = $row['state'];
                            //echo $state;
                            if(!empty($web)){
                                if($state==1)
                                    $status = "已通过";
                                elseif($state==0)
                                    $status = "审核中";
                                elseif($state==-1)
                                    $status = "未通过";
                                echo "<tr><td><a class='button border-blue button-little' >".$status."</a></td><td>".$mc."</td><td>".$web."</td><td><a class='button border-blue button-little' href='../admin/addlink.php'>修改</a></td></tr>";
                            }else{
                                echo "<tr>&nbsp;&nbsp;&nbsp;&nbsp;请先添加学校官网链接</tr>";
                            }

                        ?>
                        </tbody>
                    </table>
                    <br/>
                </div>

            <?php
            }
        ?>
        <br/><br/><br/><br/>
    </form>
    <br />
    
</div>

</body>
</html>
<?php
ob_end_flush();
?>
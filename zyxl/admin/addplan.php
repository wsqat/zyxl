<?php
/**
 * Created by PhpStorm.
 * User: wsqali
 * Date: 2015/5/8
 * Time: 18:56
 */

if(!isset($_SESSION)){ session_start(); };
error_reporting(0);

if($_SESSION["login"]!=true)

{
    //login;
    header("location:../webadmin/index.php");
}

if($_SESSION["u_fb"]!=1&&$_SESSION["u_sh"]!=1)
{
    //login;
    header("location:../webadmin/index.php");
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<html>
<head>
    <meta charset="utf-8">
    <title>计划管理</title>
    <!--<link rel="stylesheet" href="ckeditor/_samples/sample.css">-->
    <link rel="stylesheet" href="../webadmin/css/pintuer.css">
    <link rel="stylesheet" href="../webadmin/css/admin.css">
    <script src="../webadmin/js/jquery.js"></script>
    <script src="../webadmin/js/pintuer.js"></script>
    <script src="../webadmin/js/respond.js"></script>
    <link type="image/x-icon" href="../webadmin/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>
<body>
<div class="lefter">
    <div class="logo"><a href="#"><img src="../webadmin/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main" href="../index.php" >前台首页</a>
                <a class="button button-little bg-yellow" href="../php/logout_action.php">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li><a href="../webadmin/index.php" class="icon-home"> 开始</a>
                    <!-- <ul><li><a href="system.html">系统设置</a></li><li><a href="content.html">内容管理</a></li></ul> -->
                </li>
                <?php
                if($_SESSION["user_role"]==10){
                    echo "<li><a href='systeming.php' class='icon-cog'> 系统</a>";
                }
                ?>
                <!-- <ul><li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul> -->
                </li>
                <li class="active"><a href="../webadmin/content.php" class="icon-file-text"> 内容</a>
                    <ul>
                        <!-- <li><a href="../admin/publish.php" target='_blank'>添加内容</a></li> -->
                        <?php

                        if($_SESSION["u_fb"]==1){
                            echo "<li><a href='../webadmin/content.php'>内容发布</a></li>";
                            include ('../config/settings.php');
                            $settings = new Settings_INI;
                            $settings->load('../config/config.ini');
                            $FAQ = $settings->get('db.FAQ');

                            echo "<li class='active'><a href='planadmin.php'>计划管理</a></li>";
                            if(!empty($FAQ)){
                                echo "<li><a href='message.php'>FAQ管理</a></li>";
                            }
                        }
                        if($_SESSION["u_sh"]==1){
                            echo "<li><a href='../webadmin/contentadmin.php'>简章审核</a></li>";
                            echo "<li><a href='../webadmin/linkVerify.php'>链接审核</a></li>";
                            echo "<li class='active'><a href='../webadmin/planVerify.php'>计划审核</a></li>";
                        }
                        if($_SESSION["user_role"]==10){

                            echo "<li'><a href='../webadmin/content.php'>内容发布</a></li>";
                            echo "<li><a href='systeming.php'>后台管理</a></li>";
                        }

                        echo "<li><a href='../webadmin/password.php'>修改密码</a></li>";

                        ?>

                    </ul>
                </li>
                <!-- <li><a href="#" class="icon-shopping-cart"> 订单</a></li>
                <li><a href="#" class="icon-th-list"> 栏目</a></li> -->
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，<?php echo $_SESSION["user_name"]; ?>，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="../webadmin/index.php" class="icon-home"> 开始</a></li>
                <li><a href="../webadmin/content.php">内容</a></li>
                <li><a href="../webadmin/planVerify.php">计划审核</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="admin">
    <div class="x10">
<!--        <button class="button border-main"><a href="../admin/plan.php">添加计划</a></button>-->
        <form action="dealplan.php" method="post" enctype="multipart/form-data">

        <button class="button win-back icon-arrow-left"> 后退</button>
        <button class="button win-forward">前进 <span class="icon-arrow-right"></span></button>
        <input type="submit" value="通过" class="button bg-main"  >
        <br>
            <?php
            include_once "../admin/conn.php";
            //$yxdm = $_SESSION["user_sch_id"];
            $yxdm = trim($_GET["aid"]);
            $con = "aid=".$_GET["aid"]."&";
            $yxdm = base64_decode($yxdm);
            //echo $yxdm;
            //update contest_yx set pstate=-1, pcomment = 'sdas' where yxdm = '3401030006'
            $query = "select pcomment from contest_yx where yxdm = '".$yxdm."'";
            //echo $query;
            $results= mysql_query($query);
            $array = mysql_fetch_assoc($results);
            //print_r($array);
            $comment = $array['pcomment'];
            //echo $comment;

            $arr = mysql_fetch_assoc(mysql_query("select mc from yx_xx where dm='".$yxdm."'   "));
            $mc =  $arr["mc"];
            //s=bG9vaw==&aid=MzQxODgxMDAwMQ==
            ?>
            <div class="form-group">
                <div class="x3 x1-move"><strong><label for="yxmc">院校名称:</label></strong></div>
                <div class="x4">
                    <strong><label for="yxmc"><?php echo $mc;?></label></strong>
                </div>
            </div>
            <br/><br/>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" >
                <tr><th>院校编号</th><th>计划类别</th><th>专业名称</th><th>专业代码</th>
                    <th>人数</th><th>学费</th><th>学制</th><th>备注</th></tr>

                <?php


                $sql = "select * from yx_jh where yxdm = '$yxdm' order by bh asc  ";
                //echo $sql;
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

                    $i=0;
                    while ($row = mysql_fetch_array($result)) {
                        $i++;
                        //print_r($row);
                        $bh = $row['bh'];
                        $bh = base64_encode($bh);
                        $yxdm = $row['yxdm'];
                        $zydl = $row['zydl'];
                        $zymc = $row['zymc'];
                        $zydm = $row['zydm'];
                        $renshu = $row['renshu'];
                        $xuefei = $row['xuefei'];
                        $xuezhi = $row['xuezhi'];
                        $beizhu = $row['beizhu'];
                        //substr($beizhu,5);
                        //$beizhu = substr($beizhu , 0 , 6,'utf-8');
                        $beizhu = mb_substr($beizhu , 0 , 6,'utf-8');

                        if($i > ($curpage - 1) * $pageSize && $i <= $curpage * $pageSize){
                            echo "<tr><td>".$yxdm."</td><td>".$zydl."</td><td>".$zymc."</td><td>".$zydm."</td><td>".$renshu."</td><td>".$xuefei."</td><td>".$xuezhi."</td><td>".$beizhu."</td></tr>";
                        }


                    }
                    $countPage = ($i + $pageSize - 1) / $pageSize;
                    $countPage = floor($countPage);
                }
                mysql_close();
                ?>
                <!-- <tr><td>院校编号</td><td>计划类别</td><td>专业名称</td><td>专业代码</td>
                <td>人数</td><td>学费</td></tr>
                <tr><td>院校编号</td><td>计划类别</td><td>专业名称</td><td>专业代码</td>
                <td>人数</td><td>学费</td></tr>
                <tr><td>院校编号</td><td>计划类别</td><td>专业名称</td><td>专业代码</td>
                <td>人数</td><td>学费</td></tr> -->

            </table>
            <input type="hidden" value="<?php echo $yxdm;?>" name="yxdm">
            <input name="op" type="hidden" value="1" >

            <div class="panel-foot text-center">
                <ul class="pagination pagination-group">
                    <li><a href="#">
                            共<?php echo $i;?> 条记录 <?php echo $curpage;?>/<?php if($i/$pageSize< 1){ echo "1";}else{ echo floor($countPage); }?> 页</a>
                    </li>
                    <li>
                        <a href="<?php echo $_SERVER['PHP_SELF'];?>?<?php echo $con; ?>">首页</a>
                        <?php if ($curpage != 1) { $pre=base64_encode($curpage - 1);  ?>
                    </li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF'];?>?<?php echo $con; ?>page=<?php echo $pre;?>">上一页</a>
                        <?php }?>
                    </li>
                    <li>
                        <?php
                        if ($curpage < ((int)$i/$pageSize)  ) {
                        $nex=base64_encode($curpage + 1);
                        ?>
                        <a href="<?php echo $_SERVER['PHP_SELF'];?>?<?php echo $con; ?>page=<?php echo $nex;?>">下一页</a>
                    </li>
                    <?php
                    }

                    ?>
                    <li>
                        <a href="<?php echo $_SERVER['PHP_SELF'];?>?<?php echo $con; ?>page=<?php echo base64_encode($countPage);?>">尾页</a>
                    </li>
                </ul>
            </div>


        </form>

        <br><br><br>




    </div>

<form action="dealplan.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $yxdm;?>" name="yxdm">
    <input name="op" type="hidden" value="2" >
    <div class="form-group">
        <div class="label"><label for="detail" style="font-size:16px;">未通过必须填写改进意见</label>
        </div>
        <div class="field">
            <?php
            if(empty($comment)){
                ?>
                <textarea rows="6" class="input" id="comment" name="comment" placeholder="未通过必须填写改进意见,内容长度小于100位" data-validate="required:必填,length#<600:内容长度小于100位"></textarea>
            <?php }else{?>
                <textarea rows="6" class="input" id="comment" name="comment"  data-validate="required:必填,length#<600:内容长度小于100位"><?php echo $comment;?></textarea>
            <?php
            }
            ?>
        </div>
    </div>
    <button class="button border-dot">未通过</button>
</form>
</div>
</div>
</body>
</html>

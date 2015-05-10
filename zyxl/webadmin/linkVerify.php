<?php
/**
 * Created by PhpStorm.
 * User: wsqali
 * Date: 2015/5/7
 * Time: 23:35
 */

ob_start();
//echo $_SESSION["user_dsdm"];
header("Content-type: text/html; charset=utf-8");
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION["u_sh"]!=1)
{
    //login;
    header("location:../webadmin/index.php");
}
?>
    <!DOCTYPE html>
    <html lang="zh-cn">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="renderer" content="webkit">
        <title>链接审核-后台管理</title>
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
                    <li><a href="index.php" class="icon-home"> 开始</a></li>
                    <?php
                    if($_SESSION["user_role"]==10){
                        echo "<li><a href='systeming.php' class='icon-cog'> 系统</a>";
                    }
                    ?>
                    <!-- <ul><li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul> -->
                    </li>
                    <li class="active"><a href="content.php" class="icon-file-text"> 内容</a>
                        <ul>
                            <?php

                            if($_SESSION["u_fb"]==1){
                                echo "<li><a href='content.php'>内容发布</a></li>";
                                include ('../config/settings.php');
                                $settings = new Settings_INI;
                                $settings->load('../config/config.ini');
                                $FAQ = $settings->get('db.FAQ');

                                echo "<li><a href='planadmin.php'>计划管理</a></li>";
                                if(!empty($FAQ)){
                                    echo "<li><a href='message.php'>FAQ管理</a></li>";
                                }
                            }
                            if($_SESSION["u_sh"]==1){
                                echo "<li><a href='contentadmin.php'>简章审核</a></li>";
                                echo "<li class='active'><a href='linkVerify.php'>链接审核</a></li>";
                                echo "<li><a href='planVerify.php'>计划审核</a></li>";
                            }
                            if($_SESSION["user_role"]==10){
                                echo "<li><a href='content.php'>内容发布</a></li>";
                                echo "<li class='active'><a href='contentadmin.php'>内容审核</a></li>";
                                echo "<li><a href='systeming.php'>后台管理</a></li>";
                            }

                            echo "<li><a href='password.php'>修改密码</a></li>";

                            ?>


                        </ul>
                    </li>
                </ul>
            </div>
            <div class="admin-bread">
                <span>您好，<?php echo $_SESSION["user_name"]; ?>，欢迎您的光临。</span>
                <ul class="bread">
                    <li><a href="index.php" class="icon-home"> 开始</a></li>
                    <li><a href="contentadmin.php">审核</a></li>
                    <li><a href="linkVerify.php">链接审核</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="admin">
        <form method="post" action="../admin/batchlink.php">
            <div class="panel admin-panel">
                <div class="panel-head"><strong>链接审核</strong></div>
                <div class="padding border-bottom">
                    <input type="button" class="button button-small checkall" name="checkall" checkfor="chk[]" value="全选" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <input type="submit" class="button button-small border-green" value="批量发布" /> -->
                    <input type="submit" class="button button-small border-yellow" value="批量删除" />
                    <br><br>
                    <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="是否审核" />
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?s=<?php echo base64_encode(0);?>"><input type="button" class="button button-small border-green" value="全部内容" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?s=<?php echo base64_encode(11);?>"><input type="button" class="button button-small border-green" value="已审核" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?s=<?php echo base64_encode(10);?>"><input type="button" class="button button-small border-green" value="审核中" /></a>
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?s=<?php echo base64_encode(9);?>"><input type="button" class="button button-small border-green" value="未通过" /></a>
                    <br><br>
                    <!-- <input type="button" class="button button-small border-blue" value="回收站" /> -->
                </div>
                <table class="table table-hover">
                    <tr><th width="100">选择</th><th width="120">状态</th><th width="*">院校名称</th><th width="*">官网链接</th><th width="200">操作</th></tr>
                    <!-- <tr><td><input type="checkbox" name="id" value="1" /></td><td>起步</td><td>下载拼图框架</td><td>2014-10-1</td><td><a class="button border-blue button-little" href="#">查看</a> <a class="button border-yellow button-little" href="../php/publish_article.php?article_id=1" onclick="{if(confirm('确认发布?')){return true;}return false;}">发布</a></td></tr>
         -->

                    <?php
                    include_once "../admin/conn.php";
                    error_reporting(0);
                    //echo $_SESSION["user_dsdm"];
                    if(!empty($_SESSION["user_dsdm"])){
                        $query="select * from user_role  where u_fb=1 and u_dsdm = ".$_SESSION["user_dsdm"]."  ";
                    }else{
                        $query="select * from user_role where u_fb=1";
                    }
                    //".$_SESSION["user_dsdm"]."
                    //echo $query;
                    $result=@mysql_query($query) or die("error  出错了，请联系管理员1");
                    //$row=mysql_fetch_array($result);
                    $index=0;
                    //$article_id = array();
                    $article_yxdm =array();
                    if($result&&mysql_num_rows($result)>0){

                        while($row = mysql_fetch_array($result)) {
                            //$article_id[$index]= $row['user_id'];
                            $article_yxdm[$index]= $row['u_yxdm'];
                            $index++;
                        }
                    }
                    //echo count($article_id);
                    //print_r($article_id);
                    //print_r($article_yxdm);
                    $s = base64_decode(trim($_GET["s"]));
                    //echo $s;
                    $s = intval($s);
                    $yx_table = yx_xx;
                    $i = 0;
                    for($index=0;$index<count($article_yxdm);$index++){
                        if($s==10){
                            $sql = "select * from ".$yx_table." where dm= '".$article_yxdm[$index]."' and  state=0 ";
                        }elseif($s==11){
                            $sql = "select * from ".$yx_table." where dm= '".$article_yxdm[$index]."'  and state=1";
                        }elseif($s==9){
                            $sql = "select * from ".$yx_table." where dm= '".$article_yxdm[$index]."'  and state=-1";
                        }else{
                            $sql = "select * from ".$yx_table." where dm= '".$article_yxdm[$index]."' ";
                        }

                        //echo $sql;
                        $result=@mysql_query($sql) or die("error  出错了，请联系管理员2");
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

                            while($row = mysql_fetch_array($result)) {
                                //echo $i;

                                $id = $row["bh"];
                                $aid = base64_encode($id);
                                $mc = $row["mc"];
                                $web = $row["web"];
                                $dm = $row["dm"];
                                //echo $web;
//                                $query ="select mc from yx_xx where dm='".$article_yxdm[$index]."' ";
//                                //echo $query;
//                                $arr_yxdm = mysql_fetch_array(mysql_query($query));
//                                //print_r($arr_yxdm);
//                                $mc = $arr_yxdm[0];

                                $state=$row['state'];
                                //$aid = base64_encode($row['article_id']);
                                //操作加密
                                $lo = base64_encode("look");
                                $up = base64_encode("update");
                                $de = base64_encode("delete");
                                $fb = base64_encode("fabu");
                                //审核是否通过
                                $y = base64_encode("yes");
                                $n = base64_encode("no");
                                //$table = base64_decode("");
                                if(!empty($web)){
                                    $i++;
                                    if ($i > ($curpage - 1) * $pageSize && $i <= $curpage * $pageSize) {

                                        if($state==1){
                                            // <input type='checkbox' name='id' value=".$row['article_id']."/><td>".$row["article_id"]."</td>
                                            echo "<tr><td><input type='checkbox'  name='chk[]' value=".$bh." /></td><td><a class='button border-blue button-little' > 已审核</a></td>
                                        <td>".$mc."</td><td>".$web."</td><td><a class='button border-blue button-little' href='../admin/addlink.php?aid=".$aid."'>修改</a>&nbsp;&nbsp; <a class='button border-yellow button-little' href='../admin/editlink.php?aid=".$aid."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";
                                        }elseif($state==0){
                                            echo "<tr><td><input type='checkbox' name='chk[]' value=".$bh." /></td><td><a class='button border-blue button-little' > 审核中 </a></td>
                                        <td>".$mc."</td><td>".$web."</td><td><a class='button border-blue button-little' href='../admin/shenheLink.php?s=".$up."&aid=".$aid."'>审核</a> <a class='button border-yellow button-little' href='../admin/updateLink.php?s=".$y."&aid=".$aid."'>通过</a> <a class='button border-yellow button-little' href='../admin/updateLink.php?s=".$n."&aid=".$aid."'>不通过</a></td></tr>";
                                            // echo "<tr><td>".$row["article_id"]."</td><td><a class='button border-blue button-little' > 审核中 </a></td><td>".$cid."</td><td><a href='../admin/look.php?aid=".$row['article_id']."'>".$row['article_title']."</a></td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?aid=".$row['article_id']."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?aid=".$row['article_id']."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";
                                        }elseif($state==-1){
                                            echo "<tr><td><input type='checkbox' name='chk[]' value=".$bh." /></td><td><a class='button border-blue button-little' > 未通过 </a></td>
                                        <td><a href='../admin/look.php?s=".$lo."&aid=".$aid."'>".$mc."</a></td><td>".$web."</td><td><a class='button border-blue button-little' href='../admin/shenhe.php?s=".$up."&aid=".$aid."'>审核</a> <a class='button border-yellow button-little' href='../admin/opupdate.php?s=".$fb."&aid=".$aid."'>通过</a> <a class='button border-yellow button-little' href='../admin/opupdate.php?s=".$fb."&aid=".$aid."'>不通过</a></td></tr>";
                                            // echo "<tr><td>".$row["article_id"]."</td><td><a class='button border-blue button-little' > 审核中 </a></td><td>".$cid."</td><td><a href='../admin/look.php?aid=".$row['article_id']."'>".$row['article_title']."</a></td><td>".$row['article_time']."</td><td><a class='button border-blue button-little' href='../admin/update.php?aid=".$row['article_id']."'>修改</a> <a class='button border-yellow button-little' href='../admin/dele.php?aid=".$row['article_id']."' onclick='{if(confirm('确认删除?')){return true;}return false;}'>删除</a></td></tr>";
                                        }
                                    }
                                }

                            }
                            $countPage = ($i + $pageSize - 1) / $pageSize;
                            $countPage = floor($countPage);



                        }
                    }
                    mysql_close();
                    ?>


                </table>
                <div class="panel-foot text-center">
                    <ul class="pagination pagination-group">
                        <li><a href="#">
                                共<?php echo $i;?> 条记录 <?php echo $curpage;?>/<?php if($i/$pageSize< 1){ echo "1";}else{ echo floor($countPage); }?> 页</a>
                        </li>
                        <li>
                            <a href="<?php echo $_SERVER['PHP_SELF'];?>">首页</a>
                            <?php if ($curpage != 1) { $pre=base64_encode($curpage - 1);  ?>
                        </li>
                        <li><a href="<?php echo $_SERVER['PHP_SELF'];?>?page=<?php echo $pre;?>">上一页</a>
                            <?php }?>
                        </li>
                        <li>
                            <?php
                            if ($curpage < ((int)$i/$pageSize)  ) {
                            $nex=base64_encode($curpage + 1);
                            ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'];?>?page=<?php echo $nex;?>">下一页</a>
                        </li>
                        <?php
                        }

                        ?>
                        <li>
                            <a href="<?php echo $_SERVER['PHP_SELF'];?>?page=<?php echo base64_encode($countPage);?>">尾页</a>
                        </li>
                    </ul>
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
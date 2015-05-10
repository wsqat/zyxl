<?php require("header.php");?>
<!-- 内容 -->
<div class="wrap fixed pt10">
<?php
    include_once "../admin/cxcon.php"; 
    include_once "../cxsql/function.php"; 
    $schoolbh=mysql_real_escape_string($_GET['schoolbh']);
    $zymc='zymc';


    //$sql2 = "select * from yx_xx where dm= '".$schoolbh."'  ";
    //$result2 = mysql_query($sql2);
    $row2=no5cxyx_xx_dm($schoolbh);

    //$sql3 = "select * from contest_yx where yxdm= '".$schoolbh."'  ";
    //$result3 = mysql_query($sql3);
    //$row3=mysql_fetch_array($result3);
    $pstate=no5cxyx_jhstate_dm($schoolbh);
    //$pstate=$row3['pstate'];


?>
	
    <div class="wrap fixed pt10">
	<div class="">
		<div class="box">
			<div class="position"><span class="fr">你的位置：<a href="../index.php">首页</a>&gt;<a href="index.php">招生计划</a></span><strong style="width:70px;">院校计划</strong></div>
			<div class="content">
        	    <div class="title">
					<h1><?php echo $row2['mc']; ?></h1>
				</div>
				<div class="main_school">

					
<div class="main_contact">
<table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
  <tbody><tr>
    <td><span>招生计划：</span><?php 
            no5cxyx_renshu_dm($schoolbh);
            
              ?></td>
    <td><span>校址区域：</span><?php echo $row2['ds'] ; ?></td>
  </tr>
  <tr>
    <td><span>学校级别：</span><?php echo $row2['jibie'] ; ?></td>
    <td><span>学校性质：</span><?php echo $row2['xingzhi'] ; ?></td>
  </tr>
  <tr>
    <td><span>类型：</span><?php echo $row2['leixing'] ; ?></td>
    <td><span>网站：</span><?php if($row2['state']=='1') echo $row2['web'] ;else echo"更新中..."; ?></td>
  </tr>
  <tr>
    <?php 

    include ('../config/settings.php');
        $settings = new Settings_INI;  
        $settings->load('../config/config.ini');  
        $FAQ = $settings->get('db.FAQ');
        
        if(!empty($FAQ)){
            echo "<td colspan='2' align='center'><a href='../liuyan/liuyan/index.php?action=liuyan&ts=list&yxdm=".$row2['bh']."'><img src='images/ask_button.gif' alt='我要提问'></a></td>";
        }


    ?>
  </tr>
</tbody></table>
</div>

<div class="main_subject">
<table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
  <tbody><tr style="background-color:#EEE; color:#06C; font-weight:bold">
    <td>专业名称</td>
    <td>学制</td>
    <td>计划类别</td>
    <td>专业代码</td>
    <td>收费标准</td>
    <td>招生人数</td>
    <td style="width:180px;word-wrap: break-word; word-break: normal;">备注</td>
  </tr>
  

<?php
$sql = "select * from yx_jh where yxdm='".$row2['dm']."'   ";
$result = mysql_query($sql);
if($result&&mysql_num_rows($result)>0){
            while ($row = mysql_fetch_array($result)) {

            if($row['renshu']!='0')
                {
                    if($pstate!=1)
                    {
                        $row['xuefei']='更新中...';
                        $row['renshu']='更新中...';
                        $row['beizhu']='更新中...';
                        $row['xuezhi']='更新中...';
                    }
                echo "<tr>";
                echo "<td>".$row['zymc']."</td>";
                echo "<td>".$row['xuezhi']."</td>";
                echo "<td>".$row['zydl']."</td>";
                echo "<td>".$row['zydm']."</td>";
                echo "<td>".$row['xuefei']."</td>";
                echo "<td>".$row['renshu']."</td>";
                echo "<td>".$row['beizhu']."</td>";
                echo "</tr>";
                }
                
            }}

?>

  
    
</tbody></table>
</div>
				</div>
			</div>
		</div>
	</div>

	
		




<script type="text/javascript">
new SlideTrans("idContainer", "idSlider", "0", { Vertical: false }).Run();
</script>  
	</div>
</div>

<?php require("footer.php");?>


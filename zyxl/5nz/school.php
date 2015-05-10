<?php require("header.php");?>
<!-- 内容 -->
<div class="wrap fixed pt10">
<?php
    $schoolname=$_GET['schoolname'];
    $zymc='zymc';
?>
	
    <div class="wrap fixed pt10">
	<div class="">
		<div class="box">
			<div class="position"><span class="fr">你的位置：<a href="http://zzlq.heao.gov.cn/index.aspx">首页</a>&gt;<a href="http://zzlq.heao.gov.cn/SchoolPlan.aspx">招生计划</a></span><strong style="width:70px;">院校计划</strong></div>
			<div class="content">
        	    <div class="title">
					<h1><?php echo $schoolname; ?></h1>
				</div>
				<div class="main_school">
<?php
    include_once "admin/conn.php"; 
    $zy_table='xx_zy';

    $sql = "select * from ".$zy_table." where xxmc='".$schoolname."'   ";
    $result = mysql_query($sql);
    $data = array();
    $data1 = array();
    $data2 = array();
    $data3 = array();
    $data4 = array();
         while($row=mysql_fetch_array($result))
        {
            $data[] = $row["xxjb"]; // 把第一列压入到数组中
            $data1[] = $row["sq"]; // 把第一列压入到数组中
            $data2[] = $row["xxxz"]; // 把第一列压入到数组中
            //$data3[] = $row["xxjb"]; // 把第一列压入到数组中
            $data4[] = $row["hxlx"]; // 把第一列压入到数组中
        }
        $unique_data = array_unique ( $data ); 
        $unique_data1 = array_unique ( $data1 ); 
        $unique_data2 = array_unique ( $data2 ); 
        $unique_data3 = array_unique ( $data3 ); 
        $unique_data4 = array_unique ( $data4 ); 
?>				    
					
<div class="main_contact">
<table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
  <tbody><tr>
    <td><span>招生计划：</span>200人</td>
    <td><span>校址区域：</span><?php foreach($unique_data1 as $key1=>$value1){echo $value1;} ?></td>
  </tr>
  <tr>
    <td><span>学校级别：</span><?php foreach($unique_data as $key=>$value){echo $value;} ?></td>
    <td><span>学校性质：</span><?php foreach($unique_data2 as $key2=>$value2){echo $value2;} ?></td>
  </tr>
  <tr>
    <td><span>隶属关系：</span><?php foreach($unique_data4 as $key4=>$value4){echo $value4;} ?></td>
    <td><span>联系电话：</span>0374-2968806</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="http://zzlq.heao.gov.cn/Message_list.aspx?code=002"><img src="./school_files/ask_button.gif" alt="我要提问"></a></td>
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
    <td>申请学校</td>
  </tr>
  

<?php
$sql = "select * from ".$zy_table." where xxmc='".$schoolname."'   ";
$result = mysql_query($sql);
if($result&&mysql_num_rows($result)>0){
            while ($row = mysql_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row[$zymc]."</td>";
                echo "<td>".$row[$zymc]."</td>";
                echo "<td>".$row['zydl']."</td>";
                echo "<td>".$row['zydm']."</td>";
                echo "<td>".$row[$zymc]."</td>";
                echo "<td>".$row[$zymc]."</td>";
                echo "<td>".$row[$zymc]."</td>";
                echo "<td>".$row[$zymc]."</td>";
                echo "</tr>";
            }}

?>

  
    
</tbody></table>
</div>
				</div>
			</div>
		</div>
	</div>

	
		



<div class="container" id="idContainer" style="position: relative; overflow: hidden;">
	            <table id="idSlider" border="0" cellpadding="0" cellspacing="0" style="position: absolute;">
		            <tbody><tr>
		            
			            		       
		            </tr>
	            </tbody></table>
</div>
<script type="text/javascript">
new SlideTrans("idContainer", "idSlider", "0", { Vertical: false }).Run();
</script>  
	</div>
</div>

<?php require("footer.php");?>


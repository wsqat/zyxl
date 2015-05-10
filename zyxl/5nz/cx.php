<?php require("header.php");?>
<?php
    
    include_once "admin/conn.php"; 
    $zy_table='xx_zy';

    $sql = "select * from ".$zy_table."   ";
    $result = mysql_query($sql);
    $data = array();
    $data1 = array();
         while($row=mysql_fetch_array($result))
        {
            $data[] = $row["xxjb"]; // 把第一列压入到数组中
            $data1[] = $row["sq"]; // 把第一列压入到数组中
        }
        $unique_data = array_unique ( $data ); 
        $unique_data1 = array_unique ( $data1 ); 
        //print_r ( $unique_data );
        

?>

<!-- 内容 -->
<div class="wrap fixed pt10">
    
    
    <div class="">
        <div class="box">
            <div class="position">
            <input type="text" value="" id="hideContent" style="display:none;">
                <span class="fr">你的位置：<a href="http://zzlq.heao.gov.cn/index.aspx">首页</a>&gt;<a href="http://zzlq.heao.gov.cn/SchoolPlan.aspx#">院校计划</a></span><strong style="width: 70px;">院校计划</strong></div>
            <div>
                <center>
                    <table border="0" width="754" cellpadding="0" style="background-repeat: no-repeat;" cellspacing="0" class="table_01" height="200" background="./河南省普通中等专业学校招生服务平台_files/img_052.jpg">
                        <tbody>
                            <tr>
                                <td valign="top" height="33">
                                </td>
                            </tr>
                            <tr>
                                <td height="167" align="center" valign="top">
                                    <table border="0" width="600" cellpadding="0" cellspacing="0" class="td_color_03">
                                        <tbody>
                                            <form name="frmitem" method="post" action="cx.php">
                                            <tr>
                                                <td width="220" align="right" height="35">
                                                    学校级别：
                                                </td>
                                                <td width="314" align="left">
                                                    <select name="selxxjb" class="yxjh_sel">
                                                        <option value="" >- 不限 - </option>
                                                        <?php
                                                        foreach($unique_data as $key=>$value){
                
                    echo "<option value='";
                    echo $value;
                    echo "'";
                    if($value==$_POST['selxxjb'])
                        echo "selected";
                    echo " >".$value."</option>";}
                                                        ?>
                                                    </select>
                                                </td>
                                                <td width="220" align="right">
                                                    学校名称：
                                                </td>
                                                <td width="250" align="left">
                                                    <input type="text" name="txtxxmc" value="<?php echo $_POST['txtxxmc']; ?>" class="yxjh_txt">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" height="1" background="./河南省普通中等专业学校招生服务平台_files/img_053.jpg">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="70" align="right" height="35">
                                                    校址区域：
                                                </td>
                                                <td width="250" align="left">
                                                    <select name="selsq" class="yxjh_sel">
                                                        <option value="" >- 不限 - </option>
                                                        <?php
                                                        foreach($unique_data1 as $key1=>$value1){
                
                    echo "<option value='";
                    echo $value1;
                    echo "'";
                    if($value1==$_POST['selsq'])
                        echo "selected";
                    echo " >".$value1."</option>";}
                                                        ?>
                                                    </select>
                                                </td>
                                                <td width="65" align="right">
                                                    学校地址：
                                                </td>
                                                <td width="250" align="left">
                                                    <input type="text" name="txtxxdz" value="" class="yxjh_txt">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" height="1" background="./河南省普通中等专业学校招生服务平台_files/img_053.jpg">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="65" align="right">
                                                    收费标准：
                                                </td>
                                                <td width="250" align="left">
                                                    <select name="selsfbz" class="yxjh_sel">
                                                        <option value="0" selected="">- 不限 - </option>
                                                        <option value="1">2000及以下</option>
                                                        <option value="2">2000元 - 3000元</option>
                                                        <option value="3">3000元 - 4000元</option>
                                                        <option value="4">4000元 - 5000元</option>
                                                        <option value="5">5000元 - 6000元</option>
                                                        <option value="6">6000元 - 7000元</option>
                                                        <option value="7">7000元 - 8000元</option>
                                                        <option value="8">8000元 - 9000元</option>
                                                        <option value="9">9000元 - 10000元</option>
                                                        <option value="10">10000元及以上</option>
                                                    </select>
                                                </td>
                                                <td width="70" align="right" height="35">
                                                    专业名称：
                                                </td>
                                                <td width="250" align="left">
                                                    <input type="text" name="txtzymc" value="<?php echo $_POST['txtzymc']; ?>" class="yxjh_txt">
                                                </td>
                                                </tr><tr>
                                                    <td colspan="6" height="1" background="./河南省普通中等专业学校招生服务平台_files/img_053.jpg">
                                                    </td>
                                                </tr>
                                            
                                            <tr>
                                                <td colspan="6" height="39" align="center" valign="bottom">
                                                    <input type="image" src="./河南省普通中等专业学校招生服务平台_files/search_button.gif" border="0">
                                                    
                                                </td>
                                            </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <table border="0" width="754" cellpadding="1" cellspacing="1" class="table_01" bgcolor="#DCDCDC">
                        <tbody>
                            <tr>
                                <td height="32" background="./河南省普通中等专业学校招生服务平台_files/img_055.jpg" align="center" width="70">
                                    学校代码
                                </td>
                                <td height="32" background="./河南省普通中等专业学校招生服务平台_files/img_055.jpg" align="center" width="150">
                                    学校名称
                                </td>
                                <td height="32" background="./河南省普通中等专业学校招生服务平台_files/img_055.jpg" align="center" width="150">
                                    学校地址
                                </td>
                                <td height="32" background="./河南省普通中等专业学校招生服务平台_files/img_055.jpg" align="center" width="100">
                                    学校级别
                                </td>
                                <td height="32" background="./河南省普通中等专业学校招生服务平台_files/img_055.jpg" align="center" width="70">
                                    招生计划
                                </td>
                                
                            <?php require("cxcontest.php");?>
                            
                        </tbody>
                    </table>
                    
                </center>
            </div>
            
            

        </div>
    </div>

    <script type="text/javascript">
    function myclick()
	{
	    var str=window.location.href;
	    var sssss=document.getElementById("hideContent").value;
	    if(1==0)
	    {
	         if (str.indexOf("=")<0)
	         {
		        art.dialog({
		            padding: 10,
		            time:120,
		            title:'',
		            width: '50%',		
			        content:sssss,
			        cancelVal: '关闭',
			        cancel: true
		        });
    	    }	
	    }
	}
	myclick();
    </script>


	<div class="w190 fr">
		<!-- 广告 -->
		
		<!-- 右侧学校介绍 -->
		



<div class="container" id="idContainer">
	            <table id="idSlider" border="0" cellpadding="0" cellspacing="0">
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
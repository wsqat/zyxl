    <div class="col-lg-8">

            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li class="<?php 
                                    if(!$_GET['placeid'])
                                        if(!$_GET['placename'])
                                            echo  "active"; ?>"><a href="#profile" target="_blank" role="tab" data-toggle="tab">院校目录</a></li>
                
                
                <li class="<?php 
                                    
                                        if($_GET['placename'])
                                            echo  "active"; ?>"><a href="#profile4" role="tab" data-toggle="tab">地区查询(非五年制)</a></li>
                <li class=""><a href="#profile2" role="tab" data-toggle="tab">专业查询(非五年制)</a></li>
                <li class=""><a href="jiansuo2" role="tab" >条件查询(非五年制)</a></li>
                <li class=""><a href="index.php" role="tab" >返回</a></li>
                <li class=""><a href="jiansuo" role="tab"  class="btn btn-primary" style=" font-size:18px;">在线报名</a></li>
            </ul>


            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade <?php 
                                    if(!$_GET['placeid'])
                                        if(!$_GET['placename'])
                                            echo  "active in"; ?>" id="profile">
                    <table class="table table-hover table-responsive"  >
                        
                        <tbody>


                        <tr  border="0">
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=index'>全部</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=a'>A</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=b'>B</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=c'>C</a></td>                       
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=d'>D</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=e'>E</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=f'>F</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=g'>G</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=h'>H</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=j'>J</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=k'>K</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=l'>L</a></td>
                            
                        </tr>
                        <tr  border="0">
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=m'>M</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=n'>N</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=o'>O</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=p'>P</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=q'>Q</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=r'>R</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=s'>S</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=t'>T</a></td>
                           
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=w'>W</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=x'>X</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=y'>Y</a></td>
                            <td><a class="btn btn-default" role="button"   href='index_1.php?schoolname=z'>Z</a></td>

                        </tr>
                        
                        </tbody>
                    </table>

                        

	<table class="table table-hover table-responsive">
    <tbody>


<?php

    
     include_once "cxsql/no5all.php";



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
            $sch_name = $row['mc'];
            //$guanwang = $row[$Fyxgw_table];
            
            $guanwang = $row['web'];
            if (strstr($guanwang, "http://"))
            {
                $guanwang=   $guanwang;
            }else{
                $guanwang=   "http://".$guanwang;
            }
            if($row['state']!='1')
                $guanwang='';
            //echo $guanwang;
            //echo $sch_id;
            //echo $sch_name;
            $i++;       
            if($faq!=1){
                if(($i%2)==1){
                          echo "<tr>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='zsjz.php?schoolid=".$row['dm']."' target='_blank'>招生简章</a></td>
                            <td><a href='jiansuo2/school2.php?schoolbh=".$row['dm']."' target='_blank'>招生计划</a></td>
                        </tr>"; 

                        }
            else {
                          echo "<tr  class='info'>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='zsjz.php?schoolid=".$row['dm']."' target='_blank'>招生简章</a></td>
                            <td><a href='jiansuo2/school2.php?schoolbh=".$row['dm']."' target='_blank'>招生计划</a></td>
                        </tr>"; }
            }
            else {
                if(($i%2)==1){
                          echo "<tr>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='liuyan/liuyan/index.php?action=liuyan&ts=list&yxdm=".$row['dm']."' target='_blank'>在线咨询</a></td>
                            <td><a href='zsjz.php?schoolid=".$row['dm']."' target='_blank'>招生简章</a></td>
                            <td><a href='jiansuo2/school2.php?schoolbh=".$row['dm']."' target='_blank'>招生计划</a></td>
                        </tr>"; 

                        }
            else {
                          echo "<tr  class='info'>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='liuyan/liuyan/index.php?action=liuyan&ts=list&yxdm=".$row['dm']."' target='_blank'>在线咨询</a></td>
                            <td><a href='zsjz.php?schoolid=".$row['dm']."' target='_blank'>招生简章</a></td>
                            <td><a href='jiansuo2/school2.php?schoolbh=".$row['dm']."' target='_blank'>招生计划</a></td>
                        </tr>"; }
            }       

            
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
                        echo "<a class='btn btn-default' role='button' href='index_1.php?schoolname=".$_GET['schoolname']."&page=1'>首页</a>";
                        ?>

                         <?php
                        if($page>1)
                        echo "<a class='btn btn-default' role='button' href='index_1.php?schoolname=".$_GET['schoolname']."&page=".$prev_page."'>上一页</a>";
                        ?>

                        <?php
                        if($page<$pagenum)
                            if($_GET['schoolname']=='')
                                echo "<a class='btn btn-default' role='button' href='index_1.php?schoolname=index&page=".$next_page."'>下一页</a>";
                                else
                                    echo "<a class='btn btn-default' role='button' href='index_1.php?schoolname=".$_GET['schoolname']."&page=".$next_page."'>下一页</a>";


                        ?>
                        <?php
                        if($page<$pagenum)
                            if($_GET['schoolname']=='')
                                echo "<a class='btn btn-default' role='button' href='index_1.php?schoolname=index&page=".$pagenum."'>尾页</a>";
                            else
                                echo "<a class='btn btn-default' role='button' href='index_1.php?schoolname=".$_GET['schoolname']."&page=".$pagenum."'>尾页</a>";
                        ?>
                       

                        
                </div>
                </div>

                

               


                <!-- 游戏栏目 -->
                <div class="tab-pane fade" id="profile2">



                <table class="table table-hover table-responsive">
                       
                        <tbody>


<?php
                        
include_once"cxsql/no5zy.php";
        

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
                
                <!-- 按地区查询（yx_xx） -->
                <div class="tab-pane fade <?php if($_GET['placename']) echo  "active in"; ?>" id="profile4">
                    <table class="table table-hover table-responsive">
                       
                        <tbody>


<?php
                        
        
         include_once "cxsql/no5ds_head.php";


?>
</tbody>
</table>


<table class="table table-hover table-responsive">
                       
                        <tbody>



                        <?php


    
   if(!$_GET['placename'])
        $sql = "select * from yx_xx order by  convert(mc using gbk) asc;  ";
    else if($_GET['placename']=='index')
        $sql = "select * from yx_xx order by  convert(mc using gbk) asc;  ";
    else 
        $sql = "select * from yx_xx where  ds='".mysql_real_escape_string($getplacename)."';  ";

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


   if(!$_GET['placename'])
        $sql = "select * from yx_xx order by  convert(mc using gbk) asc limit $placeoffset,$num;  ";
    else if($_GET['placename']=='index')
        $sql = "select * from yx_xx order by  convert(mc using gbk) asc limit $placeoffset,$num;  ";
    else    {

        $sql = "select * from yx_xx where ds='".mysql_real_escape_string($getplacename)."' limit $placeoffset,$num;";}
//        echo $getplacename;

    //echo $_GET['schoolname'];
    if($_GET['placename']=='index'){
        echo "<tr  class='info'><td><a href='#'>以地区检索</a></td><td>共".$placetotal."个学校</td><td></td>"; if($faq==1) echo "<td></td>";echo "</tr>";}
    else if($_GET['placename']==''){
        echo "<tr  class='info'><td><a href='#'>以地区检索</a></td><td>共".$placetotal."个学校</td><td></td>"; if($faq==1) echo "<td></td>";echo "</tr>";}
    else {echo "<tr  class='info'><td><a href='#'>以&nbsp;".$getplacename."&nbsp;检索</a></td><td></td><td>共".$placetotal."个学校</td>"; if($faq==1) echo "<td></td>";echo "</tr>";}

$result = mysql_query($sql);
    $i=0;
    if($result&&mysql_num_rows($result)>0){
        while ($row = mysql_fetch_array($result)) {
            $sch_id = $row['bh'];
            //echo $sch_id;
            $sch_name = $row['mc'];
            $guanwang = $row['web'];
            if (strstr($guanwang, "http://"))
            {
                $guanwang=   $guanwang;
            }else{
                $guanwang=   "http://".$guanwang;
            }
            if($row['state']!='1')
                $guanwang='';
            $i++;
            if($faq!=1){
                if(($i%2)==1){
                          echo "<tr>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='zsjz.php?schoolid=".$row['dm']."' target='_blank'>招生简章</a></td>
                            <td><a href='jiansuo2/school2.php?schoolbh=".$row['dm']."' target='_blank'>招生计划</a></td>
                        </tr>"; 

                        }
            else {
                          echo "<tr  class='info'>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='zsjz.php?schoolid=".$row['dm']."' target='_blank'>招生简章</a></td>
                            <td><a href='jiansuo2/school2.php?schoolbh=".$row['dm']."' target='_blank'>招生计划</a></td>
                        </tr>"; }
            }
            else {
                if(($i%2)==1){
                          echo "<tr>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='liuyan/liuyan/index.php?action=liuyan&ts=list&yxdm=".$row['dm']."' target='_blank'>在线咨询</a></td>
                            <td><a href='zsjz.php?schoolid=".$row['dm']."' target='_blank'>招生简章</a></td>
                            <td><a href='jiansuo2/school2.php?schoolbh=".$row['dm']."' target='_blank'>招生计划</a></td>
                        </tr>"; 

                        }
            else {
                          echo "<tr  class='info'>
                            <td><a href='http://".$guanwang."' target='_blank'>".$sch_name."</a></td>
                            <td><a href='liuyan/liuyan/index.php?action=liuyan&ts=list&yxdm=".$row['dm']."' target='_blank'>在线咨询</a></td>
                            <td><a href='zsjz.php?schoolid=".$row['dm']."' target='_blank'>招生简章</a></td>
                            <td><a href='jiansuo2/school2.php?schoolbh=".$row['dm']."' target='_blank'>招生计划</a></td>
                        </tr>"; }
            }       
            

            
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
                        echo "<a class='btn btn-default' role='button' href='index_1.php?placename=".$_GET['placename']."&placepage=1'>首页</a>";
                        ?>

                         <?php
                        if($placepage>1)
                        echo "<a class='btn btn-default' role='button' href='index_1.php?placename=".$_GET['placename']."&placepage=".$placeprev_page."'>上一页</a>";
                        ?>

                        <?php
                        if($placepage<$placepagenum)
                            if($_GET['placename']=='')
                                echo "<a class='btn btn-default' role='button' href='index_1.php?placename=index&placepage=".$placenext_page."'>下一页</a>";
                                else
                                    echo "<a class='btn btn-default' role='button' href='index_1.php?placename=".$_GET['placename']."&placepage=".$placenext_page."'>下一页</a>";


                        ?>
                        <?php
                        if($placepage<$placepagenum)
                            if($_GET['placename']=='')
                                echo "<a class='btn btn-default' role='button' href='index_1.php?placename=index&placepage=".$placepagenum."'>尾页</a>";
                            else
                                echo "<a class='btn btn-default' role='button' href='index_1.php?placename=".$_GET['placename']."&placepage=".$placepagenum."'>尾页</a>";
                        ?>
                       

                        
                
                </div>
                </div>
  
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
                <li class=""><a href="jiansuo2" role="tab" >检索</a></li>
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
                        
                        </tbody>
                    </table>

                        

	<table class="table table-hover table-responsive">
    <tbody>


<?php

    
    header("Content-type: text/html; charset=utf-8");
    $sch_table='yx_xx';
    if(!$_GET['schoolname'])
        $sql = "select * from ".$sch_table." order by  convert(mc using gbk) asc;  ";
    else if($_GET['schoolname']=='index')
        $sql = "select * from ".$sch_table." order by  convert(mc using gbk) asc;  ";
    else if($_GET['schoolname']=='a')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 45217 and 45252;  ";
    else if($_GET['schoolname']=='b')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 45253 and 45760;  ";
    else if($_GET['schoolname']=='c')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 45761 and 46317;  ";
    else if($_GET['schoolname']=='d')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 46318 and 46825;  ";
    else if($_GET['schoolname']=='e')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 46826 and 47009;  ";
    else if($_GET['schoolname']=='f')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 47010 and 47296;  ";
    else if($_GET['schoolname']=='g')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 47297 and 47613;  ";
    else if($_GET['schoolname']=='h')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 47614 and 48118;  ";
    else if($_GET['schoolname']=='j')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 48119 and 49061;  ";
    else if($_GET['schoolname']=='k')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 49062 and 49323;  ";
    else if($_GET['schoolname']=='l')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 49324 and 49895;  ";
    else if($_GET['schoolname']=='m')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 49896 and 50370;  ";
    else if($_GET['schoolname']=='n')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 50371 and 50613;  ";
    else if($_GET['schoolname']=='o')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 50614 and 50621;  ";
    else if($_GET['schoolname']=='p')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 50622 and 50905;  ";
    else if($_GET['schoolname']=='q')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 50906 and 51386;  ";
    else if($_GET['schoolname']=='r')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 51387 and 51445;  ";
    else if($_GET['schoolname']=='s')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 51446 and 52217;  ";
    else if($_GET['schoolname']=='t')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 52218 and 52697;  ";
    else if($_GET['schoolname']=='w')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 52698 and 52979;  ";
    else if($_GET['schoolname']=='x')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 52980 and 53688;  ";
    else if($_GET['schoolname']=='y')
            $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 53689 and 54480;  ";
    else if($_GET['schoolname']=='z')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 54481 and 55289;  ";
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


     $sch_table='yx_xx';
    if(!$_GET['schoolname'])
        $sql = "select * from ".$sch_table." order by  convert(mc using gbk) asc limit $offset,$num;  ";
    if($_GET['schoolname']=='index')
        $sql = "select * from ".$sch_table." order by  convert(mc using gbk) asc limit $offset,$num;  ";
    if($_GET['schoolname']=='a')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 45217 and 45252 limit $offset,$num;  ";
    if($_GET['schoolname']=='b')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 45253 and 45760 limit $offset,$num;  ";
    if($_GET['schoolname']=='c')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 45761 and 46317 limit $offset,$num;  ";
    if($_GET['schoolname']=='d')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 46318 and 46825 limit $offset,$num;  ";
    if($_GET['schoolname']=='e')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 46826 and 47009 limit $offset,$num;  ";
    if($_GET['schoolname']=='f')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 47010 and 47296 limit $offset,$num;  ";
    if($_GET['schoolname']=='g')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 47297 and 47613 limit $offset,$num;  ";
    if($_GET['schoolname']=='h')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 47614 and 48118 limit $offset,$num;  ";
    if($_GET['schoolname']=='j')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 48119 and 49061 limit $offset,$num;  ";
     if($_GET['schoolname']=='k')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 49062 and 49323  limit $offset,$num;  ";
     if($_GET['schoolname']=='l')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 49324 and 49895 limit $offset,$num;  ";
     if($_GET['schoolname']=='m')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 49896 and 50370 limit $offset,$num;  ";
     if($_GET['schoolname']=='n')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 50371 and 50613 limit $offset,$num;  ";
     if($_GET['schoolname']=='o')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 50614 and 50621 limit $offset,$num;  ";
    if($_GET['schoolname']=='p')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 50622 and 50905 limit $offset,$num;  ";
    if($_GET['schoolname']=='q')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 50906 and 51386 limit $offset,$num;  ";
    if($_GET['schoolname']=='r')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 51387 and 51445 limit $offset,$num;  ";
      if($_GET['schoolname']=='s')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 51446 and 52217 limit $offset,$num;  ";
      if($_GET['schoolname']=='t')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 52218 and 52697 limit $offset,$num;  ";
     if($_GET['schoolname']=='w')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 52698 and 52979 limit $offset,$num;  ";
        if($_GET['schoolname']=='x')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 52980 and 53688 limit $offset,$num;  ";
        if($_GET['schoolname']=='y')
            $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 53689 and 54480 limit $offset,$num;  ";

    if($_GET['schoolname']=='z')
        $sql = "select * from ".$sch_table." where  CONV(HEX(left(CONVERT(mc USING gbk),1)),16,10) between 54481 and 55289 limit $offset,$num;  ";



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

                

               


                <!-- 游戏栏目 -->
                <div class="tab-pane fade" id="profile2">



                <table class="table table-hover table-responsive">
                       
                        <tbody>


<?php
                        
        $sql = "select * from yx_jh   ";
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
            $sql = "select * from yx_jh where zydl='".$value."'  ";
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
                
                <!-- 按地区查询（yx_xx） -->
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
                        echo "<a class='btn btn-default' role='button' href='index.php?placename=".$_GET['placename']."&placepage=1'>首页</a>";
                        ?>

                         <?php
                        if($placepage>1)
                        echo "<a class='btn btn-default' role='button' href='index.php?placename=".$_GET['placename']."&placepage=".$placeprev_page."'>上一页</a>";
                        ?>

                        <?php
                        if($placepage<$placepagenum)
                            if($_GET['placename']=='')
                                echo "<a class='btn btn-default' role='button' href='index.php?placename=index&placepage=".$placenext_page."'>下一页</a>";
                                else
                                    echo "<a class='btn btn-default' role='button' href='index.php?placename=".$_GET['placename']."&placepage=".$placenext_page."'>下一页</a>";


                        ?>
                        <?php
                        if($placepage<$placepagenum)
                            if($_GET['placename']=='')
                                echo "<a class='btn btn-default' role='button' href='index.php?placename=index&placepage=".$placepagenum."'>尾页</a>";
                            else
                                echo "<a class='btn btn-default' role='button' href='index.php?placename=".$_GET['placename']."&placepage=".$placepagenum."'>尾页</a>";
                        ?>
                       

                        
                
                </div>
                </div>
  
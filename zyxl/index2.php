
<?php
        include_once "header.php";
    ?>


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
                <li class="active"><a href="#home" target="_blank" role="tab" data-toggle="tab"><?php echo $_GET['zy']; ?></a></li>
                <li ><a href="#profile2" role="tab" data-toggle="tab">专业查询</a></li>
                 <li ><a href="index.php" role="tab"  class="btn btn-primary" style=" font-size:18px;">返回首页</a></li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade <?php if(!$_GET['schoolname']&!$_GET['placeid']) echo  "active in"; ?>" id="home">
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
        $getzy=$_GET['zy'];





                        
        $sql = "select * from yx_jh where zymc='".$getzy."'  ";
        $result = mysql_query($sql);
         while($row=mysql_fetch_array($result))
        {
            $sql1 = "select * from yx_xx where dm='".$row['yxdm']."'  ";
            $result1 = mysql_query($sql1);
            while($row1=mysql_fetch_array($result1)){
                echo "<tr><td>".$row1["mc"]."</td><td></td><td>".$row1["xingzhi"]."</td><td>".$row1["jibie"]."</td></tr>";
            }
            
        }
        
        
 




       
    
          
        ?>
 
                        
                        
                        </tbody>
                    </table>
                   
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

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="container-fluid" id="bottom">
    <p>Copyright 2014 <span><a href="index.php">123</a></span> 版权所有 
    &nbsp;&nbsp;&nbsp;&nbsp;
    <?php
        include_once "counter.php";
    ?>
    </p>
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
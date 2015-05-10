<?php        
        include_once "admin/cxcon.php"; 
        $sql = "select * from ".$contest1_table." where ".$table_state."=".$articlestate." and ".$table_class_id."=".$newsarticletypeid." order by ".$table_article_id." desc  ";
        $index0total=mysql_num_rows(mysql_query($sql));  //获取文章*    //echo $index0total;
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
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
            echo "<td><a class='btn btn-default' role='button'   href='index_1.php?placename=".$value."'>".$value."</a></td>";
            if(($i%8)==0)
                          echo "</tr>";
        }  
?>      
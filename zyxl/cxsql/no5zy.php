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
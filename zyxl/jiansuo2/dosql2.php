 <?php
 include_once "../admin/conn.php"; 
 $zy_table='xx_zy';
 $sql = "select * from ".$zy_table."  ";
    $result = mysql_query($sql);
    while($row=mysql_fetch_array($result))
        {
            $sql2 = "select * from yx_xx where mc= '".$row["xxmc"]."'  ";
            echo $sql2;
             $result2 = mysql_query($sql2);
             $row2=mysql_fetch_array($result2);
             $dm=$row2['dm'];
            $query = 'insert into yx_jh (yxdm,zydl,zymc,zydm) values ("'.$dm.'","'.$row['zydl'].'","'.$row['zymc'].'","'.$row['zydm'].'")';
            echo $query;
            mysql_query($query); 
            
        }
        
			    	
    	
    ?>
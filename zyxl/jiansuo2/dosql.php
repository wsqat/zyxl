 <?php
 include_once "../admin/conn.php"; 
 $zy_table='xx_zy';
 $sql = "select * from ".$zy_table."  ";
$result = mysql_query($sql);
$data = array();
         while($row=mysql_fetch_array($result))
        {
            $data[] = $row["xxmc"]; // 把第一列压入到数组中
        }
        $unique_data = array_unique ( $data ); 
        //print_r ( $unique_data );
        
        foreach($unique_data as $key=>$value){
            $sql = "select * from ".$zy_table." where xxmc='".$value."'  ";

            $result1 = mysql_query($sql);
            $data1 = array();
            $data2 = array();
            $data3 = array();
            $data4 = array();
            $data5 = array();
            while($row1=mysql_fetch_array($result1))
            {
                $data1[] = $row1["sq"]; // 把第一列压入到数组中
                $data2[] = $row1["xxjb"];
                $data3[] = $row1["xxdm"];
                $data4[] = $row1["bxlx"];
                $data5[] = $row1["xxxz"];
            }
            $unique_data1 = array_unique ( $data1 );
            $unique_data2 = array_unique ( $data2 );
            $unique_data3 = array_unique ( $data3 );
            $unique_data4 = array_unique ( $data4 );
            $unique_data5 = array_unique ( $data5 );
            foreach($unique_data1 as $key1=>$value1){

            }
			foreach($unique_data2 as $key2=>$value2){

			}
			foreach($unique_data3 as $key3=>$value3){

			}
			foreach($unique_data4 as $key4=>$value4){

			}
			foreach($unique_data5 as $key5=>$value5){

			}
			$query = 'insert into yx_xx (mc,dm,ds,jibie,xingzhi,leixing) values ("'.$value.'","'.$value3.'","'.$value1.'","'.$value2.'","'.$value5.'","'.$value4.'")';
 			echo $query;
			mysql_query($query); 
			    	
    	}
    ?>
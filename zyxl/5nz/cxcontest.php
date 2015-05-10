<?php
    
    include_once "admin/conn.php"; 
    $zy_table='xx_zy';
    $selxxjb=$_POST['selxxjb'];
    $selsq=$_POST['selsq'];
    $txtzymc=$_POST['txtzymc'];
    $txtxxmc=$_POST['txtxxmc'];
    $sql = "select * from ".$zy_table."  where (1=1) ";
    if($selxxjb !=''){ 
        $a = " and xxjb='".$selxxjb."'";} 
    if($selsq !=''){ 
        $b = " and sq='".$selsq."'";} 
    if($txtzymc !=''){ 
        $c = " and zymc like '%$txtzymc%'";} 
    if($txtxxmc !=''){ 
        $d = " and xxmc like '%$txtxxmc%'";} 
    $sql .=$a; 
    $sql .=$b; 
    $sql .=$c; 
    $sql .=$d; 


    //if($selxxjb!='')
        //$sql = "select * from ".$zy_table."  where xxjb='".$selxxjb."' ";
    //if($selsq!='')
        //$sql = "select * from ".$zy_table."  where sq='".$selsq."' ";
    //if($selxxjb!=''&$selsq!='')
        //$sql = "select * from ".$zy_table."  where xxjb='".$selxxjb."' and sq='".$selsq."' ";
    //if($txtzymc!='')
       // $sql = "select * from ".$zy_table."  where zymc like '%$txtzymc%' ";
    //if($txtxxmc!='')
        //$sql = "select * from ".$zy_table."  where zymc like '%$txtxxmc%' ";

    

    $result = mysql_query($sql);
    $data = array();
         while($row=mysql_fetch_array($result))
        {
            $data[] = $row["xxmc"]; // 把第一列压入到数组中
        }
        $unique_data = array_unique ( $data ); 
        //print_r ( $unique_data );
        
        foreach($unique_data as $key=>$value){
            echo "<tr><td  bgcolor='#ffffff' height='28' align='center'>00</td>
            <td  bgcolor='#ffffff' align='left' class='a_03'>";
            echo "<a href='school.php?schoolname=".$value."'>".$value."</a>";
            if($txtzymc!='')
            {
                $sql = "select * from ".$zy_table."  where zymc like '%$txtzymc%' and xxmc='".$value."' ";
                $result = mysql_query($sql);
                if($result&&mysql_num_rows($result)>0){
                    while ($row = mysql_fetch_array($result)) {
                     echo "(".$row['zymc'].")";
                    }
                }
            }
            echo "</td>";
            $sql = "select * from ".$zy_table." where xxmc='".$value."'  ";
            $result1 = mysql_query($sql);
            $data1 = array();
            $data2 = array();
            while($row1=mysql_fetch_array($result1))
            {
                $data1[] = $row1["sq"]; // 把第一列压入到数组中
                $data2[] = $row1["xxjb"];
            }
            $unique_data1 = array_unique ( $data1 );
            $unique_data2 = array_unique ( $data2 );
            echo "<td bgcolor='#ffffff' width='218' align='left'>";
            foreach($unique_data1 as $key1=>$value1){
                
                    echo $value1;

            }
            echo "</td>";
            echo "<td bgcolor='#ffffff' align='center'>";

            foreach($unique_data2 as $key2=>$value2){
                
                    echo "<a href='index2.php?zy=".$value2."'>".$value2."</a>";

            }
            echo "</td>";
            


            echo "<td bgcolor='#ffffff' align='center' style='color: red;'>
                                    200
                                </td>
                                
</tr>";
        }
?>


<tr>
    <td bgcolor="#ffffff" height="28" align="center">
                                    002
                                </td>
    <td bgcolor="#ffffff" align="left" class="a_03">
                                    &nbsp;<a href="http://zzlq.heao.gov.cn/SchoolDetial.aspx?xxid=253" class="a_05">许昌学院</a>
                                </td>
    <td bgcolor="#ffffff" width="218" align="left">
                                    &nbsp;许昌市八一路88号
                                </td>
    <td bgcolor="#ffffff" align="center">
                                    普通
                                </td>
    <td bgcolor="#ffffff" align="center" style="color: red;">
                                    200
                                </td>
                                
</tr>
                         
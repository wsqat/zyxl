<?php
    
    include_once "../admin/conn.php"; 
    $zy_table='xx_zy';
    $selxxjb=mysql_real_escape_string($_POST['selxxjb']);
    $selsq=mysql_real_escape_string($_POST['selsq']);
    $txtzymc=mysql_real_escape_string($_POST['txtzymc']);
    $txtxxmc=mysql_real_escape_string($_POST['txtxxmc']);
    $sql = "select * from yx_xx  where (1=1) ";
    if($selxxjb !=''){ 
        $a = " and jibie='".$selxxjb."'";} 
    if($selsq !=''){ 
        $b = " and ds='".$selsq."'";} 
    if($txtxxmc !=''){ 
        $d = " and mc like '%$txtxxmc%'";} 
    $sql .=$a; 
    $sql .=$b; 
    $sql .=$d; 
    if($txtzymc !=''){
    $sql3 = "select * from yx_jh  where zymc like '%$txtzymc%' and renshu!='0' ";
    $result3 = mysql_query($sql3);
    $data3 = array();
         while($row3=mysql_fetch_array($result3))
        {
            $data3[] = $row3["yxdm"]; // 把第一列压入到数组中
            //echo $row3["yxdm"];
        }
        
        $unique_data3 = array_unique ( $data3 ); 
        $num=count($unique_data3);
        //print_r ( $unique_data );
        $i=1;
        
        foreach($unique_data3 as $key=>$value){
            if($i==1)
                $e="and ( dm='".$value."'";
            else 
                $e =$e."or  dm='".$value."'";
            if($i==$num)
                $e.=")";
            $i++;
        }
        if($num=='0')
            $e="and ( dm='无记录')";
        $sql .=$e; 
        
    }
        


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
            echo "<tr>
            <td  bgcolor='#ffffff' align='left' class='a_03'>";
            echo "<a href='school2.php?schoolbh=".$row['dm']."'>".$row['mc']."</a>";
            if($txtzymc!='')
            {
                $sql1 = "select * from yx_jh  where zymc like '%$txtzymc%' and yxdm='".$row['dm']."' ";
                $result1 = mysql_query($sql1);
                if($result1&&mysql_num_rows($result1)>0){
                    while ($row1 = mysql_fetch_array($result1)) {
                     echo "(".$row1['zymc'].")";
                    }
                }
            }
            echo "</td>";
            echo "<td bgcolor='#ffffff' width='218' align='center'>";
            echo $row['ds'];

            
            echo "</td>";
            echo "<td bgcolor='#ffffff' align='center'>";
            echo $row['jibie'];

            
            echo "</td>";
            


            echo "<td bgcolor='#ffffff' align='center' style='color: red;'>";
            $a=0;
            $sql5 = "select * from yx_jh  where yxdm='".$row['dm']."' ";
            $result5 = mysql_query($sql5);
            if($result5&&mysql_num_rows($result5)>0){
                    while ($row5 = mysql_fetch_array($result5)) {
                     $a=$a+$row5['renshu'];
                    }
                }
            $sql4 = "select * from contest_yx where yxdm= '".$row['dm']."'  ";
            $result4 = mysql_query($sql4);
            $row4=mysql_fetch_array($result4);
            $pstate=$row4['pstate'];
            if($pstate!='1')
                $a='更新中...';
            echo $a;                       
            echo "</td></tr>";
        }
?>



                         
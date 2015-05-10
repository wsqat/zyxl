<?php
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
?>
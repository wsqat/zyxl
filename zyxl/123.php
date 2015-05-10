<?php
        
            $menu="admin.txt";
        
            
        ?>
  

    
        <?php
        //禁用错误报告
error_reporting(0);

//        header("Content-type: text/html; charset=utf-8");



    if(!$_GET["page"])                          //如果没有参数page
        $page=1;                                    //则显示第一页内容
    else
        $page=$_GET["page"];                        //如果带有参数page则显示相应页内容

    $list_num = 10;

    







//echo $menu;
//读取当前文件目录
//echo getcwd() . "<br/>"; 
//echo dirname(__FILE__); 
//echo getcwd() . "<br/>"; 
//改变为 images 目录
chdir("datas");
//echo getcwd() . "<br/>"; 
//$filepath = dirname(__FILE__);
$filepath = getcwd();
if (is_dir ( $filepath )) {//判断是不是文件夹
    $ch = opendir ( $filepath );//打开文件夹的句柄
    if ($ch) {
        while ( ($filename = readdir ( $ch )) != false ) {//判断是不是有子文件或者文件夹
 
            $filetype = substr ( $filename, strripos ( $filename, "." ) + 1 );
 
            if ($filetype == "txt" && is_file ( $filepath . "/" . $filename )) {
            //判断是不是以txt结尾并且是文件

                if($filename == $menu){

                    $file = $filepath . "/" . $filename;

                    $myfile=file($file);                       //使用file()函数把所有信息读入一个数组
                    if($myfile[0]=="")                          //如果文件为空，即没有任何留言信息
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;目前记录条数为：0";                   //显示没有记录的信息
                    else
                    {
                        $temp=explode("||",$myfile[0]);             //读出数组第一条记录到数组 
                        //echo $temp[0];
                        //echo intval($temp[0]);
                        //$list_nums=10;
                        //读出该数组第一个元素（代表记录总条数）
                        //echo ceil($total/$list_num);
                        //echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                        //echo "每页显示".$list_num."条记录";                //输入总页数
                        //echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                        $p_count=ceil($temp[0]/$list_num);      //计算总页数为记录总条数除以每页显示条数
                        $totalhref=$temp[0];


                        //echo (float)($temp[0]."/".$list_num);
                        //echo ceil($temp[0]."/".$list_num);
                        if($p_count < 1){
                            //echo "分1页显示";                //输入总页数    
                        }else{
                            //echo "分".$p_count."页显示";                //输入总页数    
                        }
                        
                       // echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                       // echo "当前显示第".$page."页";             //当前页
                        if($page!=ceil($temp[0]/$list_num))         //如果当前页不是最后一页
                            $current_size=$list_num;                    
                            //当前页最多可显示$list_num条记录
                        else                                    //如果当前页是最后一页
                            $current_size=$temp[0]%$list_num;           
                            //当前页显示的条数为总条数除以$lsit_num的余数
                        if($current_size==0)
                            $current_size=$list_num;                    //如果正好是显示条数的倍数则显示$list_num条内容
                        
                        for($i=0;$i<$current_size;$i++)
                        {
                            $temp=explode("||",$myfile[($page-1)*$list_num+$i]);//把相应的记录按“||”分割到数组          echo "<tr>";
                     
                        }

                    $content = file_get_contents($file); //读取文件中的内容
                    //echo $content;
                    //echo $_GET["parentid"];
                    $array = explode("||", $content);
                    
                        $arrs = explode("--", $content);
                        for($i=0;$i<count($arrs);$i++){
                            $arr = explode('||',$arrs[$i]);
                            $last=$totalhref-($page-1)*10;
                            $first=$totalhref-$page*10+1;
                            if($arr[0]>=$first&$arr[0]<=$last){
                            echo " <tr><td><a href='".$arr[2]."' target='_blank'>".$arr[1]."</a></td></tr>"; } 
                        

                    }
                }
            }
            
       
            }
            
        }
        closedir ( $ch );
    }
}
        ?>
   

         <?php



         //以下内容为分页显示连接
            $prev_page=$page-1;                             //前一页
            $next_page=$page+1;                             //下一页
            if ($page<=1)
            {
                // echo "<a href='#'>第一页 </a>| ";
                echo "第一页 | ";
            }
            else
            {
                echo "<a href='$PATH_INFO?page=1'>第一页</a> | ";
            }
            if ($prev_page<1)
            {
               echo "上一页 | ";
            }
            else
            {
                echo "<a href='$PATH_INFO?page=$prev_page'>上一页</a> | ";
            }
            if ($next_page>$p_count)
            {
                echo "下一页 | ";
            }
            else
            {
                echo "<a href='$PATH_INFO?page=$next_page'>下一页</a> | ";
            }
            if ($page>=$p_count)
            {
                echo "最后一页</p>\n";
            }
            else
            {
                echo "<a href='$PATH_INFO?page=$p_count'>最后一页</a></p>\n";
            }
         ?>

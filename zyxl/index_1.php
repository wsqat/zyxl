<?php
        include_once "header.php";
        $sch_table='yx_xx';
		$getplacename = mysql_real_escape_string($_GET['placename']); 
        include ('config/settings.php');
        $settings = new Settings_INI;  
        $settings->load('config/config.ini');  
        $FAQ = $settings->get('db.FAQ');       
        if(!empty($FAQ)){
            $faq=1;
        }
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
            //通知内栏
            include_once "cxsql/notice.php";
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

       

		<?php
		 	require("contest1.php");
		 ?>
                </div>
        </div>
    </div>
</div>




<!-- Footer -->
<?php require("footer.php");?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">//<![CDATA[
var curpage=document.hash.substr(1);
for (var i=1;i<=4;++i) {
  document.getElementById('qukuai'+i).style.display=(i==curpage)?'':'none';
}
//]]></script>
</body>
</html>
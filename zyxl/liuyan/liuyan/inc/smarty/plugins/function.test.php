<?php
function smarty_function_test($args, $template){
$str="";
for($i=0;$i<$args['times'];$i++){
$str.="<br/><font size=7 color='blue'>".$args['content']."</font>";
}
return $str;
}
<?php
/**  
* ini例子:config.ini  
*/  
//调用例子:  
include ('settings.php'); //原始环境假设每个类为单独的一个类名.php文件  
$settings = new Settings_INI;  
$settings->load('config.ini');  
echo 'INI.host: ' . $settings->get('db.host') . '<br>';  
echo 'INI.FAQ: ' . $settings->get('db.FAQ') . '';
?>
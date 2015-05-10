<?php
//全局加载项
//ini_set('display_errors', 'on');
//error_reporting(E_ALL);
/**
 * 一些全局需要加载的文件，函数或代码，在此加载。
 */
define('ROOT', dirname(__FILE__)); //网站根目录
require_once(ROOT.'/inc/config.inc.php');
require_once(ROOT.'/inc/smarty/Smarty.class.php'); 
require_once(ROOT.'/classes/class.MySql.php');
require_once(ROOT.'/classes/class.base.php');
require_once(ROOT.'/inc/function.php');
header('Content-Type: text/html; charset=UTF-8');
$DB = MySql::getInstance();
$smarty = new Smarty();
define('COUNTPERPAGE','5');
$smarty->template_dir = ROOT.'/templates/';//定义前台smaty的默认文件
$smarty->compile_dir = MY_SMARTY.'/templates_c/';
$smarty->config_dir = MY_SMARTY.'/config/';//没用的
$smarty->cache_dir = MY_SMARTY.'/cache/';//没用的
$smarty->caching = false;
$smarty->left_delimiter = '<{';//确定smaty的定界符
$smarty->right_delimiter = '}>';

$action = isset($_GET['action']) ? addslashes($_GET['action']) : (isset($_POST['action']) ? addslashes($_POST['action']) : 'index');
$ts = isset($_GET['ts']) ? addslashes($_GET['ts']) : (isset($_POST['ts']) ? addslashes($_POST['ts']) : 'list');
$page = isset($_GET['page']) ? intval($_GET['page']) : (isset($_POST['page']) ? intval($_POST['page']) : 1);

?>

<?php  
//-6指的是/+admin部分
require substr(dirname(__FILE__), 0,-6).'/init.inc.php';
global $_tpl;
Validate::checkSession();//判断是否非法登录
$_tpl->assign('admin_user',$_SESSION['admin']['admin_user']);
$_tpl->assign('level_name',$_SESSION['admin']['level_name']);
$_tpl->display('top.tpl');

?>
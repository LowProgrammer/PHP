<?php  
//-6指的是/+admin部分
require substr(dirname(__FILE__), 0,-6).'/init.inc.php';
global $_tpl;
Validate::checkSession();//判断是否非法登录
$_tpl->display('main.tpl');

?>
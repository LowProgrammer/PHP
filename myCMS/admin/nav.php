<?php  
//-6指的是/+admin部分
require substr(dirname(__FILE__), 0,-6).'/init.inc.php';
Validate::checkSession();//判断是否非法登录
global $_tpl;
//入口
$_nav=new NavAction($_tpl);
$_nav->_action();
$_tpl->display('nav.tpl');



?>
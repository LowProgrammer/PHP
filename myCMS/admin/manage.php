<?php  
//-6指的是/+admin部分
require substr(dirname(__FILE__), 0,-6).'/init.inc.php';

global $_tpl;

//入口
new ManageAction($_tpl);




?>
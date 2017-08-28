<?php  


	require dirname(__FILE__).'/template.inc.php';
	
	$_name="菲菲";
	$_content=" i love you";
	$tpl->assign('name',$_name);
	$tpl->assign('content',$_content);
	$tpl->assign('a',5<4);
	$_array=array(1,2,3,4,5,6,7,8,9,0);
	$tpl->assign('array',$_array);
	//载入tpl文件
	$tpl->display('index.tpl');
?>

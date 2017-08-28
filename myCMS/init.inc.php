<?php  
	//设置编码
	header("Content-type:text/html;charset=utf-8");
	//设置网站根目录
	define('ROOT_PATH', dirname(__FILE__));
	
	//引入模板信息
	require ROOT_PATH.'/config/profile.inc.php';
	// //引入模板类
	// require ROOT_PATH.'/includes/Templates.class.php';
	// //引入数据库
	// require ROOT_PATH.'/includes/DB.class.php';
	//引入工具类
	require ROOT_PATH.'/includes/Tool.class.php';
	//自动加载类
	
	function __autoload($_className){
		if(substr($_className, -6)=='Action') {
			require ROOT_PATH.'/action/'.$_className.'.class.php';
		}elseif (substr($_className, -5)=='Model') {
			require ROOT_PATH.'/model/'.$_className.'.class.php';
		}
		else{
			require ROOT_PATH.'/includes/'.$_className.'.class.php';
		}
	}
	//缓存机制
	require 'cache.inc.php';
	//实力化模板类
	$_tpl=new Templates();

?>
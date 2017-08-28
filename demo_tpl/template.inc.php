<?php  
	// //开启缓冲区
	// ob_start();
	//设置编码
	header("Content-type:text/html;charset=utf-8");
	//设置网站根目录
	define('ROOT_PATH', dirname(__FILE__));
	//echo ROOT_PATH;	
	//模板目录
	define('TPL_DIR', ROOT_PATH.'/templates/');
	//编译文件目录
	define('TPL_C_DIR', ROOT_PATH.'/templates_c/');
	//缓存文件目录
	define('CACHE', ROOT_PATH.'/cache/');
	//是否开启缓冲区
	define("IS_CACHE", true);
	//判断是否开启
	IS_CACHE?ob_start():null;





	//引入模板类
	require ROOT_PATH.'/includes/Templates.class.php';
	//实力化模板类
	$tpl=new Templates();

?>
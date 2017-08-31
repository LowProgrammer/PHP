<?php  
	//数据库配置文件
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "root");
	define("DB_NAME", "ff_cms");

    //系统配置文件
    define('GPC',get_magic_quotes_gpc());//sql转义功能是否打开
	define('PAGE_SIZE',10);//每页
    define('PREV_URL',$_SERVER['HTTP_REFERER']);//上一页地址
	//模板配置信息
	define('TPL_DIR', ROOT_PATH.'/templates/');//模板目录

	define('TPL_C_DIR', ROOT_PATH.'/templates_c/');	//编译文件目录

	define('CACHE', ROOT_PATH.'/cache/');	//缓存文件目录


?>
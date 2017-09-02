<?php  


//模板类
/**
*  
*/
class Templates
{
	//接受变量，字段接收数量不确定
	private $_vars=array();

	//保存系统变量
	private $_config=array();
	function __construct()
	{
		if(!is_dir(TPL_DIR)||!is_dir(TPL_C_DIR)||!is_dir(CACHE)){
			exit("ERRORR:模板不存在或者模板解析类不存在或者缓存文件不存在,请手动添加");
		}

		//保存系统变量
		$_sxe=simplexml_load_file(ROOT_PATH."/config/profile.xml");
		$taglib=$_sxe->xpath('/root/taglib');
		foreach($taglib as $_tag){
			$this->_config["$_tag->name"]=$_tag->value;
		}
		
	}


	//assign方法,用于注入变量
	public function assign($_var,$_value){
		//$_var同步模板变量名
		if (isset($_var)&&!empty($_var)) {
			# code...
			$this->_vars[$_var]=$_value;
		}else{
			exit('请设置模板变量');
		}
	}
	//display方法
	public function display($_file){
		//给include进来的tpl传递一个模板对象
		$_tpl=$this;
		//设置模板路径
		$_tplFile=TPL_DIR.$_file;
		//判断模板是否存在
		if(!file_exists($_tplFile)){
			exit("模板文件不存在");
		}
		//是否加入参数
        if(!empty($_SERVER['QUERY_STRING'])) {
            $_file .= $_SERVER['QUERY_STRING'];
        }
		//生成编译文件
		$_parseFile=TPL_C_DIR.md5($_file).$_file.'.php';
		//缓存文件
		$_cacheFile=CACHE.md5($_file).$_file.'.html';
		//当第二次运行，直接载入缓存文件
		if(IS_CACHE){
			//判断文件是否尊在
			if(file_exists($_cacheFile)&&file_exists($_parseFile)){
				//判断是否修改过
				if(filemtime($_parseFile)>=filemtime($_tplFile)&&filemtime($_cacheFile)>filemtime($_parseFile)){
					//echo "huancun";
					include $_cacheFile;
					return ;
				}
				
			}
		}
		//编译文件不存在，或者模板文件修改则生成编译文件
		if(!file_exists($_parseFile)||filemtime($_parseFile)<filemtime($_tplFile)){
			require_once ROOT_PATH.'/includes/Farser.class.php';
			$_parser=new Farser($_tplFile);//
			$_parser->compile($_parseFile);
		}
		//载入编译文件
		include $_parseFile;
		if(IS_CACHE){
			//获取缓冲区内容
			//echo ob_get_contents();
			//获取缓冲区文件名，并写入缓冲区
			file_put_contents($_cacheFile, ob_get_contents());
			//清除缓冲区（清除编译文件的内容）
			ob_end_clean();
			//
			include $_cacheFile;
		}
		
	}

	//闯将create方法，用于header和footer这种使用
	public function create($_file){
		//设置模板路径
		$_tplFile=TPL_DIR.$_file;
		//判断模板是否存在
		if(!file_exists($_tplFile)){
			exit("模板文件不存在");
		}
		//生成编译文件
		$_parseFile=TPL_C_DIR.md5($_file).$_file.'.php';


		//编译文件不存在，或者模板文件修改则生成编译文件
		if(!file_exists($_parseFile)||filemtime($_parseFile)<filemtime($_tplFile)){
			require_once ROOT_PATH.'/includes/Farser.class.php';
			$_parser=new Farser($_tplFile);//
			$_parser->compile($_parseFile);
		}
		//载入编译文件
		include $_parseFile;
	}
	
}


?>
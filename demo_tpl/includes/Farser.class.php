<?php  

//模板解析类
/**
* 
*/
class Farser
{
	//保存模板内容
	private $_tpl;
	public function __construct($_tplFile)
	{
		if(!$this->_tpl=file_get_contents($_tplFile)){
			exit("ERROR:模板文件读取错误");
		}
	}


	private function parVar(){
		//a-zA-Z0-9_
		//查找变量，替换变量
		
		$_pattern='/\{\$([\w]+)\}/';
		if(preg_match($_pattern, $this->_tpl)){
			$this->_tpl=preg_replace($_pattern, "<?php echo \$this->_vars['$1'];?>", $this->_tpl);
			
		}
	}

	private function parif(){
		$_pattenEndif='/\{\/if\}/';
		$_pattenif='/\{if\s+\$([\w]+)\}/';
		$_pattenelse='/\{else\}/';
		if(preg_match($_pattenif,$this->_tpl)){
			if(preg_match($_pattenEndif, $this->_tpl)){
				$this->_tpl=preg_replace($_pattenif, "<?php if(\$this->_vars['$1']){ ?>", $this->_tpl);
				$this->_tpl=preg_replace($_pattenEndif,"<?php }?>", $this->_tpl);
				if(preg_match($_pattenelse, $this->_tpl)){
						$this->_tpl=preg_replace($_pattenelse,"<?php }else{?>", $this->_tpl);
				}
			}
			else
			{
				exit("ERROR：if语句没有关闭");
			}
		}
	}

	private function parComment(){
		$_patten='/\{#\}(.*)\{#\}/';
		if(preg_match($_patten, $this->_tpl)){
			$this->_tpl=preg_replace($_patten, "<?php /* $1*/?>", $this->_tpl);
		}
	}

	private function parForeach(){
		$_pattenForeach='/\{foreach\s+\$([\w]+)\(([\w]+),([\w]+)\)\}/';
		$_pattenEndForeach='/\{\/foreach\}/';
		$_pattenVar='/{@([\w]+)}/';
		if(preg_match($_pattenForeach, $this->_tpl)){
			if(preg_match($_pattenEndForeach, $this->_tpl)){
				$this->_tpl=preg_replace($_pattenForeach, "<?php  foreach(\$this->_vars['$1'] as \$$2 =>\$$3){?>", $this->_tpl);
				$this->_tpl=preg_replace($_pattenEndForeach, "<?php }?>", $this->_tpl);
				if(preg_match($_pattenVar, $this->_tpl)){
					$this->_tpl=preg_replace($_pattenVar, "<?php echo \$$1;?>", $this->_tpl);
				}
			}
			else{
				echo "结束标签必须有";
			}
		}
	}

	private function parInclude(){
		$_pattenInclude='/{include\s+file=\"([\w\.\-]+)\"}/';
		if(preg_match($_pattenInclude, $this->_tpl,$_file)){
			if(!file_exists($_file[1])||empty($_file)){
				exit("ERROR:包含文件错误");
			}
			$this->_tpl=preg_replace($_pattenInclude, "<?php include'$1';?>",$this->_tpl);

		}
	}

	private function parConfig(){
		$_patten='/<!--\{([\w]+)\}-->/';
		if(preg_match($_patten, $this->_tpl)){
			$this->_tpl=preg_replace($_patten, "<?php echo \$this->_config['$1'];?>", $this->_tpl);
		}

	}
	//对外公共方法
	public function compile($_parseFile){
		//解析模板
		$this->parVar();
		$this->parif();
		$this->parComment();
		$this->parForeach();
		$this->parInclude();
		$this->parConfig();
		//解析模板文件
		if(!file_put_contents($_parseFile, $this->_tpl)){
			exit("ERROR：编译文件生成错误");
		}
	}
	
}
?>
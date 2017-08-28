<?php 

	/**
	* 
	*/
	class Main
	{
		
		private $_index;
		private $_send;

		public function __construct($index="")
		{
			$this->_index=$index;
			//echo $this->_index;
			# code...
			if(isset($_POST['send'])){
				$this->_send=$_POST['send'];
			}
		}

		public function _run(){
			$this->_send();

			include $this->_ui();
		}

		//载入界面
		//返回界面地址字符串，例如start.inc.php
		private function _ui(){
			if(empty($this->_index)||!file_exists($this->_index.'.inc.php')){
				$this->_index="start";
			}
			return $this->_index.'.inc.php';
		}

		

		private function _send(){
			switch ($this->_send) {
				case '注册':
					# code...
					
					$this->_exec(new Reg($_POST['username'],$_POST['password'],$_POST['notpassword'],$_POST['email']));
					//echo "注册";
					break;
				case '登录':
					# code...
					
					$this->_exec(new login($_POST['username'],$_POST['password']));
					//echo "登录";
					break;
				default:
					# code...
					break;
			}
		}

		private function _exec($_class){
			if(!$_class->_check()){
				Tool::_alertback("不能为空");
			}else{
				$_class->_query();
			}
			
		}

		
	}



 ?>
<?php  
	
	/**
	* 
	*/
	class Login extends User
	{
		public function __construct($_userName,$_passWord){
			$this->_username=$_userName;
			$this->_password=$_passWord;
		}
		public function _query(){
			$_sxe=simplexml_load_file("user.xml");
			if($this->_username==$_sxe->username&&$this->_password==$_sxe->password){
				setcookie('user',$this->_username);
				Tool::_alertLocation('登陆成功','?index=member');
			}else{
				Tool::_alertBack('登录失败');
			}
			

		}
		public function _check(){
			if(	empty($this->_username)||
				empty($this->_password)
				
				){
				return false;
			}
				return true;
			
		}
		
	}
?>
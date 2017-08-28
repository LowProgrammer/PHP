<?php  
	/**
	* 
	*/
	class Reg extends User
	{
		public function __construct($_userName,$_passWord,$_notePassWord,$_eMail){
			$this->_username=$_userName;
			$this->_notpassword=$_notePassWord;
			$this->_password=$_passWord;
			$this->_emial=$_eMail;
		}

		public function _query(){
			$_xml=<<<_xml
<?xml version="1.0" encoding="UTF-8"?>
<user>
	<username>$this->_username</username>
	<password>$this->_password</password>
	<email>$this->_emial</email>
</user>
_xml;
		$_sxe=new SimpleXMLElement($_xml);
		$_sxe->asXML('user.xml');

		Tool::_alertLocation('注册成功','?index=login');
		}
		public function _check(){
			if(	empty($this->_username)||
				empty($this->_password)||
				empty($this->_notpassword)||
				empty($this->_emial)
				){
				return false;
			}
				return true;
			
		}
		
	}


?>
<?php

	//用户抽象类，用来规范子类的字段和方法
	
	abstract class User 
	{
		
		protected $_username;
		protected $_password;
		protected $_notpassword;
		protected $_email;


		abstract function _query();

		abstract function _check();
	}
?>
<?php  
	class ContentModel extends Model{

		//拦截器
		public function __set($_key,$_value){
			$this->$_key=Tool::mysqlSttring($_value);
		}
		public function __get($_key){
			return $this->$_key;
		}
	}
?>
<?php  
	class DB{
		//获取对象句柄
		static public function getDB(){
			//连接数据库，并且获取数据库句柄
			$_mysqli=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			//判断数据库连接是否错误
			if(mysqli_connect_errno()){
				echo "数据库连接错误！错误代码：".mysqli_connect_errno();
				exit();
			}
			//设置编码集
			$_mysqli->set_charset('utf8');
			return $_mysqli;
		}
		//清理方法,一定要传地址
		static public function unDB(&$_result,&$_db){
			if(is_object($_result)){
				//清理结果集
				$_result->free();
				//销毁结果集对象
				$_result=null;
			}
			if(is_object($_db)){
				//关闭数据库
				$_db->close();
				//销毁数据库句柄
				$_db=null;
			}
			

		}
	}

?>
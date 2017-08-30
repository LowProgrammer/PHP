<?php 
	//模型基类
	class Model{
	    //查找总记录模型
        protected  function total($_sql){
            $_db=DB::getDB();
            $_result=$_db->query($_sql);
            $total=$_result->fetch_row();
            //$total=$_result->num_rows;
            DB::unDB($_result,$_db);
            return $total[0];
        }
		//查找单个数据
		protected function one($_sql){
			$_db=DB::getDB();
			//获取结果集
			$_result=$_db->query($_sql);
			//打印出第一组数据
			$_objects=$_result->fetch_object();
			DB::unDB($_result,$_db);
			return Tool::htmlString($_objects);
		}
		//查找多个数据模型
		protected function all($_sql){
			//使用过程化操作数据库
			$_db=DB::getDB();
			//获取结果集
			$_result=$_db->query($_sql);
			$_html=array();
			//打印出第一组数据
			while (!!$_objects=$_result->fetch_object()) {
				$_html[]=$_objects;
			}
			DB::unDB($_result,$_db);
			return Tool::htmlString($_html);
		}

		//CURD操作
		protected function aud($_sql){
			$_result=null;
			$_db=DB::getDB();
			$_db->query($_sql);
			$_affected_rows=$_db->affected_rows;
			DB::unDB($_result,$_db);
			return $_affected_rows;
		}
	}
?>
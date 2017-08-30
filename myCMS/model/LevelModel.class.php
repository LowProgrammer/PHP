<?php  
	class LevelModel extends Model{

		
		private $_level_name;
		private $_level_info;
		private $_id;
        private $_limit;

		//拦截器
		public function __set($_key,$_value){
			$this->$_key=Tool::mysqlSttring($_value);
		}
		public function __get($_key){
			return $this->$_key;
		}
        //获取等级总记录
        public function  getLevelTotal(){

            $_sql="SELECT COUNT(*) FROM cms_level";
            return parent::total($_sql);
        }
		//查询单个管理员
		public function getOneLevel(){
			
			$_sql="SELECT 
						id,
						level_name,
						level_info 
					FROM 
						cms_level 
					WHERE 
						id='$this->_id' 
					OR  
					    level_name='$this->_level_name'
					LIMIT 1";
			return parent::one($_sql);
		}
		//查询所有等级，不带LIMIT
		public function getAllLevel(){
			
			//sql语句
			$_sql="SELECT 
						id,
						level_name,
						level_info 
					FROM 
						cms_level 
					
					ORDER BY
						id DESC 
					";
			return parent::all($_sql);
		}	
        //查询所有等级，待Limit
        public function getAllLimitLevel(){
            //sql语句
            $_sql="SELECT 
						id,
						level_name,
						level_info 
					FROM 
						cms_level 
					
					ORDER BY
						id DESC 
					$this->_limit
					";
            return parent::all($_sql);
        }
        //新增管理员
		public function addLevel(){
			
			
			$_sql="INSERT INTO cms_level(
											level_name,
											level_info
						) values(
									'$this->_level_name',
									'$this->_level_info'
						)";
			return parent::aud($_sql);
		}

		//修改管理员
		public function updateLevel(){
			
			$_sql="UPDATE 
						cms_level
					SET 
						level_name='$this->_level_name',
						level_info='$this->_level_info' 
					WHERE 
						id='$this->_id' 
					LIMIT 
					1
				";
			return parent::aud($_sql);
		}

		//删除管理员
		public function deleteLevel(){
			
			$_sql="DELETE FROM 
								cms_level 
							WHERE 
								id='$this->_id' 
							LIMIT 
							1
					";
			return parent::aud($_sql);
		}
	}
?>
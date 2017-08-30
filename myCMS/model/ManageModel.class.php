<?php  
	class ManageModel extends Model{

		
		private $_admin_user;
		private $_admin_pass;
		private $_level;
		private $_id;
        private $_limit;
        private $_last_ip;

		//拦截器
		public function __set($_key,$_value){
			$this->$_key=Tool::mysqlSttring($_value);
		}
		public function __get($_key){
			return $this->$_key;
		}
		//设置管理员登录统计次数。ip。时间
        public function setLoginCount(){
		    $_sql="UPDATE 
                      cms_manage 
                  SET 
                      login_count=login_count+1,
                       last_ip='$this->_last_ip',
                       last_time=NOW()
                  WHERE 
                      admin_user='$this->_admin_user' 
                  LIMIT 1";
            return parent::aud($_sql);
        }
        //获取管理员总记录
        public function  getManageTotal(){

		    $_sql="SELECT COUNT(*) FROM cms_manage";
		   return parent::total($_sql);
        }
        //查询登录管理员
        public  function  getLoginManage(){
            $_sql="SELECT 
						m.admin_user,
						l.level_name
					FROM 
						cms_manage m,
						cms_level l
					WHERE 
						m.admin_user='$this->_admin_user'
					AND 
					    m.admin_pass='$this->_admin_pass'
					AND 
					    m.level=l.id
					LIMIT 1";
            return parent::one($_sql);
        }
		//查询单个管理员
		public function getOneManage(){
			
			$_sql="SELECT 
						id,
						admin_user,
						level ,
						admin_pass
					FROM 
						cms_manage 
					WHERE 
						id='$this->_id' 
					OR
					    admin_user='$this->_admin_user'
					OR 
					    level='$this->_level'
					LIMIT 
					1";
			return parent::one($_sql);
		}
		//查询所有管理员
		public function getAllManage(){
			
			//sql语句
			$_sql="SELECT 
						m.id,
						m.admin_user,
						m.login_count,
						m.last_ip,
						m.last_time,
						l.level_name 
					FROM 
						cms_manage m,
						cms_level l
					WHERE 
						l.id=m.level
					ORDER BY
						m.id DESC 
					$this->_limit
					";
			return parent::all($_sql);
		}	

		//新增管理员
		public function addManage(){
			
			
			$_sql="INSERT INTO cms_manage(
											admin_user,
											admin_pass,
											level,
											reg_time
						) values(
									'$this->_admin_user',
									'$this->_admin_pass',
									'$this->_level',
									NOW()
						)";
			return parent::aud($_sql);
		}

		//修改管理员
		public function updateManage(){
			
			$_sql="UPDATE 
						cms_manage 
					SET 
						admin_pass='$this->_admin_pass',
						level='$this->_level' 
					WHERE 
						id='$this->_id' 
					LIMIT 
					1
				";
			return parent::aud($_sql);
		}

		//删除管理员
		public function deleteManage(){
			
			$_sql="DELETE FROM 
								cms_manage 
							WHERE 
								id='$this->_id' 
							LIMIT 
							1
					";
			return parent::aud($_sql);
		}
	}
?>
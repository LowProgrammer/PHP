<?php  
	class NavModel extends Model{

		
		private $_nav_name;
		private $_nav_info;
		private $_pid;
		private $_sort;
		private $_id;
        private $_limit;

		//拦截器
		public function __set($_key,$_value){
			$this->$_key=Tool::mysqlSttring($_value);
		}
		public function __get($_key){
			return $this->$_key;
		}
        //排序导航
        public function setNavSort(){
            $_sql='';
            foreach ($this->_sort as $key=>$value){
                if(!is_numeric($value)) continue;
                $_sql.="UPDATE cms_nav SET sort='$value' WHERE id='$key';";
            }
            return parent::multi($_sql);
        }		//前台显示指定的主导航
        public function getFrontNav(){
            //sql语句
            $_sql="SELECT 
						id,
						nav_name				
					FROM 
						cms_nav 
					WHERE pid=0 ORDER BY sort ASC 
				    LIMIT
					  0,".NAV_SIZE;
            return parent::all($_sql);
        }
        //获取主导航总记录
        public function  getNavTotal(){

            $_sql="SELECT COUNT(*) FROM cms_nav WHERE pid=0";
            return parent::total($_sql);
        }
        //获取子导航总记录
        public function  getNavChildTotal(){

            $_sql="SELECT COUNT(*) FROM cms_nav WHERE pid='$this->_id'";
            return parent::total($_sql);
        }
        //查询所有主导航
        public function getAllNav(){
            //sql语句
            $_sql="SELECT 
						id,
						nav_name,
						nav_info ,
						sort
					FROM 
						cms_nav 
					WHERE 
					  pid=0
				    ORDER BY
				      sort ASC 
					$this->_limit
					";
            return parent::all($_sql);
        }
        //查询所有子导航
        public function getAllChildNav(){
            //sql语句
            $_sql="SELECT 
						id,
						nav_name,
						nav_info,
						sort
					FROM 
						cms_nav WHERE pid='$this->_id' ORDER BY sort ASC 
				
					$this->_limit
					";
            return parent::all($_sql);
        }
        //查询子导航不带limit
        public function getAllChildFontNav(){
            //sql语句
            $_sql="SELECT 
						id,
						nav_name,
						nav_info,
						sort
					FROM 
						cms_nav WHERE pid='$this->_id' ORDER BY sort ASC ";
            return parent::all($_sql);
        }
        //新增管理员
        public function addNav(){


            $_sql="INSERT INTO cms_nav(
											nav_name,
											nav_info,
											pid,
											sort
						) values(
									'$this->_nav_name',
									'$this->_nav_info',
									'$this->_pid',
									".parent::nextid('cms_nav')."
						)";
            return parent::aud($_sql);
        }

        //查询单个管理员
        public function getOneNav(){

            $_sql="SELECT 
						n1.id,
						n1.nav_name,
						n1.nav_info,
						n2.id iid,
						n2.nav_name nnav_name
					FROM 
						cms_nav n1
					LEFT JOIN
					    cms_nav n2
					    ON
					    n1.pid=n2.id
					WHERE 
					    n1.id='$this->_id'
					OR
					    n1.nav_name='$this->_nav_name'
					LIMIT 1";
            return parent::one($_sql);
        }

        //删除管理员
        public function deleteNav(){

            $_sql="DELETE FROM 
								cms_nav 
							WHERE 
								id='$this->_id' 
							LIMIT 
							1
					";
            return parent::aud($_sql);
        }

        //修改管理员
        public function updateNav(){

            $_sql="UPDATE 
						cms_nav
					SET 
						level_name='$this->_nav_name',
						level_info='$this->_nav_info' 
					WHERE 
						id='$this->_id' 
					LIMIT 
					1
				";
            return parent::aud($_sql);
        }
	}
?>
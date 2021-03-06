<?php  
	class ContentModel extends Model{
	    private $_id;
        private $_title;
        private $_nav;
        private $_attr;
        private $_tag;
        private $_keyword;
        private $_thumbnail;
        private $_info;
        private $_source;
        private $_author;
        private $_content;
        private $_gold;
        private $_commend;
        private $_count;
        private $_color;
        private $_limit;
        private $_sort;
        private $_readlimit;
		//拦截器
		public function __set($_key,$_value){
			$this->$_key=Tool::mysqlSttring($_value);
		}
		public function __get($_key){
			return $this->$_key;
		}
        //新增文档内容
        public function addContent(){
            $_sql="INSERT INTO cms_content(title,attr,nav,info,thumbnail,source,author,tag,keyword,content,
                    gold,commend,count,color,sort,readlimit
                    date)values('$this->_title','$this->_attr','$this->_nav','$this->_info','$this->_thumbnail','$this->_source',
                    '$this->_author','$this->_tag','$this->_keyword','$this->_content',
                    '$this->_gold','$this->_commend','$this->_count','$this->_color','$this->_sort','$this->_readlimit'
                    NOW())";
            return parent::aud($_sql);
        }
        //获取文档列表
        public function getListContent(){
            $_sql="SELECT c.id,c.attr,c.title,c.title t,c.nav,c.date,c.info,c.thumbnail,c.count,n.nav_name FROM cms_content c,cms_nav n WHERE c.nav=n.id AND c.nav 
                  ORDER BY date DESC 
                  IN($this->_nav) $this->_limit";
            return parent::all($_sql);
        }
        //获取单一的文档内容
        public function getOneContent(){
            $_sql="SELECT id,title,nav,content,info,date,count,author,source,thumbnail,tag,keyword,gold,attr,color,sort,readlimit,commend FROM cms_content WHERE id='$this->_id'";
            return parent::one($_sql);
        }

        //获取内容总记录
        public function  getListContentTotal(){

            $_sql="SELECT COUNT(*)  FROM cms_content c,cms_nav n WHERE c.nav=n.id AND c.nav IN($this->_nav)";
            return parent::total($_sql);
        }
	}
?>
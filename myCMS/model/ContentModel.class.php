<?php  
	class ContentModel extends Model{
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
                    gold,commend,count,color,
                    date)values('$this->_title','$this->_attr','$this->_nav','$this->_info','$this->_thumbnail','$this->_source',
                    '$this->_author','$this->_tag','$this->_keyword','$this->_content',
                    '$this->_gold','$this->_commend','$this->_count','$this->_color',
                    NOW())";
            return parent::aud($_sql);
        }
	}
?>
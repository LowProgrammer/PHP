<?php  
class Action{
		protected $_tpl;
		protected $_model;

		protected function __construct(&$_tpl,&$_model=null){
			$this->_tpl=$_tpl;
			$this->_model=$_model;
		}
		protected function page($_total){
            $_page=new Page($_total,PAGE_SIZE);
            $this->_model->_limit=$_page->_limit;
            $this->_tpl->assign('page',$_page->showPage());
            $this->_tpl->assign('num',($_page->_page-1)*PAGE_SIZE);
        }
	}

?>
<?php  
/**
* 
*/
class ContentAction extends Action
{
	// private $_tpl;
	// private $_model;
	public function __construct(&$_tpl){

		parent::__construct($_tpl,new ContentModel());

	}
	//
	public function _action(){

			$this->_tpl->assign('show',false);
			$this->_tpl->assign('add',false);
			$this->_tpl->assign('update',false);
			$this->_tpl->assign('delete',false);
			switch ($_GET['action']) {				
				case 'show':
					$this->show();
					break;
				case 'add':
					$this->add();
					break;
				case 'update':
					$this->update();
					break;
				case 'delete':
					$this->deleteLevel();
					break;
				default:
					Tool::alertBack('非法操作！');	
					break;
			}
			
	}
	private function show(){

	}

	private function add(){
        $this->_tpl->assign('prev',PREV_URL);
        $this->_tpl->assign('add',true);
        $this->_tpl->assign('title',"新增文档");
	}
	private function update(){

	}
	public function deleteLevel(){

	}
}

?>
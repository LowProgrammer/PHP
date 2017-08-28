<?php  
/**
* 
*/
class LevelAction extends Action
{
	// private $_tpl;
	// private $_model;
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new LevelModel());
		$this->_action();
		$this->_tpl->display('level.tpl');
	}
	//
	private function _action(){

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
					$this->delete();
					break;
				default:
					Tool::alertBack('非法操作！');	
					break;
			}
			
	}
	private function show(){
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('title',"等级列表");
		$this->_tpl->assign("AllLevel",$this->_model->getAllLevel());
	}
	private function add(){
		if(isset($_POST['send'])){
            if(Validate::checkNull($_POST['level_name'])) Tool::alertBack('等级名称不能为空');
            if(Validate::checkLength($_POST['level_name'],2,'min')) Tool::alertBack('等级名称不得小于两位');
            if(Validate::checkLength($_POST['level_name'],20,'max')) Tool::alertBack('等级名称不得大于二十位');
            if(Validate::checkLength($_POST['level_info'],200,'max')) Tool::alertBack('等级描述不得大于二十位');
			$this->_model->_level_name=$_POST['level_name'];
			$this->_model->_level_info=$_POST['level_info'];
			$this->_model->addLevel()?Tool::alertLocation('恭喜你，新增等级成功！','level.php?action=show'):Tool::alertBack('很遗憾，新增等级失败！');
		}
		$this->_tpl->assign('add',true);
		$this->_tpl->assign('title',"新增等级");
	}
	private function update(){
		if(isset($_POST['send'])){
            if(Validate::checkNull($_POST['level_name'])) Tool::alertBack('等级不能为空');
            if(Validate::checkLength($_POST['level_name'],2,'min')) Tool::alertBack('等级不得小于两位');
            if(Validate::checkLength($_POST['level_name'],20,'max')) Tool::alertBack('等级不得大于二十位');
            if(Validate::checkLength($_POST['level_info'],200,'max')) Tool::alertBack('等级名称不得大于二十位');
			$this->_model->_id=$_POST['id'];
			$this->_model->_level_name=$_POST['level_name'];
			$this->_model->_level_info=$_POST['level_info'];
						//echo $this->_id;
			$this->_model->updateLevel()?Tool::alertLocation('恭喜你，修改等级成功','level.php?action=show'):Tool::alertBack('很遗憾修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			is_object($this->_model->getOneLevel())?true:Tool::alertBack('等级传值的id有误');
			$this->_tpl->assign('id',$this->_model->getOneLevel()->id);
			$this->_tpl->assign('level_name',$this->_model->getOneLevel()->level_name);
			$this->_tpl->assign('level_info',$this->_model->getOneLevel()->level_info);
			$this->_tpl->assign('update',true);
			$this->_tpl->assign('title',"修改等级");
			
		}else{
			Tool::alertBack('非法操作！');
		}
		
					
	}
	public function deleteLevel(){
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			$this->_model->deleteLevel()?Tool::alertLocation('恭喜你，等级删除成功','level.php?action=show'):alertBack('很遗憾，等级删除失败');
		}
		else{
			Tool::alertBack('非法操作');
		}
					//$this->_tpl->assign('delete',true);
					//$this->_tpl->assign('title',"删除管理员");
	}
}

?>
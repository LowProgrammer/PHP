<?php  
/**
* 
*/
class LevelAction extends Action
{
	// private $_tpl;
	// private $_model;
	public function __construct(&$_tpl){
        Validate::checkSession();//判断是否非法登录
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
					$this->deleteLevel();
					break;
				default:
					Tool::alertBack('非法操作！');	
					break;
			}
			
	}
	private function show(){
	    parent::page($this->_model->getLevelTotal());
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('title',"等级列表");
		$this->_tpl->assign("AllLevel",$this->_model->getAllLimitLevel());
	}
	private function add(){
		if(isset($_POST['send'])){
            if(Validate::checkNull($_POST['level_name'])) Tool::alertBack('等级名称不能为空');
            if(Validate::checkLength($_POST['level_name'],2,'min')) Tool::alertBack('等级名称不得小于两位');
            if(Validate::checkLength($_POST['level_name'],20,'max')) Tool::alertBack('等级名称不得大于二十位');
            if(Validate::checkLength($_POST['level_info'],200,'max')) Tool::alertBack('等级描述不得大于二十位');
			$this->_model->_level_name=$_POST['level_name'];
			if($this->_model->getOneLevel())Tool::alertBack('该等级名称已存在');
			$this->_model->_level_info=$_POST['level_info'];
			$this->_model->addLevel()?Tool::alertLocation('恭喜你，新增等级成功！','level.php?action=show'):Tool::alertBack('很遗憾，新增等级失败！');
		}
        $this->_tpl->assign('prev',PREV_URL);
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
			$this->_model->updateLevel()?Tool::alertLocation('恭喜你，修改等级成功',$_POST['prev_url']):Tool::alertBack('很遗憾修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			$_level=$this->_model->getOneLevel();
			is_object($_level)?true:Tool::alertBack('等级传值的id有误');
			$this->_tpl->assign('id',$_level->id);
			$this->_tpl->assign('level_name',$_level->level_name);
			$this->_tpl->assign('level_info',$_level->level_info);
			$this->_tpl->assign('prev',PREV_URL);
			$this->_tpl->assign('update',true);
			$this->_tpl->assign('title',"修改等级");
			
		}else{
			Tool::alertBack('非法操作！');
		}
		
					
	}
	public function deleteLevel(){
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			$_manage=new ManageModel();
			$_manage->_level=$this->_model->_id;
			if($_manage->getOneManage())Tool::alertBack('此等级已存在用户，无法删除，请先删除用户');
			$this->_model->deleteLevel()?Tool::alertLocation('恭喜你，等级删除成功',PREV_URL):alertBack('很遗憾，等级删除失败');
		}
		else{
			Tool::alertBack('非法操作');
		}
					//$this->_tpl->assign('delete',true);
					//$this->_tpl->assign('title',"删除管理员");
	}
}

?>
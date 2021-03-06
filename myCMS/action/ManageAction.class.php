<?php  
/**
* 
*/
class ManageAction extends Action
{

	// private $_tpl;
	// private $_model;
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new ManageModel());

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
					$this->delete();
					break;
				default:
					Tool::alertBack('非法操作！');	
					break;
			}
			
	}


	private function show(){
        parent::page($this->_model->getManageTotal());
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('title',"管理员列表");
		$this->_tpl->assign("AllManage",$this->_model->getAllManage());

	}
	private function add(){
		if(isset($_POST['send'])){
		    if(Validate::checkNull($_POST['admin_user'])) Tool::alertBack('用户名不能为空');
		    if(Validate::checkLength($_POST['admin_user'],2,'min')) Tool::alertBack('用户名不得小于两位');
            if(Validate::checkLength($_POST['admin_user'],20,'max')) Tool::alertBack('用户名不得大于二十位');
            if(Validate::checkNull($_POST['admin_pass'])) Tool::alertBack('密码不能为空');
            if(Validate::checkLength($_POST['admin_pass'],6,'min')) Tool::alertBack('密码不得小于六位');
            if(Validate::checkEquals($_POST['admin_pass'],$_POST['admin_notpass'])) Tool::alertBack('密码确认必须一致');

            $this->_model->_admin_user=$_POST['admin_user'];
            if($this->_model->getOneManage()) Tool::alertBack('该用户已存在');
			$this->_model->_admin_pass=sha1($_POST['admin_pass']);
			$this->_model->_level=$_POST['level'];
			$this->_model->addManage()?Tool::alertLocation('恭喜你，新增用户成功！','manage.php?action=show'):Tool::alertBack('很遗憾，新增用户失败！');
		}
		$this->_tpl->assign('add',true);
		$this->_tpl->assign('title',"新增管理员");
        $this->_tpl->assign('prev',PREV_URL);
		$_level=new LevelModel();
		$this->_tpl->assign('AllLevel',$_level->getAllLevel());

	}
	private function update(){
		if(isset($_POST['send'])){

			$this->_model->_id=$_POST['id'];
			if(trim($_POST['admin_pass'])==''){
			    $this->_model->admin_pass=$_POST['pass'];
            }else{
			    if(Validate::checkLength($_POST['admin_pass'],6,'min')) Tool::alertBack('密码不得小于六位');
                $this->_model->_admin_pass=sha1($_POST['admin_pass']);
            }

			$this->_model->_level=$_POST['level'];
						//echo $this->_id;
			$this->_model->updateManage()?Tool::alertLocation('恭喜你，修改管理员成功',$_POST['prev_url']):Tool::alertBack('很遗憾修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			$_manage=$this->_model->getOneManage();
			is_object($_manage)?true:Tool::alertBack('管理员传值的id有误');
			$this->_tpl->assign('id',$_manage->id);
			$this->_tpl->assign('level',$_manage->level);
			$this->_tpl->assign('admin_user',$_manage->admin_user);
            $this->_tpl->assign('admin_pass',$_manage->admin_pass);
			$this->_tpl->assign('update',true);
			$this->_tpl->assign('title',"修改管理员");
			$this->_tpl->assign('prev',PREV_URL);
            $_level=new LevelModel();
            $this->_tpl->assign('AllLevel',$_level->getAllLevel());
		}else{
			Tool::alertBack('非法操作！');
		}
		
					
	}
	public function delete(){
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			$this->_model->deleteManage()?Tool::alertLocation('恭喜你，管理员删除成功',PREV_URL):alertBack('很遗憾，管理员删除失败');
		}
		else{
			Tool::alertBack('非法操作');
		}
					//$this->_tpl->assign('delete',true);
					//$this->_tpl->assign('title',"删除管理员");
	}
}

?>
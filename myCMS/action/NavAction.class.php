<?php  
/**
* 
*/
class NavAction extends Action
{
	// private $_tpl;
	// private $_model;
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new NavModel());
	}
	//
	public function _action(){

			$this->_tpl->assign('show',false);
			$this->_tpl->assign('add',false);
			$this->_tpl->assign('update',false);
			$this->_tpl->assign('delete',false);
            $this->_tpl->assign('addChild',false);
            $this->_tpl->assign('showChild',false);
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
                case 'addChild':
                    $this->addChild();
                    break;
                case 'showChild':
                    $this->showChild();
                    break;
                case "sort":
                    $this->sort();
                    break;
				default:
					Tool::alertBack('非法操作！');	
					break;
			}
			
	}
	//sort排序方法
	private function sort(){
        if(isset($_POST['send'])){
            $this->_model->_sort=$_POST['sort'];
            if($this->_model->setNavSort())Tool::alertLocation(null,PREV_URL);;
        }

    }
	private function addChild(){
	    if(isset($_POST['send'])){
	        $this->add();
        }
        if(isset($_GET['id'])){
            $this->_model->_id=$_GET['id'];
            $_nav=$this->_model->getOneNav();
            is_object($_nav)?true:Tool::alertBack('导航传值的id有误');
            $this->_tpl->assign('id',$_nav->id);
            $this->_tpl->assign('addChild',true);
            $this->_tpl->assign('title',"新增子导航");
            $this->_tpl->assign('prev_name',$_nav->nav_name);
            $this->_tpl->assign('prev',PREV_URL);
        }
    }
    private function showChild(){
        if(isset($_GET['id'])){
            $this->_model->_id=$_GET['id'];
            $_nav=$this->_model->getOneNav();
            is_object($_nav)?true:Tool::alertBack('导航传值的id有误');
            parent::page($this->_model->getNavChildTotal());
            $this->_tpl->assign('id',$_nav->id);
            $this->_tpl->assign('showChild',true);
            $this->_tpl->assign('title',"子导航列表");
            $this->_tpl->assign('prev_name',$_nav->nav_name);
            $this->_tpl->assign("AllChildNav",$this->_model->getAllChildNav());
            $this->_tpl->assign('prev',PREV_URL);
        }
    }
    public function showFront(){
        $this->_tpl->assign("frontNav",$this->_model->getFrontNav());
    }
	private function show(){
	    parent::page($this->_model->getNavTotal());
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('title',"导航列表");
		$this->_tpl->assign("AllNav",$this->_model->getAllNav());
	}
	private function add(){
        if(isset($_POST['send'])){
            if(Validate::checkNull($_POST['nav_name'])) Tool::alertBack('导航名称不能为空');
            if(Validate::checkLength($_POST['nav_name'],2,'min')) Tool::alertBack('导航名称不得小于两位');
            if(Validate::checkLength($_POST['nav_name'],20,'max')) Tool::alertBack('导航名称不得大于二十位');
            if(Validate::checkLength($_POST['nav_info'],200,'max')) Tool::alertBack('导航描述不得大于二百位');
            $this->_model->_nav_name=$_POST['nav_name'];
            $this->_model->_pid=$_POST['pid'];
            $_return_url=$this->_model->_pid?'nav.php?action=showChild&id='.$this->_model->_pid:'nav.php?action=show';
            if($this->_model->getOneNav())Tool::alertBack('该导航名称已存在');
            $this->_model->_nav_info=$_POST['nav_info'];
            $this->_model->addNav()?Tool::alertLocation('恭喜你，新增导航成功！',$_return_url):Tool::alertBack('很遗憾，新增导航失败！');
        }
        $this->_tpl->assign('prev',PREV_URL);
        $this->_tpl->assign('add',true);
        $this->_tpl->assign('title',"新增导航");
	}
	private function update(){
	    if(isset($_POST['send'])){
            if(Validate::checkNull($_POST['nav_name'])) Tool::alertBack('导航名称不能为空');
            if(Validate::checkLength($_POST['nav_name'],2,'min')) Tool::alertBack('导航名称不得小于两位');
            if(Validate::checkLength($_POST['nav_name'],20,'max')) Tool::alertBack('导航名称不得大于二十位');
            if(Validate::checkLength($_POST['nav_info'],200,'max')) Tool::alertBack('导航描述不得大于二百位');
            $this->_model->_id=$_POST['id'];
            $this->_model->_nav_name=$_POST['nav_name'];
            $this->_model->_nav_info=$_POST['nav_info'];
            $this->_model->updateNav()?Tool::alertLocation('恭喜你，修改导航成功',$_POST['prev_url']):Tool::alertBack('很遗憾，修改失败');

        }
        if(isset($_GET['id'])){
            $this->_model->_id=$_GET['id'];
            $_nav=$this->_model->getOneNav();
            is_object($_nav)?true:Tool::alertBack('导航传值的id有误');
            $this->_tpl->assign('id',$_nav->id);
            $this->_tpl->assign('nav_name',$_nav->nav_name);
            $this->_tpl->assign('nav_info',$_nav->nav_info);
            $this->_tpl->assign('prev',PREV_URL);
            $this->_tpl->assign('update',true);
            $this->_tpl->assign('title',"修改导航");

        }else{
            Tool::alertBack('非法操作！');
        }
	}
	public function delete(){
        if(isset($_GET['id'])){
            $this->_model->_id=$_GET['id'];
            $_manage=new ManageModel();
            $_manage->_level=$this->_model->_id;
            //if($_manage->getOneManage())Tool::alertBack('此等级已存在用户，无法删除，请先删除用户');
            $this->_model->deleteNav()?Tool::alertLocation('恭喜你，导航删除成功',PREV_URL):alertBack('很遗憾，导航删除失败');
        }
        else{
            Tool::alertBack('非法操作');
        }
	}
}

?>
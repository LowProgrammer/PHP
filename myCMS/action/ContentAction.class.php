<?php  
/**
* 
*/
class ContentAction extends Action
{
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
        $this->_tpl->assign('show',true);
        $this->_tpl->assign('title',"文档列表");
        $this->nav();
        $_nav = new NavModel();
        if(empty($_GET['nav'])) {

            $_id = $_nav->getAllNavChildId();
            $this->_model->_nav = Tool::objArrOfStr($_id, 'id');
        }else{
            $_nav->_id=$_GET['nav'];
            if(!$_nav->getOneNav()) Tool::alertBack('类别参数传输错误');
            $this->_model->_nav=$_GET['nav'];
        }
        parent::page($this->_model->getListContentTotal());

        $_object=$this->_model->getListContent();
        $_object=Tool::subStr($_object,'title',20,'utf-8');


        $this->_tpl->assign('SearchContent',$_object);
	}

	private function add(){
        if (isset($_POST['send'])){
            if(Validate::checkNull($_POST['title'])) Tool::alertBack('标题不得为空');
            if(Validate::checkLength($_POST['title'],2,'min'))Tool::alertBack('标题不得小于两位');
            if(Validate::checkLength($_POST['title'],50,'max'))Tool::alertBack('标题不得大于五十位');
            if(Validate::checkNull($_POST['nav'])) Tool::alertBack('栏目选择不得为空');
            if(Validate::checkLength($_POST['tag'],30,'max'))Tool::alertBack('标签不得大于三十位');
            if(Validate::checkLength($_POST['keyword'],30,'max'))Tool::alertBack('关键字不得大于三十位');
            if(Validate::checkLength($_POST['source'],20,'max'))Tool::alertBack('文章来源不得大于二十位');
            if(Validate::checkLength($_POST['author'],10,'max'))Tool::alertBack('作者长度不得大于十位');
            if(Validate::checkLength($_POST['info'],200,'max'))Tool::alertBack('内容摘要不得大于200位');
            if(Validate::checkNull($_POST['content'])) Tool::alertBack('详细内容不得为空');
            if (Validate::checkNum($_POST['count']))Tool::alertBack('浏览次数必须位数字');
            if (Validate::checkNum($_POST['gold']))Tool::alertBack('消费金币必须位数字');
            if (isset($_POST['attr'])) {
                $this->_model->_attr = implode(',', $_POST['attr']);
            }else {
                $this->_model->_attr = '无属性';
            }
            $this->_model->_title=$_POST['title'];
            $this->_model->_nav=$_POST['nav'];
            $this->_model->_info=$_POST['info'];
            $this->_model->_source=$_POST['source'];
            $this->_model->_keyword=$_POST['keyword'];
            $this->_model->_thumbnail=$_POST['thumbnail'];
            $this->_model->_author=$_POST['author'];
            $this->_model->_tag=$_POST['tag'];
            $this->_model->_content=$_POST['content'];
            $this->_model->_commend=$_POST['commend'];
            $this->_model->_count=$_POST['count'];
            $this->_model->_gold=$_POST['gold'];
            $this->_model->_color=$_POST['color'];
            $this->_model->addContent()?Tool::alertLocation('文档发布成功','?action=add'):Tool::alertBack('文档发布失败');
        }
        //$this->_tpl->assign('prev',PREV_URL);
        $this->_tpl->assign('add',true);
        $this->_tpl->assign('title',"新增文档");
        $this->nav();
        $this->_tpl->assign('author',$_SESSION['admin']['admin_user']);
	}
	private function update(){

	}
	public function deleteLevel(){

	}

	//nav
    private function nav(){
        $_nav=new NavModel();
        $_html='';
        foreach ($_nav->getAllFontNav() as $_object){
            $_html.='<optgroup label="'.$_object->nav_name.'">'.'\r\n';
            $_nav->_id=$_object->id;
            if(!!$_childNav=$_nav->getAllChildFontNav()){
                foreach ($_childNav as $_object) {
                    $_html.='<option value="'.$_object->id.'">'.$_object->nav_name.'</option>'.'\r\n';
                }
            }
            $_html.='</optgroup>';
        }
        $this->_tpl->assign('nav',$_html);
    }
}

?>
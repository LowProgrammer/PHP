<?php  
/**
* 
*/
class ListAction extends Action
{
	public function __construct($_tpl)
    {
        parent::__construct($_tpl);
    }
    //执行方法
    public function _action(){
	    $this->getNav();
	    $this->getListContent();
    }
    //获取文档列表
    private function getListContent(){
	    if(isset($_GET['id'])){
            parent::__construct($this->_tpl,new ContentModel());
            $this->_model->_id=$_GET['id'];
            $_navid=$this->_model->getNavChildId();
            if($_navid){
                $this->_model->_nav=Tool::objArrOfStr($_navid,'id');
            }else{
                $this->_model->_nav=$this->_model->_id;
            }
            parent::page($this->_model->getListContentTotal(),ARTICLE_SIZE);

            $_object=$this->_model->getListContent();
            $_object=Tool::subStr($_object,'info',120,'utf-8');
            $_object=Tool::subStr($_object,'title',35,'utf-8');
            $this->_tpl->assign('AllListContent',$_object);
        }else{
	        Tool::alertBack('非法操作');
        }
    }
    //获取前台显示导航
    private function getNav(){
	    if (isset($_GET['id'])){
	        $_nav=new NavModel();
	        $_nav->_id=$_GET['id'];
	        if($_nav->getOneNav()) {
	            //主导航
                $_nav1='';
                if($_nav->getOneNav()->nnav_name)$_nav1='<a href="list.php?id='.$_nav->getOneNav()->iid.'">'.$_nav->getOneNav()->nnav_name.'</a> &gt;';
	            $_nav2='<a href="list.php?id='.$_nav->getOneNav()->id.'">'.$_nav->getOneNav()->nav_name.'</a>';
                $this->_tpl->assign('nav',$_nav1.$_nav2 );
                //获取子导航集
                $this->_tpl->assign('childNav',$_nav->getAllChildFontNav());
            }else{
	            Tool::alertBack('次导航不存在');
            }
        }else{
	        Tool::alertBack('非法操作');
        }
    }
}

?>
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
    //获取前台显示导航
    public function getNav(){
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
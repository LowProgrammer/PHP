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
            $this->_model->_sort=$_POST['sort'];
            $this->_model->_readlimit=$_POST['readlimit'];
            $this->_model->addContent()?Tool::alertLocation('文档发布成功','?action=add'):Tool::alertBack('文档发布失败');
        }
        //$this->_tpl->assign('prev',PREV_URL);
        $this->_tpl->assign('add',true);
        $this->_tpl->assign('title',"新增文档");
        $this->nav();
        $this->_tpl->assign('author',$_SESSION['admin']['admin_user']);
	}
	private function update(){
	    if (isset($_GET['id'])){
            $this->_tpl->assign('update',true);
            $this->_tpl->assign('title',"修改文档");

            $this->_model->_id=$_GET['id'];
            $_content=$this->_model->getOneContent();
            if($_content){
                $this->_tpl->assign('id',$_content->id);
                $this->_tpl->assign('titlec',$_content->title);
                $this->_tpl->assign('tag',$_content->tag);
                $this->_tpl->assign('keyword',$_content->keyword);
                $this->_tpl->assign('thumbnail',$_content->thumbnail);
                $this->_tpl->assign('author',$_content->author);
                $this->_tpl->assign('content',$_content->content);
                $this->_tpl->assign('info',$_content->info);
                $this->_tpl->assign('source',$_content->source);
                $this->_tpl->assign('count',$_content->count);
                $this->_tpl->assign('gold',$_content->gold);

                $this->nav($_content->nav);
                $this->attr($_content->attr);
                $this->color($_content->color);
                $this->sort($_content->sort);
                $this->readLimit($_content->readlimit);
                $this->commend($_content->commend);
            }else{
                Tool::alertBack('不存在此文档');
            }
        }
        else{
	        Tool::alertBack('非法操作');
        }

	}
	public function deleteLevel(){

	}
	//comment
    private function commend($_commend){
	    $_commendArr=array(1=>'允许评论',0=>'禁止评论');
	    $_html='';
	    foreach ($_commendArr as $key=>$value){
            if($key==$_commend) $checked='checked="checked"';
            $_html.='<input type="radio" name="commend" value="'.$key.'" '.$checked.'>'.$value;
            $checked='';
        }
        $this->_tpl->assign('comment',$_html);
    }
	//sort
    private function sort($_sort){
        $_sortArr=array(0=>'默认排序',1=>'置顶一天',2=>'置顶一周',3=>'置顶一月',4=>'置顶一年');
        $_html='';
        foreach ($_sortArr as $key=>$value){
            if($key==$_sort) $selected='selected="selected"';
            $_html.='<option value="'.$key.'" '.$selected.' style="color: '.$key.';">'.$value.'</option>';
            $selected='';
        }
        $this->_tpl->assign('sort',$_html);

    }
    //readlimit
    private function readLimit($_readlimit){
        $_readlimitArr=array(0=>'开放浏览',1=>'初级会员',2=>'中级会员',3=>'高级会员',4=>'VIP会员');
        $_html='';
        foreach ($_readlimitArr as $key=>$value){
            if($key==$_readlimit) $selected='selected="selected"';
            $_html.='<option value="'.$key.'" '.$selected.' style="color: '.$key.';">'.$value.'</option>';
            $selected='';
        }
        $this->_tpl->assign('readlimit',$_html);
    }
	//color
    private function color($_color){
	    $_colorArr=array(''=>'默认颜色','red'=>'红色','blue'=>'蓝色','orange'=>'橙色');
	    $_html='';
	    foreach ($_colorArr as $key=>$value){
	        if($key==$_color) $selected='selected="selected"';
	        $_html.='<option value="'.$key.'" '.$selected.' style="color: '.$key.';">'.$value.'</option>';
	        $selected='';
        }
        $this->_tpl->assign('color',$_html);
    }


    //attr
    private function attr($_attr){
       $_attrArr=array('头条','推荐','加粗','跳转');
       $_html='';
       $_attrS=implode(',',$_attr);
       $_attrNo=array_diff($_attrArr,$_attrS);
       if ($_attrS[0]!='无') {
           foreach ($_attrS as $value) {
               $_html .= '<input type="checkbox" checked="checked" name="attr[]" value="' . $value . '"/>' . $value;
           }
       }
        foreach ($_attrNo as $value){
            $_html.='<input type="checkbox"  name="attr[]" value="'.$value.'"/>'.$value;
        }
        $this->_tpl->assign('attr',$_html);
    }
	//nav
    private function nav($_n=0){
        $_nav=new NavModel();
        $_html='';
        foreach ($_nav->getAllFontNav() as $_object){
            $_html.='<optgroup label="'.$_object->nav_name.'">'.'\r\n';
            $_nav->_id=$_object->id;
            if(!!$_childNav=$_nav->getAllChildFontNav()){
                foreach ($_childNav as $_object) {
                    if($_n==$_object->id) $_selected='selected="selected"';
                    $_html.='<option '.$_selected.' value="'.$_object->id.'">'.$_object->nav_name.'</option>'.'\r\n';
                    $_selected='';
                }
            }
            $_html.='</optgroup>';
        }
        $this->_tpl->assign('nav',$_html);
    }
}

?>
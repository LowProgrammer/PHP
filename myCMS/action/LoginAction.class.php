<?php
/**
 * Created by PhpStorm.
 * User: node4
 * Date: 2017/8/31
 * Time: 16:03
 */
class LoginAction extends Action{
   public function __construct(&$_tpl)
   {
       parent::__construct($_tpl,new ManageModel());
   }

    public function _action()
    {
        if (isset($_GET['action'])) {

            switch ($_GET['action']) {
                case "login":
                    $this->login();
                    break;
                case "logout":
                    $this->logout();
                    break;
            }
        }
    }
    private function login(){
        if(isset($_POST['send'])){
            if(Validate::checkLength($_POST['code'],4,'equals')) Tool::alertBack('验证码必须是4位');
            if(Validate::checkEquals(strtolower($_POST['code']),$_SESSION['code'])) Tool::alertBack('验证码不正确');
            if(Validate::checkNull($_POST['admin_user'])) Tool::alertBack('用户名不能为空');
            if(Validate::checkLength($_POST['admin_user'],2,'min')) Tool::alertBack('用户名不得小于两位');
            if(Validate::checkLength($_POST['admin_user'],20,'max')) Tool::alertBack('用户名不得大于二十位');
            if(Validate::checkNull($_POST['admin_pass'])) Tool::alertBack('密码不能为空');
            if(Validate::checkLength($_POST['admin_pass'],6,'min')) Tool::alertBack('密码不得小于六位');
            $this->_model->_admin_user=$_POST['admin_user'];
            $this->_model->_admin_pass=sha1($_POST['admin_pass']);
            $this->_model->_last_ip=$_SERVER['REMOTE_ADDR'];
            $_login=$this->_model->getLoginManage();
            if($_login){
                $_SESSION['admin']['admin_user']=$_login->admin_user;
                $_SESSION['admin']['level_name']=$_login->level_name;
                $this->_model->setLoginCount();
                Tool::alertLocation(null,'admin.php');
            }else{
                Tool::alertBack('用户密码或账号错误');
            }
        }
    }

    //退出登录
    private function logout(){
        Tool::unSession();
        Tool::alertLocation(null,'admin_login.php');
    }
}
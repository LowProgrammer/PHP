<?php
	class Validate{
		//是否为空
		static public function checkNull($_date){
			return trim($_date)==''? true:false;
		}
		//数据是否位数字
		static public function checkNum($_date){
		    if (is_numeric($_date)) return true;
		    return false;
        }
		//长度是否合法
		static public function checkLength($_date,$_length,$_falg){
		    if($_falg=='min'){
			    if(mb_strlen(trim($_date),'utf-8')<$_length)return true;
			    return false;
		    }elseif($_falg=='max'){
                if(mb_strlen(trim($_date),'utf-8')>$_length)return true;
                return false;
            }elseif ($_falg='equals'){
                if(mb_strlen(trim($_date,'utf-8'))!=$_length) return true;
                return false;
            }else{
		        Tool::_alertBack('ERROR:参数传递错误，必须是min或max');
            }
		}
		//数据是否一致
		static public function checkEquals($_date,$_otherdate){
			if(trim($_date)!=trim($_otherdate))return true;
			return false;
		}
		static public function checkSession(){
		    if(!isset($_SESSION['admin'])) Tool::alertBack('非法登录');


        }
	}
?>
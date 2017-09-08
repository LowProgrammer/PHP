<?php  
class Tool{


	//弹窗跳转
	static public function alertLocation($_info,$_url){
	    if(!empty($_info)){
            echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
            exit();
        }else{
            header("Location:".$_url);
            exit();
	    }

	}

	//弹窗返回
	static public function alertBack($_info){
		echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
		exit();
	}
	//弹窗赋值关闭（上传专用）
    static public function alertOpenerClose($_info,$_path){
        echo "<script type='text/javascript'>alert('$_info');</script>";
        echo "<script type='text/javascript'>opener.document.content.thumbnail.value='$_path';</script>";
        echo "<script type='text/javascript' >opener.$('#pic').css('display','block');</script>";
        echo "<script type='text/javascript'>opener.$('#pic').attr('src','$_path');</script>";
        echo "<script type='text/javascript'>window.close();</script>";
        exit();
    }
    //显示html过滤
    static public function htmlString($_date){
        $_string=null;
        if(is_array($_date)){
            foreach ($_date as $_key=>$_value){
                $_string[$_key]=Tool::htmlString($_value);
            }
        }elseif (is_object($_date)){
            foreach ($_date as $_key=>$_value){
                @$_string->$_key=Tool::htmlString($_value);
            }
        }else{
            $_string=htmlspecialchars($_date);
        }
        return $_string;
    }

    //数据库输入过滤
    static public function mysqlSttring($_date){

            return !GPC ? mysqli_real_escape_string(DB::getDB(),$_date):$_date;

    }

	//清理session
    static public function unSession(){
	    if(session_start()){
	        session_destroy();
        }
    }

}

?>
<?php  

	@$_mysqli=new mysqli('localhost','root','root','test');

	//$_mysqli=new mysqli('localhost','root','root');
	//$_mysqli->select_db('test');

	//操作错误代码
	
	//echo mysqli_connect_errno();
	//错做错误原因
	//echo mysqli_connect_error();

	//事务处理
	$_mysqli->set_charset('utf8');
	//设置自动提交
	$_mysqli->autocommit(false);
	
	$_sql.="UPDATE flower set t_flower=t_flower-50 where t_id=1;"
	$_sql.="UPDATE friend set t_state=t_state+50 where t_id=1;"

	//执行多条语句
	//只有两条数据全部执行成功，手工提交
	//否则回滚，撤销之前的操作
	
	if($_mysqli->multi_query($_sql)){
		//判断影响的行数确定是否执行
		//如果$_success是false说明sql执行有误，执行回滚，否则就手工提交
		$_success=$_mysqli->affected_rows==1?true:false;
		// if($_mysqli->affected_rows==1){
		// 	$_success=true;
		// }
		

		//下移指针
		$_mysqli->next_result();
		$_success2=$_mysqli->affected_rows==1?true:false;

		if($_success&&$_success2){
			$_mysqli->commit();
			echo "执行成功";
		}
		else{
			$_mysqli->rollback();
			echo "回滚，执行失败";
		}
	}else{
		echo "第一条语句执行错误";
	}


	$_mysqli->autocommit(true);


	$_mysqli->close();

?>
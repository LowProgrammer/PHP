<?php  

	@$_mysqli=new mysqli('localhost','root','root','test');

	//$_mysqli=new mysqli('localhost','root','root');
	//$_mysqli->select_db('test');

	//操作错误代码
	
	//echo mysqli_connect_errno();
	//错做错误原因
	//echo mysqli_connect_error();


	//执行多条语句
	$_mysqli->set_charset('utf8');
	$_sql.="SELECT * SET user;";
	$_sql.="SELECT * SET comment;";
	$_sql.="SELECT * SET friend";
	
	if($_mysqli->multi_query($_sql)){//只能判断第一条
		//获取当前结果集
		$_result=$_mysqli->store_result();
		print_r($_result->fetch_row());


		$_mysqli->next_result();
		$_result=$_mysqli->store_result();
		if(!$_result){//第二条执行错误
			exit();
		}
		print_r($_result->fetch_row());

	}else{
		echo "第一条执行错误";
	}









?>
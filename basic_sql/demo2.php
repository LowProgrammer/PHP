<?php  

	@$_mysqli=new mysqli('localhost','root','root','test');

	//$_mysqli=new mysqli('localhost','root','root');
	//$_mysqli->select_db('test');

	//操作错误代码
	
	//echo mysqli_connect_errno();
	//错做错误原因
	//echo mysqli_connect_error();


	// //执行多条语句
	// $_mysqli->set_charset('utf8');
	// $_sql.="UPDATE user set article=a SET name=123;";
	// $_sql.="UPDATE user set article=b SET name=456;";
	// $_sql.="UPDATE user set article=c SET name=789";
	
	// $_mysqli->multi_query($_sql);









?>
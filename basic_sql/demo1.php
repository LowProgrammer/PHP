<?php  

	// $_mysqli=new mysqli();
	// $_mysqli->connect('localhost','root','root','test');
	 
	
	@$_mysqli=new mysqli('localhost','root','root','test');

	//$_mysqli=new mysqli('localhost','root','root');
	//$_mysqli->select_db('test');

	//操作错误代码
	
	//echo mysqli_connect_errno();
	//错做错误原因
	//echo mysqli_connect_error();

	$_mysqli->set_charset('utf8');
	$_sql="SELECT * FROM user";
	$result=$_mysqli->query($_sql);
	// print_r($result->fetch_row());
	// $result->free();

	// $result->num_rows;
	// $result->affected_rows;//修改删除

	// //求出表中有多少字段
	// $result->field_count;

	// $field=$result->fetch_field();//fetch_fields()取得所有的字段
	// $field->name;//字段名,第一个
	// $field->name;//第二个

	//移动数据指针和字段指针
	// $result->data_seek(1);
	// $row=$result->fetch_row();
	// echo $row[3];
	
	// $result->field_seek(5);
	// $row=$result->fetch_field();
	// echo $row->name;
	









	$_mysqli->close();
?>
<?php


	$_xml=simplexml_load_file("test.xml");

	//echo $_xml->info;
	//echo $_xml->version;

	//print_r($_xml->version);

	//echo $_xml->version[2];

	//foreach ($_xml->version as $v) {
	//	# code...
	//	echo $v;
	//}

	//访问二级标签
	//echo $_xml->user->name;
	//echo $_xml->user->url;
	// foreach ($_xml->user as $_user) {
	// 	# code...

	// 	echo $_user->name;
	// }

	//输出二级标签里面的属性
	echo $_xml->user->author->attributes();







?>
<?php
	
	//使用xpath获取xml

	$_sxe=simplexml_load_file("test.xml");

	//$version=$_sxe->xpath('/root/version');

	//print_r($version);
	//echo $version[0];

	//echo $version[1];
	//echo $version[2];

	//$_name=$_sxe->xpath('/root/user/name');
	//echo $_name[0];

	$_name=$_sxe->xpath('/root/user/author');
	echo $_name[0]->attributes();


?>
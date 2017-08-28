<?php

	$_doc=new DOMDocument();

	$_doc->load('test.xml');

	$version=$_doc->getElementsByTagName('version');


	//标签的长度和值
	//echo $version->length;
	//echo $version->item(0)->nodeValue;


	$_name=$_doc->getElementsByTagName('name');
	echo $_name->item(2)->nodeValue;
?>
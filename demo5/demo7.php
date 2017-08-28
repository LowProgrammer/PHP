<?php
	//使用domdocument创建文件

	$_doc=new DOMDocument('1.0','utf-8');

	$_doc->formatOutput=true;

	$_root=$_doc->createElement('root');

	$_version=$_doc->createElement('version');

	$_versionTextNode=$_doc->createTextNode('1.0');

	$_version->appendChild($_versionTextNode);


	$_root->appendChild($_version);


	$_doc->appendChild($_root);

	$_doc->save('aaa.xml');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><!--{webname}--></title>
</head>
<body>
	系统分页数：<!--{pagesize}-->
	<br />
	{include file="test.php"}
	<br />
		{#}注释文件，静态页面看不到，PHP代码能看到{#}
		{$name}{$content}
		
	<br />
		{if $a}
			<div>一号界面</div>
			{else}
			<div>二号界面</div>
		{/if}
		



		{foreach $array(key,value)}
			{@key}....{@value}<br/>
		
		{/foreach}
		
	<br />
</body>
</html>
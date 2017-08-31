<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/admin_level.js"></script>
</head>
<body id="main">
	<div class="map">
		管理首页&gt;&gt;等级管理&gt;&gt;<strong id="title">{$title}</strong>
	</div>
	<ol>
		<li><a href="level.php?action=add" class="mes selected">新增等级</a></li>
		<li><a href="level.php?action=show" class="mes" >等级列表</a></li>
		{if $update}
			<li><a href="level.php?action=update&id={$id}" class="mes" >修改等级</a></li>
		{/if}
	</ol>
	{if $show}
	<table cellspacing="0">
		<tr>
			<th>编号</th><th>等级名称</th><th>描述</th><th>操作</th>
		</tr>
		{if $AllLevel}
		{foreach $AllLevel(key,value)}
		<tr>
			<td><script type="text/javascript">document.write({@key+1}+{$num});</script></td>
			<td>{@value->level_name}</td>
			<td>{@value->level_info}</td>
			<td><a href="level.php?action=update&id={@value->id}">修改</a> | <a href="level.php?action=delete&id={@value->id}" onclick="return confirm('你真的要删除这个等级吗？')?true:false">删除</a></td>
		</tr>
		{/foreach}
			{else}
				<tr><td colspan="4">对不起没有任何数据</td></tr>
		{/if}
	</table>

	<div id="page">{$page}</div>
	{/if}
	<!--新增页面  -->
	{if $add}
		<form method="post" name="add">
			<table class="left">
				<tr><td>等级名称：<input type="text" name="level_name" class="text">(*等级名称不得小于两位，不得大于二十位)</td></tr>
				<tr><td>等级描述：<textarea name="level_info"></textarea>(*描述不得大于200位)</td></tr>
				<tr><td><input type="submit" name="send" value="新增等级" onclick="return checkAdd()" class="submit level">[<a href="{$prev}">返回列表</a>]</td></tr>
			</table>
		</form>


	{/if}
	<!--修改页面 -->
	{if $update}
		
		
		<form method="post" name="update">
			<input type="hidden" name="id" value="{$id}" >
			<input type="hidden" name="prev_url" value="{$prev}" >
			<table class="left">
				<tr><td>等级名称：<input type="text" name="level_name" value="{$level_name}" class="text"></td></tr>
				<tr><td>等级描述：<textarea name="level_info" value="{$level_info}"></textarea></td></tr>
				<tr><td><input type="submit" name="send" value="修改等级" onclick="return checkUpdateForm()" class="submit level">[<a href="{$prev}">返回列表</a>]</td></tr>
			</table>
		</form>
	{/if}
	<!--删除页面  -->
	{if $delete}删除{/if}
</body>
</html>
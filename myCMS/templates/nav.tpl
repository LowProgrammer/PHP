<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/admin_nav.js"></script>
</head>
<body id="main">
	<div class="map">
		内容管理&gt;&gt;设置网站导航&gt;&gt;<strong id="title">{$title}</strong>
	</div>
	<ol>
		<li><a href="nav.php?action=show" class="mes selected">导航列表</a></li>
		<li><a href="nav.php?action=add" class="mes" >新增导航</a></li>
		{if $update}
			<li><a href="nav.php?action=update&id={$id}" class="mes" >修改导航</a></li>
		{/if}
		{if $addChild}
			<li><a href="nav.php?action=addChild&id={$id}" class="mes" >新增子导航</a></li>
		{/if}
        {if $showChild}
			<li><a href="nav.php?action=showChild&id={$id}" class="mes" >子导航列表</a></li>
        {/if}
	</ol>
	{if $show}
		<form name="" method="post" action="nav.php?action=sort">
	<table cellspacing="0">
		<tr>
			<th>编号</th><th>导航名称</th><th>描述</th><th>子类</th><th>操作</th><th>排序</th>
		</tr>
		{if $AllNav}
		{foreach $AllNav(key,value)}
		<tr>
			<td><script type="text/javascript">document.write({@key+1}+{$num});</script></td>
			<td>{@value->nav_name}</td>
			<td>{@value->nav_info}</td>
			<td><a href="nav.php?action=showChild&id={@value->id}">查看</a>&nbsp;|&nbsp;<a href="nav.php?action=addChild&id={@value->id}">增加子类</a></td>
			<td><a href="nav.php?action=update&id={@value->id}">修改</a> | <a href="nav.php?action=delete&id={@value->id}" onclick="return confirm('你真的要删除这个导航吗？')?true:false">删除</a></td>
			<td><input type="text" name="sort[{@value->id}]" value="{@value->sort}" class="text sort"></td>
		</tr>
		{/foreach}
			{else}
			<tr><td colspan="6">对不起没有任何数据</td></tr>
		{/if}
		<tr><td></td><td></td><td></td><td></td><td></td><td><input type="submit" name="send" value="排序"></td></tr>
	</table>
		</form>
	<div id="page">{$page}</div>
	{/if}
	<!--新增页面  -->
    {if $add}
		<form method="post" name="add">
			<input type="hidden" value="0" name="pid">
			<table class="left" cellspacing="0">
				<tr><td>导航名称：<input type="text" name="nav_name" class="text">(*导航名称不得小于两位，不得大于二十位)</td></tr>
				<tr><td>导航描述：<textarea name="nav_info"></textarea>(*描述不得大于200位)</td></tr>
				<tr><td><input type="submit" name="send" value="新增导航" onclick="return checkAdd()" class="submit level">[<a href="{$prev}">返回列表</a>]</td></tr>
			</table>
		</form>
    {/if}
	<!--新增子导航页面  -->
    {if $addChild}
		<form method="post" name="add">
			<input type="hidden" value="{$id}" name="pid">
			<table class="left" cellspacing="0">
				<tr><td>上级导航：<strong>{$prev_name}</strong></td></tr>
				<tr><td>导航名称：<input type="text" name="nav_name" class="text">(*导航名称不得小于两位，不得大于二十位)</td></tr>
				<tr><td>导航描述：<textarea name="nav_info"></textarea>(*描述不得大于200位)</td></tr>
				<tr><td><input type="submit" name="send" value="新增导航" onclick="return checkAdd()" class="submit level">[<a href="{$prev}">返回列表</a>]</td></tr>
			</table>
		</form>
    {/if}
	<!---->
	{if $showChild}
		<form name="" method="post" action="nav.php?action=sort">
		<table cellspacing="0">
			<tr>
				<th>编号</th><th>导航名称</th><th>描述</th><th>操作</th><th>排序</th>
			</tr>
            {if $AllChildNav}
                {foreach $AllChildNav(key,value)}
					<tr>
						<td><script type="text/javascript">document.write({@key+1}+{$num});</script></td>
						<td>{@value->nav_name}</td>
						<td>{@value->nav_info}</td>
						<td><a href="nav.php?action=update&id={@value->id}">修改</a> | <a href="nav.php?action=delete&id={@value->id}" onclick="return confirm('你真的要删除这个导航吗？')?true:false">删除</a></td>
						<td><input type="text" name="sort[{@value->id}]" value="{@value->sort}" class="text sort"></td>
					</tr>
                {/foreach}
            {else}
				<tr><td colspan="5">对不起没有任何数据</td></tr>
            {/if}
			<tr><td></td><td></td><td></td><td></td><td></td><td><input type="submit" name="send" value="排序"></td></tr>
			<tr><td colspan="5">本来隶属:<strong>{$prev_name}</strong>[<a href="nav.php?action=addChild&id={$id}">[增加本类]</a>]|[<a href="{$prev}">返回列表]</a></td></tr>

		</table>
		<div id="page">{$page}</div>
		</form>
	{/if}
	<!--修改页面 -->
    {if $update}
		<form method="post" name="update">
			<input type="hidden" value="{$prev_url}" name="prev">
			<input type="hidden" value="{$id}" name="id">
			<table class="left" cellspacing="0">
				<tr><td>导航名称：<input type="text" name="nav_name" class="text" value="{$nav_name}">(*导航名称不得小于两位，不得大于二十位)</td></tr>
				<tr><td>导航描述：<textarea name="nav_info">{$nav_info}</textarea>(*描述不得大于200位)</td></tr>
				<tr><td><input type="submit" name="send" value="新增子导航" onclick="return checkUpdateForm()" class="submit level">[<a href="{$prev}">返回列表</a>]</td></tr>
			</table>
		</form>
    {/if}
	<!--删除页面  -->
	{if $delete}删除{/if}
</body>
</html>
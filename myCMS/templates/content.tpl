<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/admin_content.js"></script>
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body id="main">
	<div class="map">
		内容管理&gt;&gt;查看文档列表&gt;&gt;<strong id="title">{$title}</strong>
	</div>
	<ol>
		<li><a href="content.php?action=add" class="mes ">新增文档</a></li>
		<li><a href="content.php?action=show" class="mes selected" >文档列表</a></li>
		{if $update}
			<li><a href="content.php?action=update&id={$id}" class="mes" >修改文档</a></li>
		{/if}
	</ol>
	{if $show}
		<table cellspacing="0">
			<tr>
				<th>编号</th><th>标题</th><th>属性</th><th>文档类别</th><th>浏览次数</th><th>发布时间</th><th>操作</th>
			</tr>
            {if $SearchContent}
                {foreach $SearchContent(key,value)}
					<tr>
						<td><script type="text/javascript">document.write({@key+1}+{$num});</script></td>
						<td><a href="../details.php?id={@value->id}" title="{@value->t}" target="_blank">{@value->title}</a></td>
						<td>{@value->attr}</td>
						<td><a href="?action=show&nav={@value->nav}">{@value->nav_name}</a></td>
						<td>{@value->count}</td>
						<td>{@value->date}</td>
						<td><a href="content.php?action=update&id={@value->id}">修改</a> | <a href="content.php?action=delete&id={@value->id}" onclick="return confirm('你真的要删除这个管理员吗？')?true:false">删除</a></td>
					</tr>
                {/foreach}
            {else}
				<tr><td colspan="7">对不起没有任何数据</td></tr>
            {/if}
		</table>
		<form action="?" method="get">
			<div id="page">
				{$page}
				<input type="hidden" name="action" value="show">
				<select name="nav" class="select">
					<option value="0">默认全部</option>
					{$nav}
				</select>
				<input value="查询" type="submit">
			</div>
		</form>
	{/if}
	<!--新增页面  -->
	{if $add}
		<form name="content" method="post" action="?action=add">
			<table cellspacing="0" class="content">
				<tr><th><strong>发布一条新文档</strong></th></tr>
				<tr><td>文档标题：<input type="text" name="title" class="text"><span class="red">[必填]</span>(*标题2-50字符之间)</td></tr>
				<tr><td>栏&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目：<select name="nav"><option value="" style="padding: 0;">请选择一个栏目类别</option>{$nav}</select><span class="red">(*必选)</span></td></tr>
				<tr><td>定义属性：<input type="checkbox" name="attr[]" value="头条"/>头条
						<input type="checkbox" name="attr[]" value="推荐"/>推荐
						<input type="checkbox" name="attr[]" value="加粗"/>加粗
						<input type="checkbox" name="attr[]" value="跳转"/>跳转
					</td>
				</tr>
				<tr><td>标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;签：<input type="text" name="tag" class="text">(*每个标签用','隔开，总长不得大于三十位)</td></tr>
				<tr><td>关&nbsp;&nbsp;键&nbsp;&nbsp;字：<input type="text" name="keyword" class="text"></td></tr>
				<tr>
					<td>缩&nbsp;&nbsp;略&nbsp;&nbsp;图：<input type="text" name="thumbnail" class="text" readonly="readonly">
						<input type="button" value="上传缩略图" onclick="centerWindow('../templates/upfile.html','upfile','600','400')"/>
						<img name="pic" id="pic" style="display: none;">
					</td>
				</tr>
				<tr><td>文章来源：<input type="text" name="source" class="text"></td></tr>
				<tr><td>作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者：<input type="text" name="author" class="text" value="{$author}"></td></tr>
				<tr><td><span class="middle">内容摘要：</span><textarea name="info" class=""></textarea></td></tr>
				<tr><td><textarea name="content" id="editor" class="ckeditor"></textarea></td></tr>
				<tr>
					<td>评论选项：<input type="radio" name="commend" value="1" checked="checked">允许评论
									<input type="radio" name="commend" value="0">禁止评论
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浏览次数：<input type="text" name="count" value="100" class="text small">
					</td>
				</tr>
				<tr>
					<td>文档排序：<select name="sort">
							<option>默认排序</option>
							<option>置顶一天</option>
							<option>置顶一周</option>
							<option>置顶一月</option>
							<option>置顶一年</option>
						</select>
						&nbsp;&nbsp;&nbsp;&nbsp;消费金币：<input type="text" name="gold" value="0" class="text small">
					</td>
				</tr>
				<tr>
					<td>阅读权限：<select name="limit">
							<option>开放浏览</option>
							<option>初级会员</option>
							<option>中级会员</option>
							<option>高级会员</option>
							<option>VIP会员</option>
						</select>
						&nbsp;&nbsp;&nbsp;&nbsp;标题颜色：<select name="color">
							<option value="">默认颜色</option>
							<option value="red" style="color: red;">红色</option>
							<option value="blue" style="color: blue;">蓝色</option>
							<option value="orange" style="color: orange;">橙色</option>
						</select>
					</td>
				</tr>
				<tr><td><input type="submit" name="send" value="发布文档"><input type="reset" value="重置"></td></tr>
				<tr><td></td></tr>
			</table>
		</form>
	{/if}
	<!--修改页面 -->
	{if $update}
		<form name="content" method="post" action="?action=update">
			<table cellspacing="0" class="content">
				<tr><th><strong>发布一条新文档</strong></th></tr>
				<tr><td>文档标题：<input type="text" name="title" value="{$titlec}" class="text"><span class="red">[必填]</span>(*标题2-50字符之间)</td></tr>
				<tr><td>栏&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目：<select name="nav"><option value="" style="padding: 0;">请选择一个栏目类别</option>{$nav}</select><span class="red">(*必选)</span></td></tr>
				<tr><td>定义属性：{$attr}
					</td>
				</tr>
				<tr><td>标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;签：<input type="text" name="tag" value="{$tag}" class="text">(*每个标签用','隔开，总长不得大于三十位)</td></tr>
				<tr><td>关&nbsp;&nbsp;键&nbsp;&nbsp;字：<input type="text" name="keyword" value="{$keyword}" class="text"></td></tr>
				<tr>
					<td>缩&nbsp;&nbsp;略&nbsp;&nbsp;图：<input type="text" name="thumbnail" value="{$thumbnail}" class="text" readonly="readonly">
						<input type="button" value="上传缩略图" onclick="centerWindow('../templates/upfile.html','upfile','600','400')"/>
						<img name="pic" id="pic" src="{$thumbnail}" style="display:block;">
					</td>
				</tr>
				<tr><td>文章来源：<input type="text" name="source" value="{$source}" class="text"></td></tr>
				<tr><td>作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者：<input type="text" name="author"  class="text" value="{$author}"></td></tr>
				<tr><td><span class="middle">内容摘要：</span><textarea name="info" >{$info}</textarea></td></tr>
				<tr><td><textarea name="content" id="editor" class="ckeditor" >{$content}</textarea></td></tr>
				<tr>
					<td>评论选项：{$comment}
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浏览次数：<input type="text" name="count" value="{$count}" class="text small">
					</td>
				</tr>
				<tr>
					<td>文档排序：<select name="sort">
							{$sort}
						</select>
						&nbsp;&nbsp;&nbsp;&nbsp;消费金币：<input type="text" name="gold" value="{$gold}" class="text small">
					</td>
				</tr>
				<tr>
					<td>阅读权限：<select name="limit">
							{$readlimit}
						</select>
						&nbsp;&nbsp;&nbsp;&nbsp;标题颜色：<select name="color">
								{$color}
						</select>
					</td>
				</tr>
				<tr><td><input type="submit" name="send" value="发布文档"><input type="reset" value="重置"></td></tr>
				<tr><td></td></tr>
			</table>
		</form>
		

	{/if}
	<!--删除页面  -->
	{if $delete}

	{/if}
</body>
	<script>
		CKEDITOR.replace("editor");
	</script>
</html>
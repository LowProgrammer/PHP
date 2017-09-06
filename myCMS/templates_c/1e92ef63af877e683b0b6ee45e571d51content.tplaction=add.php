<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/admin_level.js"></script>
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body id="main">
	<div class="map">
		内容管理&gt;&gt;查看文档列表&gt;&gt;<strong id="title"><?php echo $this->_vars['title'];?></strong>
	</div>
	<ol>
		<li><a href="content.php?action=add" class="mes ">新增文档</a></li>
		<li><a href="content.php?action=show" class="mes selected" >文档列表</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="content.php?action=update&id=<?php echo $this->_vars['id'];?>" class="mes" >修改文档</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['show']){ ?>

	<?php }?>
	<!--新增页面  -->
	<?php if($this->_vars['add']){ ?>
		<form>
			<table cellspacing="0" class="content">
				<tr><th><strong>发布一条新文档</strong></th></tr>
				<tr><td>文档标题：<input type="text" name="title" class="text"></td></tr>
				<tr><td>标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;签：<input type="text" name="title" class="text"></td></tr>
				<tr><td>栏&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目：<select name="nav"><option>请选择一个栏目类别</option></select></td></tr>
				<tr><td>定义属性：<input type="checkbox" name="top" value="头条"/>头条
						<input type="checkbox" name="rec" value="推荐"/>推荐
						<input type="checkbox" name="bold" value="加粗"/>加粗
						<input type="checkbox" name="skip" value="跳转"/>跳转
					</td>
				</tr>
				<tr><td>关&nbsp;&nbsp;键&nbsp;&nbsp;字：<input type="text" name="keyword" class="text"></td></tr>
				<tr><td>缩&nbsp;&nbsp;略&nbsp;&nbsp;图：<input type="text" name="thumbnail" class="text"></td></tr>
				<tr><td>文章来源：<input type="text" name="source" class="text"></td></tr>
				<tr><td>作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者：<input type="text" name="author" class="text"></td></tr>
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
						&nbsp;&nbsp;&nbsp;&nbsp;消费金币：<input type="text" name="count" value="0" class="text small">
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
							<option>默认颜色</option>
							<option style="color: red;">红色</option>
							<option style="color: blue;">蓝色</option>
							<option style="color: orange;">橙色</option>
						</select>
					</td>
				</tr>
				<tr><td><input type="submit" value="发布文档"><input type="reset" value="重置"></td></tr>
				<tr><td></td></tr>
			</table>
		</form>
	<?php }?>
	<!--修改页面 -->
	<?php if($this->_vars['update']){ ?>
		
		

	<?php }?>
	<!--删除页面  -->
	<?php if($this->_vars['delete']){ ?>

	<?php }?>
</body>
	<script>
		CKEDITOR.replace("editor");
	</script>
</html>
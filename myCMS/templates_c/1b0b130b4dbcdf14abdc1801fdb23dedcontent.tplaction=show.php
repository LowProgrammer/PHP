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
				<tr><td>TAG 标题：<input type="text" name="title" class="text"></td></tr>
				<tr><td>关&nbsp;键&nbsp;字：<input type="text" name="title" class="text"></td></tr>
				<tr><td>缩&nbsp;略&nbsp;图：<input type="text" name="title" class="text"></td></tr>
				<tr><td>文章来源：<input type="text" name="title" class="text"></td></tr>
				<tr><td>作&nbsp;&nbsp;&nbsp;&nbsp;者：<input type="text" name="title" class="text"></td></tr>
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
</html>
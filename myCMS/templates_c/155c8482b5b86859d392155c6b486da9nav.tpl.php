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
		内容管理&gt;&gt;设置网站导航&gt;&gt;<strong id="title"><?php echo $this->_vars['title'];?></strong>
	</div>
	<ol>
		<li><a href="nav.php?action=show" class="mes selected">导航列表</a></li>
		<li><a href="nav.php?action=add" class="mes" >新增导航</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="nav.php?action=update&id=<?php echo $this->_vars['id'];?>" class="mes" >修改导航</a></li>
		<?php }?>
		<?php if($this->_vars['addChild']){ ?>
			<li><a href="nav.php?action=addChild&id=<?php echo $this->_vars['id'];?>" class="mes" >新增子导航</a></li>
		<?php }?>
        <?php if($this->_vars['showChild']){ ?>
			<li><a href="nav.php?action=showChild&id=<?php echo $this->_vars['id'];?>" class="mes" >子导航列表</a></li>
        <?php }?>
	</ol>
	<?php if($this->_vars['show']){ ?>
		<form name="" method="post" action="nav.php?action=sort">
	<table cellspacing="0">
		<tr>
			<th>编号</th><th>导航名称</th><th>描述</th><th>子类</th><th>操作</th><th>排序</th>
		</tr>
		<?php if($this->_vars['AllNav']){ ?>
		<?php  foreach($this->_vars['AllNav'] as $key =>$value){?>
		<tr>
			<td><script type="text/javascript">document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num'];?>);</script></td>
			<td><?php echo $value->nav_name;?></td>
			<td><?php echo $value->nav_info;?></td>
			<td><a href="nav.php?action=showChild&id=<?php echo $value->id;?>">查看</a>&nbsp;|&nbsp;<a href="nav.php?action=addChild&id=<?php echo $value->id;?>">增加子类</a></td>
			<td><a href="nav.php?action=update&id=<?php echo $value->id;?>">修改</a> | <a href="nav.php?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除这个导航吗？')?true:false">删除</a></td>
			<td><input type="text" name="sort[<?php echo $value->id;?>]" value="<?php echo $value->sort;?>" class="text sort"></td>
		</tr>
		<?php }?>
			<?php }else{?>
			<tr><td colspan="6">对不起没有任何数据</td></tr>
		<?php }?>
		<tr><td></td><td></td><td></td><td></td><td></td><td><input type="submit" name="send" value="排序"></td></tr>
	</table>
		</form>
	<div id="page"><?php echo $this->_vars['page'];?></div>
	<?php }?>
	<!--新增页面  -->
    <?php if($this->_vars['add']){ ?>
		<form method="post" name="add">
			<input type="hidden" value="0" name="pid">
			<table class="left" cellspacing="0">
				<tr><td>导航名称：<input type="text" name="nav_name" class="text">(*导航名称不得小于两位，不得大于二十位)</td></tr>
				<tr><td>导航描述：<textarea name="nav_info"></textarea>(*描述不得大于200位)</td></tr>
				<tr><td><input type="submit" name="send" value="新增导航" onclick="return checkAdd()" class="submit level">[<a href="<?php echo $this->_vars['prev'];?>">返回列表</a>]</td></tr>
			</table>
		</form>
    <?php }?>
	<!--新增子导航页面  -->
    <?php if($this->_vars['addChild']){ ?>
		<form method="post" name="add">
			<input type="hidden" value="<?php echo $this->_vars['id'];?>" name="pid">
			<table class="left" cellspacing="0">
				<tr><td>上级导航：<strong><?php echo $this->_vars['prev_name'];?></strong></td></tr>
				<tr><td>导航名称：<input type="text" name="nav_name" class="text">(*导航名称不得小于两位，不得大于二十位)</td></tr>
				<tr><td>导航描述：<textarea name="nav_info"></textarea>(*描述不得大于200位)</td></tr>
				<tr><td><input type="submit" name="send" value="新增导航" onclick="return checkAdd()" class="submit level">[<a href="<?php echo $this->_vars['prev'];?>">返回列表</a>]</td></tr>
			</table>
		</form>
    <?php }?>
	<!---->
	<?php if($this->_vars['showChild']){ ?>
		<form name="" method="post" action="nav.php?action=sort">
		<table cellspacing="0">
			<tr>
				<th>编号</th><th>导航名称</th><th>描述</th><th>操作</th><th>排序</th>
			</tr>
            <?php if($this->_vars['AllChildNav']){ ?>
                <?php  foreach($this->_vars['AllChildNav'] as $key =>$value){?>
					<tr>
						<td><script type="text/javascript">document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num'];?>);</script></td>
						<td><?php echo $value->nav_name;?></td>
						<td><?php echo $value->nav_info;?></td>
						<td><a href="nav.php?action=update&id=<?php echo $value->id;?>">修改</a> | <a href="nav.php?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除这个导航吗？')?true:false">删除</a></td>
						<td><input type="text" name="sort[<?php echo $value->id;?>]" value="<?php echo $value->sort;?>" class="text sort"></td>
					</tr>
                <?php }?>
            <?php }else{?>
				<tr><td colspan="5">对不起没有任何数据</td></tr>
            <?php }?>
			<tr><td></td><td></td><td></td><td></td><td></td><td><input type="submit" name="send" value="排序"></td></tr>
			<tr><td colspan="5">本来隶属:<strong><?php echo $this->_vars['prev_name'];?></strong>[<a href="nav.php?action=addChild&id=<?php echo $this->_vars['id'];?>">[增加本类]</a>]|[<a href="<?php echo $this->_vars['prev'];?>">返回列表]</a></td></tr>

		</table>
		<div id="page"><?php echo $this->_vars['page'];?></div>
		</form>
	<?php }?>
	<!--修改页面 -->
    <?php if($this->_vars['update']){ ?>
		<form method="post" name="update">
			<input type="hidden" value="<?php echo $this->_vars['prev_url'];?>" name="prev">
			<input type="hidden" value="<?php echo $this->_vars['id'];?>" name="id">
			<table class="left" cellspacing="0">
				<tr><td>导航名称：<input type="text" name="nav_name" class="text" value="<?php echo $this->_vars['nav_name'];?>">(*导航名称不得小于两位，不得大于二十位)</td></tr>
				<tr><td>导航描述：<textarea name="nav_info"><?php echo $this->_vars['nav_info'];?></textarea>(*描述不得大于200位)</td></tr>
				<tr><td><input type="submit" name="send" value="新增子导航" onclick="return checkUpdateForm()" class="submit level">[<a href="<?php echo $this->_vars['prev'];?>">返回列表</a>]</td></tr>
			</table>
		</form>
    <?php }?>
	<!--删除页面  -->
	<?php if($this->_vars['delete']){ ?>删除<?php }?>
</body>
</html>
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
		管理首页&gt;&gt;等级管理&gt;&gt;<strong id="title"><?php echo $this->_vars['title'];?></strong>
	</div>
	<ol>
		<li><a href="level.php?action=add" class="mes ">新增等级</a></li>
		<li><a href="level.php?action=show" class="mes selected" >等级列表</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="level.php?action=update&id=<?php echo $this->_vars['id'];?>" class="mes" >修改等级</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['show']){ ?>
	<table cellspacing="0">
		<tr>
			<th>编号</th><th>等级名称</th><th>描述</th><th>操作</th>
		</tr>
		<?php if($this->_vars['AllLevel']){ ?>
		<?php  foreach($this->_vars['AllLevel'] as $key =>$value){?>
		<tr>
			<td><script type="text/javascript">document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num'];?>);</script></td>
			<td><?php echo $value->level_name;?></td>
			<td><?php echo $value->level_info;?></td>
			<td><a href="level.php?action=update&id=<?php echo $value->id;?>">修改</a> | <a href="level.php?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除这个等级吗？')?true:false">删除</a></td>
		</tr>
		<?php }?>
			<?php }else{?>
				<tr><td colspan="4">对不起没有任何数据</td></tr>
		<?php }?>
	</table>

	<div id="page"><?php echo $this->_vars['page'];?></div>
	<?php }?>
	<!--新增页面  -->
	<?php if($this->_vars['add']){ ?>
		<form method="post" name="add">
			<table class="left">
				<tr><td>等级名称：<input type="text" name="level_name" class="text">(*等级名称不得小于两位，不得大于二十位)</td></tr>
				<tr><td>等级描述：<textarea name="level_info"></textarea>(*描述不得大于200位)</td></tr>
				<tr><td><input type="submit" name="send" value="新增等级" onclick="return checkAdd()" class="submit level">[<a href="<?php echo $this->_vars['prev'];?>">返回列表</a>]</td></tr>
			</table>
		</form>


	<?php }?>
	<!--修改页面 -->
	<?php if($this->_vars['update']){ ?>
		
		
		<form method="post" name="update">
			<input type="hidden" name="id" value="<?php echo $this->_vars['id'];?>" >
			<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev'];?>" >
			<table class="left">
				<tr><td>等级名称：<input type="text" name="level_name" value="<?php echo $this->_vars['level_name'];?>" class="text"></td></tr>
				<tr><td>等级描述：<textarea name="level_info" value="<?php echo $this->_vars['level_info'];?>"></textarea></td></tr>
				<tr><td><input type="submit" name="send" value="修改等级" onclick="return checkUpdateForm()" class="submit level">[<a href="<?php echo $this->_vars['prev'];?>">返回列表</a>]</td></tr>
			</table>
		</form>
	<?php }?>
	<!--删除页面  -->
	<?php if($this->_vars['delete']){ ?>删除<?php }?>
</body>
</html>
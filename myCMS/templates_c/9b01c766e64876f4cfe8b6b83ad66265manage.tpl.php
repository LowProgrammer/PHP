<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/admin_manage.js"></script>
</head>
<body id="main">
	<div class="map">
		管理首页&gt;&gt;管理员管理&gt;&gt;<strong id="title"><?php echo $this->_vars['title'];?></strong>
	</div>
	<ol>
		<li><a href="manage.php?action=add" class="mes selected">新增管理员</a></li>
		<li><a href="manage.php?action=show" class="mes" >管理员列表</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="manage.php?action=update&id=<?php echo $this->_vars['id'];?>" class="mes" >修改管理员</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['show']){ ?>
	<table cellspacing="0">
		<tr>
			<th>编号</th><th>用户名</th><th>等级</th><th>登录次数</th><th>最近登录IP</th><th>最近登陆时间</th><th>操作</th>
		</tr>
		<?php  foreach($this->_vars['AllManage'] as $key =>$value){?>
		<tr>
			<td><?php echo $value->id;?></td>
			<td><?php echo $value->admin_user;?></td>
			<td><?php echo $value->level_name;?></td>
			<td><?php echo $value->login_count;?></td>
			<td><?php echo $value->last_ip;?></td>
			<td><?php echo $value->last_time;?></td>
			<td><a href="manage.php?action=update&id=<?php echo $value->id;?>">修改</a> | <a href="manage.php?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除这个管理员吗？')?true:false">删除</a></td>
		</tr>
		<?php }?>
	</table>
		<div id="page"><?php echo $this->_vars['page'];?></div>
	{*<p class="center">[<a href="manage.php?action=add">新增管理员</a>]</p>*}
	<?php }?>
	<!--新增页面  -->
	<?php if($this->_vars['add']){ ?>
		<form method="post" name="add">
			<table class="left">
				<tr><td>用&nbsp;户 &nbsp;名：<input type="text" name="admin_user" class="text">(*不得小于2位，不得大于20位)</td></tr>
				<tr><td>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="admin_pass" class="text">(*不得小于6位)</td></tr>
				<tr><td>密码确认：<input type="password" name="admin_notpass" class="text">(*必须保持密码一致)</td></tr>
				<tr><td>等 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级：<select name="level">
									<?php  foreach($this->_vars['AllLevel'] as $key =>$value){?>
										<option value="<?php echo $value->id;?>"><?php echo $value->level_name;?></option>
									<?php }?>
									
								</select>
					</td>
				</tr>
				<tr><td><input type="submit" name="send" value="新增管理员" onclick="return checkAdd()" class="submit">[<a href="manage.php?action=show">返回列表</a>]</td></tr>
			</table>
		</form>


	<?php }?>
	<!--修改页面 -->
	<?php if($this->_vars['update']){ ?>
		
		<form method="post" name="update">
			<input type="hidden" name="id" value="<?php echo $this->_vars['id'];?>" >
			<input type="hidden" value="<?php echo $this->_vars['level'];?>" id="level">
			<input type="hidden" value="<?php echo $this->_vars['admin_pass'];?>" name="pass">
			<table class="left">
				<tr><td>用户名：<input type="text" name="admin_user" class="text" value="<?php echo $this->_vars['admin_user'];?>" readonly="true"></td></tr>
				<tr><td>密 &nbsp; &nbsp;码：<input type="password" name="admin_pass" class="text">(*留空则不修改)</td></tr>
				<tr><td>等 &nbsp; &nbsp;级：<select name="level">
									<?php  foreach($this->_vars['AllLevel'] as $key =>$value){?>
										<option value="<?php echo $value->id;?>"><?php echo $value->level_name;?></option>
									<?php }?>
								</select>
					</td>
				</tr>
				<tr><td><input type="submit" name="send" value="修改管理员" onclick="return checkUpdateForm()" class="submit">[<a href="manage.php?action=show">返回列表</a>]</td></tr>
			</table>
		</form>
	<?php }?>
	<!--删除页面  -->
	<?php if($this->_vars['delete']){ ?>删除<?php }?>
</body>
</html>
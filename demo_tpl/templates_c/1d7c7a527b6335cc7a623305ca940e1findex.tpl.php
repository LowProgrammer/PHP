<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->_config['webname'];?></title>
</head>
<body>
	系统分页数：<?php echo $this->_config['pagesize'];?>
	<br />
	<?php include'test.php';?>
	<br />
		<?php /* 注释文件，静态页面看不到，PHP代码能看到*/?>
		<?php echo $this->_vars['name'];?><?php echo $this->_vars['content'];?>
		
	<br />
		<?php if($this->_vars['a']){ ?>
			<div>一号界面</div>
			<?php }else{?>
			<div>二号界面</div>
		<?php }?>
		



		<?php  foreach($this->_vars['array'] as $key =>$value){?>
			<?php echo $key;?>....<?php echo $value;?><br/>
		
		<?php }?>
		
	<br />
</body>
</html>
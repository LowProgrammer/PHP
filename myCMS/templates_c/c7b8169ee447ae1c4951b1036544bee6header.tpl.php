<!-- 头部 -->
	<div id="top">
		<a href="###">这里放置文字广告1</a>
		<a href="###">这里放置文字广告2</a>
	</div>
	<!-- 网站LOGO -->
	<div id="header">
		<h1><a href="###">菲菲主页</a></h1>
		<div class="adver"><a href="###"><img src="images/adver.png" alt="广告图"></a></div>
	</div>
	<!-- 导航栏 -->
	<div id="nav">
		<ul>
			<li><a href="###">首页</a></li>
			<?php if($this->_vars['frontNav']){ ?>
				<?php  foreach($this->_vars['frontNav'] as $key =>$value){?>
					<li><a href="###<?php echo $value->id;?>"><?php echo $value->nav_name;?></a></li>
				<?php }?>
			<?php }?>
		</ul>
	</div>
	<!-- 搜索部分 -->
	<div id="search">
		<form>
			<select name="search">
				<option selected="selected">按标题</option>
				<option>按关键字</option>
				<option>全局刷新</option>
			</select>
			<input type="text" name="keyword" class="text">
			<input type="submit" name="send" class="submit" value="搜素">
		</form>
		<strong>TAG: </strong>
		<ul>
			<li><a href="">基金(3)</a></li>
			<li><a href="">美女(1)</a></li>
			<li><a href="">白兰地(3)</a></li>
			<li><a href="">音乐(1)</a></li>
			<li><a href="">体育(1)</a></li>
			<li><a href="">直播(1)</a></li>
			<li><a href="">会晤(1)</a></li>
			<li><a href="">韩日(1)</a></li>
			<li><a href="">警方(1)</a></li>
			<li><a href="">广州(1)</a></li>
		</ul>
	</div>
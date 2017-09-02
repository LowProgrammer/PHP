<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet" type="text/css" href="style/basic.css">
</head>
<body>
	<?php $_tpl->create('header.tpl');?>
	<!-- 会员登录 -->
	<div id="user">
		<h2>会员登录</h2>
		<form>
			<label>用户名：<input type="text" name="username" class="text"></label>
			<label>密 &nbsp; 码：<input type="password" name="password" class="text"></label>
			<label>验证码：<input type="text" name="code" class="text code"></label>
			<img src="images/code.png" alt="验证码">

			<p><input type="submit" name="send" value="登录" class="submit"><a href="###">注册会员</a><a href="###">忘记密码</a></p>
		</form>
		<h3>最近登录会员 <span>-----------------------</span></h3>
		<dl>
			<dt><img src="images/01.png" alt="头像"></dt>
			<dd>樱桃小丸子</dd>
		</dl>
		<dl>
			<dt><img src="images/01.png" alt="头像"></dt>
			<dd>樱桃小丸子</dd>
		</dl>
		<dl>
			<dt><img src="images/01.png" alt="头像"></dt>
			<dd>樱桃小丸子</dd>
		</dl>
		<dl>
			<dt><img src="images/01.png" alt="头像"></dt>
			<dd>樱桃小丸子</dd>
		</dl>
		<dl>
			<dt><img src="images/01.png" alt="头像"></dt>
			<dd>樱桃小丸子</dd>
		</dl>
		<dl>
			<dt><img src="images/01.png" alt="头像"></dt>
			<dd>樱桃小丸子</dd>
		</dl>
	</div>
	<!-- 新闻 -->
	<div id="news">
		<h3><a href="###">联合利华因散布涨价信息被罚</a></h3>	
		<P>我们要开设24小时无人值守智能零售店，2014年11月10号，在上海喜马拉雅酒店举行的一场普通发布会上，会议的主办人、刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。<a href="###">[查看全文]</a></P>
		<p class="link">
			<a href="###">优酷计划通过增发再融6亿美元</a>|
			<a href="###">优酷计划通过增发再融6亿美元</a>
			<a href="###">优酷计划通过增发再融6亿美元</a>|
			<a href="###">优酷计划通过增发再融6亿美元</a>
		</p>
		<ul>
			<li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长500%...</a></li>
			<li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长500%...</a></li>
			<li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长500%...</a></li>
			<li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长500%...</a></li>
			<li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长500%...</a></li>

			<li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长500%...</a></li>
			<li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长500%...</a></li>
			<li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长500%...</a></li>
			<li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长500%...</a></li>
			<li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长500%...</a></li>

		</ul>
	</div>
	<!-- 新闻图片 -->
	<div id="pic">
		<img src="images/adverleft.png" alt="新闻图片">
	</div>
	<!-- 推荐新闻 -->
	<div id="rec">
		<h2>特别推荐</h2>
		<ul>
			<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
			<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
			<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
			<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
			<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
			<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
			<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	

			
		</ul>
	</div>
	<!-- 右部本月热点 -->
	<div id="siderbar-right">
		<div class="adver">
			<img src="images/adver2.png" alt="广告图">
		</div>
		<div class="hot">
			<h2>本月热点</h2>
			<ul>
					<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
					<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
					<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
					<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
					<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
					<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
					<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>
			</ul>
		</div>
		<div class="comm">
			<h2>本月评论</h2>
			<ul>
				<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
				<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
				<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
				<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
				<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
				<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
				<li><em>06-20</em><a href="">银监会否认首套房房贷首付将提至...</a></li>	
			</ul>
		</div>
		<div class="vote">
			<h2>调查投票</h2>
			<h3>请问您是怎么知道本站的：</h3>
			<form>
				<label><input type="radio" name="vote" checked="checked">门户网站搜索引擎</label>
				<label><input type="radio" name="vote">Google或百度搜索</label>
				<label><input type="radio" name="vote">别的网站链接</label>
				<label><input type="radio" name="vote">朋友介绍或者电视广告</label>
				<p><input type="submit" name="send" value="投票"><input type="button" name="send" value="查看"></p>
			</form>
		</div>
	</div>
	<!-- 图片新闻 -->
	<div id="picnews">
		<h2>图文资讯</h2>
		<dl>
			<dt><a href="###"><img src="images/pic1.png" alt="标题"></a></dt>
			<dd><a href="###">以色列总理厨房法国 士兵迎接仪式上晕倒</a></dd>
		</dl>
		<dl>
			<dt><a href="###"><img src="images/pic1.png" alt="标题"></a></dt>
			<dd><a href="###">以色列总理厨房法国 士兵迎接仪式上晕倒</a></dd>
		</dl>
		<dl>
			<dt><a href="###"><img src="images/pic1.png" alt="标题"></a></dt>
			<dd><a href="###">以色列总理厨房法国 士兵迎接仪式上晕倒</a></dd>
		</dl>
		<dl>
			<dt><a href="###"><img src="images/pic1.png" alt="标题"></a></dt>
			<dd><a href="###">以色列总理厨房法国 士兵迎接仪式上晕倒</a></dd>
		</dl>
	</div>
	<!-- 新闻列表 -->
	<div id="newslist">
		<div class="list bottom">
			<h2><a href="###">更多</a>军事动态</h2>
			<ul>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

			</ul>
		</div>
		<div class="list right bottom">
			<h2><a href="###">更多</a>八卦娱乐</h2>
			<ul>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

			</ul>
		</div>
		<div class="list">
			<h2><a href="###">更多</a>时尚女人</h2>
			<ul>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

			</ul>
		</div>
		<div class="list right">
			<h2><a href="###">更多</a>科技频道</h2>
			<ul>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>
				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

				<li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增长...</a></li>

			</ul>
		</div>

	</div>
	<?php $_tpl->create('footer.tpl');?>
</body>
</html>
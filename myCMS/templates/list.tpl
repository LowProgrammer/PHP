<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="style/list.css">
	<link rel="stylesheet" type="text/css" href="style/basic.css">

</head>
<body>
	{include file='header.tpl'}
    <div id="list">
        <h2>当前位置 &gt; {$nav}</h2>
        <dl>
            <dt><img src="images/none.jpg" alt=""/></dt>
            <dd>[<strong>军事动态</strong>]<a href="###">联合利华因散布涨价信息被罚200万</a></dd>
            <dd>日期：2019年9月2日 10:10:10 点击率：1000 好评：500</dd>
            <dd>我们要开设24小时无人值守智能零售店，
                2014年11月10号，在上海喜马拉雅酒店举行的一场普通发布会上，会议的主办人、
                刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。
                刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。</dd>
        </dl>
        <dl>
            <dt><img src="images/none.jpg" alt=""/></dt>
            <dd>[<strong>军事动态</strong>]<a href="###">联合利华因散布涨价信息被罚200万</a></dd>
            <dd>日期：2019年9月2日 10:10:10 点击率：1000 好评：500</dd>
            <dd>我们要开设24小时无人值守智能零售店，
                2014年11月10号，在上海喜马拉雅酒店举行的一场普通发布会上，会议的主办人、
                刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。
                刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。</dd>
        </dl>
        <dl>
            <dt><img src="images/none.jpg" alt=""/></dt>
            <dd>[<strong>军事动态</strong>]<a href="###">联合利华因散布涨价信息被罚200万</a></dd>
            <dd>日期：2019年9月2日 10:10:10 点击率：1000 好评：500</dd>
            <dd>我们要开设24小时无人值守智能零售店，
                2014年11月10号，在上海喜马拉雅酒店举行的一场普通发布会上，会议的主办人、
                刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。
                刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。</dd>
        </dl>
        <dl>
            <dt><img src="images/none.jpg" alt=""/></dt>
            <dd>[<strong>军事动态</strong>]<a href="###">联合利华因散布涨价信息被罚200万</a></dd>
            <dd>日期：2019年9月2日 10:10:10 点击率：1000 好评：500</dd>
            <dd>我们要开设24小时无人值守智能零售店，
                2014年11月10号，在上海喜马拉雅酒店举行的一场普通发布会上，会议的主办人、
                刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。
                刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。</dd>
        </dl>
        <dl>
            <dt><img src="images/none.jpg" alt=""/></dt>
            <dd>[<strong>军事动态</strong>]<a href="###">联合利华因散布涨价信息被罚200万</a></dd>
            <dd>日期：2019年9月2日 10:10:10 点击率：1000 好评：500</dd>
            <dd>我们要开设24小时无人值守智能零售店，
                2014年11月10号，在上海喜马拉雅酒店举行的一场普通发布会上，会议的主办人、
                刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。
                刚回国的陈海波没有想到自己的这句话会被台下众多观众所嘲笑。</dd>
        </dl>
        <div id="page">分页</div>
    </div>
    <div id="sidebar">
        <div class="nav">
            <h2>子栏目列表</h2>
            {if $childNav}
                {foreach $childNav(key,value)}
                <strong><a href="list.php?id={@value->id}">{@value->nav_name}</a></strong>
                {/foreach}
            {else}
                <span>该栏目暂无数据</span>
            {/if}
        </div>
        <div class="right">
            <h2>本类推荐</h2>
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
        <div class="right">
            <h2>本类推荐</h2>
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
        <div class="right">
            <h2>本类推荐</h2>
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
    </div>
	{include file='footer.tpl'}
</body>
</html>
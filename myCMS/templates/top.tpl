<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>top</title>  
    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/admin.js"></script>
</head>
<body id="top">
	<h1>LOGO</h1>
	<ul>
		<li><a href="../templates/sidebar.html" target="sidebar" class="selected" id="nav1" onclick="admin_top_nav(1)">首页</a></li>
		<li><a href="../templates/sidebarn.html" target="sidebar" id="nav2" onclick="admin_top_nav(2)">内容</a></li>
		<li><a href="###" id="nav3" target="sidebar" onclick="admin_top_nav(3)">会员</a></li>
		<li><a href="###" id="nav4" target="sidebar" onclick="admin_top_nav(4)">系统</a></li>	
	</ul>
	<p>
		您好，admin [ 超级管理员 ][ <a href="../" target="_blank">去首页</a> ] [ 退出 ]
	</p>
</body>
</html>
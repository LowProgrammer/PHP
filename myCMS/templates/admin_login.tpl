<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/admin_login.js"></script>
</head>
<body >
	<form method="post" action="admin_login.php?action=login" id="admin_login" name="login">
		<fieldset>
			<legend>登录后台CMS登录系统</legend>
			<label>账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：<input type="text" name="admin_user" class="text"></label>
			<label>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="admin_pass" class="text"></label>
			<label>验&nbsp;证&nbsp;码：<input type="text" name="code" class="text"></label>
			<label class="t">输入的下图的字符不区分大小写</label>
			<label><img src="../config/code.php" onclick="javascript:this.src='../config/code.php?tm='+Math.random();" ></label>
			<input type="submit" value="登录" class="submit" onclick="return checkLogin()" name="send">
		</fieldset>
	</form>
</body>
</html>
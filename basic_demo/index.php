<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员系统</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php
		function __autoload($_className){
			require $_className.'.class.php';
		}
		if(isset($_GET['index'])){
			$main=new Main($_GET['index']);
		}else{
			$main=new Main();
		}
		$main->_run();
	?>
	
</body>
</html>
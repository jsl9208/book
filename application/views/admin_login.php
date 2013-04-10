<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
</head>
<body>
	<?php 
		echo $heading;
	 ?>
	 <form action="<?php echo $base_url ?>/book/login">
	 	<p>用户名：</p><input type="text" name="username" id="username"><br>
	 	<p>密码：</p><input type="text" name="password" id="password"><br>
	 </form>
</body>
</html>

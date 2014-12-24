	{
		<!doctype html>
		<html>
		<head>
		<title>Login Confirm</title>
		</head>
		<body>
		<?php
		echo"Your user name is ".$_REQUEST['name']."<br>";
		echo"Your Email id is ".$_REQUEST['email']."<br>";
		$gender=$_REQUEST['gender'];
		if($gender=='M')
		{
			echo"Your account has been successfully created Mr.".$_REQUEST['name'];;
		}else
		{echo"Your account has been successfully created Mrs.".$_REQUEST['name'];;
		}
		?>
		</body>
		</html>}

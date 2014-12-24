<!doctype html>
<html>
<head>
<title>Login Confirm</title>
</head>
<body>
<?php
if(isset($_REQUEST['SNU'])
{
echo "Your username is ".$_REQUEST['SNU'];
$name=$_REQUEST['SNU'];
}
else
echo "Please enter your User name";
<br>
if(isset($_REQUEST['email'])
echo "Your Email id is ".$_REQUEST['email'];
else
echo "Please enter your Email id";
<br>
if(!(isset($_REQUEST['gender'])))
echo "Please enter your Gender";

$gender=$_REQUEST['gender'];
if($gender=='M')
echo"Your account has been successfully created Mr.".$gender;
else
echo"Your account has been successfully created Mrs.".$gender;
<br>
?>
</body>
</html>
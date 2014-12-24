<?php
include('includes/config.inc.php');
include('mysqli_connect.php');
$page_title='Register';
include('includes/header.html');
if(isset($_POST['submitted']))
{
require_once(MYSQL);
}
$trimmed=array_map('trim',$_POST);    //for trimming the form data, array_map func automatically trims the post variables
$e=$fn=$ln=$p=FALSE;
$bal=0;
if(isset($_POST['first_name'])&&isset($_POST['last_name'])&&isset($_POST['email'])&&isset($_POST['password1'])&&isset($_POST['password2'])&&isset($_POST['balance']))
{
/*
if($_POST['balance']>0&&$_POST['balance']<10000)
{
echo"Invalid Balance";
header("location:register.php");
}
else
{
*/
$bal=$_POST['balance'];

if(preg_match('/^[A-Z\'.-]{2,20}$/i',$trimmed['first_name']))
{
$fn=mysqli_real_escape_string($dbc,$trimmed['first_name']);
}
else
{
echo '<p class="error"> Please enter your first Name</p>';
echo mysqli_error($dbc);
}
if(preg_match('/^[A-Z\'.-]{2,20}$/i',$trimmed['last_name']))
{
$ln=mysqli_real_escape_string($dbc,$trimmed['last_name']);
}
else
{
echo '<p class="error"> Please enter your last Name</p>';
}
if(preg_match('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/',$trimmed['email']))
{
$e=mysqli_real_escape_string($dbc,$trimmed['email']);
}
else{
echo'<p class="error">Please enter a valid email </p>';
include('includes/footer.html'); 
//exit();
}
if(preg_match('/^\w{4,20}$/',$trimmed['password1']))
{
if($trimmed['password1']==$trimmed['password2'])
{
$p=mysqli_real_escape_string($dbc,$trimmed['password1']);
}
else
{
echo'<p class="error">Passwords dont match</p>';
include('includes/footer.html');
//exit();
}
}
else
{
echo'<p class="error">Please enter a valid password</p>';
include('includes/footer.html'); 
//exit();
}

if($fn&&$ln&&$e&&$p)
{
$q="SELECT user_id FROM users WHERE email='$e'";
$r=mysqli_query($dbc,$q) or trigger_error("Query: $q\n<br>MySQL Error:".mysqli_error($dbc));
if(mysqli_num_rows($r)==0) //available
{
$q="INSERT INTO users(email,pass,first_name,last_name,balance,registration_date) VALUES('$e',SHA1('$p'),'$fn','$ln','$bal',NOW())";
$r=mysqli_query($dbc,$q) or trigger_error("Query: $q\n<br>MySQL Error:".mysqli_error($dbc));
if($r)
{
header("location:flag.php");
echo'<h1>You are a registered user</h1>';
echo"<h2>Welcome </h2>";
echo"$fn";
}
else{
echo'<h1>System error</h1>';
echo'<p class="error">You could not register due to system error</p>';
}
mysqli_close($dbc);
include('includes/footer.html');
exit();
}
else //in case email not available
{
echo'<p class="error">That email has already been registered,try registering again with a different email id"</p>';
}
}
else{
echo'<p class="error">Please re-enter your password,try registering again</p>';
}
}
mysqli_close($dbc);
?>

		<form action="register.php" method="post">
		<br>
		<legend><h3><br><br><br>Register</h3></legend>
		<p><b>First Name:</b> <input type="text" name="first_name" size="20" maxlength="40" value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name']; }?>" /></p><br>
		<p><b>Last Name:</b> <input type="text" name="last_name" size="20" maxlength="40" value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name']; }?>" /></p><br>
		<p><b>Balance Ammount:</b> <input type="text" name="balance" size="5" maxlength="5" value="<?php if(isset($_POST['balance'])){echo$_POST['balance'];} ?>" ></p><br>
        <p><b>Email Address:</b> <input type="text" name="email" size="20" maxlength="40" value="<?php if(isset($_POST['email'])){echo$_POST['email'];} ?>" ></p><br>
		<p><b>Type Password:</b> <input type="password" name="password1" size="20" maxlength="20"><small>Use only letters,numbers and underscore.Must be between 4 and 20 characters long</small></p><br>
		<p><b>Confirm Password:</b> <input type="password" name="password2" size="20" maxlength="20"><small>Retype Password</small></p>
		<div align="center"><input type="submit" name="submit" value="Register"></div>
		<input type="hidden" name="submitted" value="TRUE">
		</form>
		<?php include('includes/footer.html'); ?>
		


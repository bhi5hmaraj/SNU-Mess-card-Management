<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Log-in</title>

  <comment><link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'></comment>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <h1>Log-in</h1><br>
  <form action="login.php" method="post">
    <input type="text" name="email" placeholder="Email ID">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
	<comment><input type="hidden" name="submitted" value="TRUE"></comment>
  </form>

  <div class="login-help">
  <center>
    <a href="register.php">Register</a> 
	</center>
  </div>
</div>


</body>
</html>
<?php
require_once('includes/config.inc.php');
$page_title='Login';
ob_start();
session_start();
 require_once(MYSQL);
 if(isset($_POST['login']))
 {
 if(!empty($_POST['email']))
 {
 $e=mysqli_real_escape_string($dbc,$_POST['email']);
 }
 else{
 $e=false;
 echo'You Forgot to enter your email address';
 }
 if(!empty($_POST['pass']))
 {
 $p=mysqli_real_escape_string($dbc,$_POST['pass']);
 }
 else{
 $p=false;
 echo' You Forgot to enter your password';
 }
 
 if($p&&$e)
 {
 $q="SELECT user_id, first_name, user_level FROM users WHERE (email='$e' AND pass=SHA1('$p'))";
 $r=mysqli_query($dbc,$q) OR trigger_error("Query: $q\n<br>/>MySQL error: ".mysqli_error($dbc));
 if(@mysqli_num_rows($r)==1)
 {
 echo"logged in";
 $_SESSION=mysqli_fetch_array($r,MYSQLI_ASSOC);
 mysqli_free_result($r);
 mysqli_close($dbc);
 ob_end_clean();
 header("location:DispTable.php");
 exit();
 }
 else{
 echo'<p class="error">Either the email id, password combination is incorrect or the account isn\'t activated yet</p>';
 }
 }
  mysqli_close($dbc);
 }

 ?>
 
<?php ob_end_flush(); ?>
<?php
require_once('includes/config.inc.php');
$page_title='Logout';
include('includes/header.html');
if(!isset($_SESSION['first_name']))
{
ob_end_clean();
header('location:index.php');
exit();
}
else
{
$_SESSION=array();
session_destroy();
setcookie(session_name(),'',time()-300);   //destroy the cookie
}
echo'<center><br><br><br><h1>You have successfully logged out.<br><br>Click on the links below to continue</h1></center>';
include('includes/footer.html');
?>
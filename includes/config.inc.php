<?php
/* This script is a configuration script used for:
 -Defining constants
 -Error handling
 -defining useful functions
 */
 define('LIVE',FALSE); #Flag variable for site status
 define('BASE_URL','localhost/index.php'); 
 define('MYSQL','C:\xampp\htdocs\mysqli_connect.php');  #location of mysqli connect script
 
 //Error Handler Method
 function my_error_handler($e_number,$e_message,$e_file,$e_line,$e_vars)
 {
 $message="<p>An error has occurred in script '$e_file' on line $e_line: $e_message\n";
 $message.="<pre>".print_r($e_vars,1)."</pre>\n</p>";    #to append the error variables to the message
 if(!LIVE)     #print the error during development
 {
 echo'<div id="Error">'.$message.'</div><br>';
 }
 else
 {
 echo'<div class="error"> A system error has occurred,sorry for the inconvenience.</div><br>';
 }
 }
 
 set_error_handler('my_error_handler'); //tell php to use this custom error handler
 ?>
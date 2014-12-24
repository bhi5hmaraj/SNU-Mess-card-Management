<!DOCTYPE html>
<html>
<head>
<style>
<style>
#ICP {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
width: 33%;
position: absolute;
left:33%;
top:33%;
}
#table {
display: table;
border-collapse: separate;
border-spacing: 2px;
border-color: gray;
}
#ICP th {
font-size: 1.4em;
text-align: left;
padding-top: 5px;
padding-bottom: 4px;
background-color:#FF6600;
color: #fff;
}
# ICP td {
font-size: 1.2em;
border: 1px solid #98bf21;
padding: 3px 7px 2px 7px;
color: #fff;
}
.alt{
font-size: 1.1em;
border: 1px solid #98bf21;
padding: 3px 7px 2px 7px;
background-color:#7F8C8D;
color: #fff;
}
</style>
<script type="text/javascript"></script><link rel='stylesheet' type='text/css' href='/B1D671CF-E532-4481-99AA-19F420D90332/netdefender/hui/ndhui.css' /></head>
<body><script type='text/javascript' language='javascript' src='/B1D671CF-E532-4481-99AA-19F420D90332/netdefender/hui/ndhui.js?0=0&amp;0=0&amp;0=0'></script>
<body>

<?php
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "myDB";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
     // die("Connection failed: " . $conn->connect_error);
// } 
$page_title='EXPENSES';
include('includes/header.html');
include('mysqli_connect.php');	
$id=$_SESSION['user_id'];
$q ="SELECT balance FROM `users` WHERE `user_id`='".$id."'";
$r = $dbc->query($q);
$row=mysqli_fetch_array($r);
$bal=$row[0];
$sql ="SELECT * FROM `bhishmaraj` WHERE `user_id`='".$id."'";
$result = $dbc->query($sql);
//$num = mysql_num_rows($result);
echo'<center><h3><br><br><br>
        Welcome '.$_SESSION['first_name'].'<br><br>'.'Balance is Rs '.$bal.'<br><br></h3>
  <a class="pure-button" href="add.php"><button class="pure-button"><span style="cursor:pointer"> Add Entry +</span></button></a>
	</center>';
echo'<center><br><br><br>';
//$row=mysqli_fetch_array($result);

if ($result->num_rows > 0) {
     echo "<table id=\"ICP\"><tr><th>Sno.</th><th>SHOP</th><th>ITEM</th><th>QUANTITY</th><th>PRICE</th><th>TOTAL</th><th>DATE AND TIME</th></tr>";
     // output data of each row
	 $ct=1;
	 echo "<tbody>";
     while($row = $result->fetch_assoc()) {
	 $date=date_create($row['dateandtime']);
     $date=date_format($date, 'F j, Y, g:i a');
	//for ($i = 0; $i < $num; $i++){
        //$row = mysql_fetch_array($result);
	    if($ct%2!=0)
		{
         echo "<tr><td>" . $ct. "</td><td>" . $row["shop"]. "</td><td>" . $row["item"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["price"]."</td><td>" . $row["total"]."</td><td>" . $date."</td></tr>";
		 }
		 else
		 {
		 echo "<tr class=\"alt\"><td>" . $ct. "</td><td>" . $row["shop"]. "</td><td>" . $row["item"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["price"]."</td><td>" . $row["total"]."</td><td>" . $date."</td></tr>";
		 
		 }
		 //<tr class=\"alt\">
		 $ct=$ct+1;
		 
     }
	 echo "</tbody>";
     echo "</table>";
} 
else {
     echo "0 results";
}
echo'</center>';
$dbc->close(); 
include('includes/footer.html');
?>
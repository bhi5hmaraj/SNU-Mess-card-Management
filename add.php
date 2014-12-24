


<?php
 $page_title='ADD';
 include('includes/header.html');
 include('mysqli_connect.php');
 // ob_start();
 $price;
 global $SHOP;
?>
<BR><BR><BR><BR><BR>
 <form action="add.php" method="post">
 <?php
 /*
  $shops=array(1=> 'Celeste','Chow','Lacucina','Rollmall');
 echo '<select name="SHOP">';
 foreach($shops as $key => $value)
 {
   echo"<option value=\"$value\">$value</option>\n";
  }

  echo'</select>';
  */
  $sql ="SELECT shop FROM `items`";
 
$result = $dbc->query($sql);

if ($result->num_rows > 0) 
{    
    //echo'<CENTER><P>ENTER THE SHOP:</P></center>';
     echo'<center>CHOOSE A SHOP: <select name="SHOP"></center>';
     // output data of each row
	 $temp1=$row['shop'];
	 $temp2='junk';
	 if(isset($_POST['SHOP']))
	 {
	 echo"<option value=\"0\">".$_POST['SHOP']."</option>\n";
	 }
	 else{
	 echo"<option value=\"0\">".SELECT."</option>\n";
	 }
     while($row = $result->fetch_assoc()) {
	 $temp1=$row['shop'];
	 if($temp1!=$temp2)
	 {
      echo"<option value=\"$temp1\">".$temp1."</option>\n";
	  $temp2=$temp1;
	  }
     }
	  echo'</select><CENTER><BR>';
	 }
	
	  
	 
?>
<div align="center"><input type="submit" name="submitshop" value="ADD SHOP"></div>
<input type="hidden" name="submittedshop" value="TRUE">
<br><br>
</FORM>
<form action="add.php" method="post">
<?php
 
 if(isset($_POST['submitshop']))
 {
 $SHOP=$_POST['SHOP'];

if(isset($SHOP))
{

$sql ="SELECT item FROM `items` WHERE `shop`='".$SHOP."'";
 
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
     echo'<CENTER>CHOOSE AN ITEM: <select name="ITEM"></CENTER>';
     // output data of each row
	 echo"<option value=\"0\">".SELECT."</option>\n";
     while($row = $result->fetch_assoc()) {
	 $temp=$row['item'];
      echo"<option value=\"$temp\">".$temp."</option>\n";
     }
	 echo'</select>';
	  }
else
{
echo'<p class="error">Internal error</p>';
}
}
else
{
echo'<p class="error">query not run</p>';
}

echo'<CENTER><p>Quantity:<input type="text" name="quantity" size="5" maxlength="5"></p><br></CENTER>';
echo'<div align="center"><input type="submit" name="submititem" value="ADD ITEM"></div>
<input type="hidden" name="submitteditem" value="TRUE">
<br><br>';
}
?>
</form>
<form action="add.php" method="post">
<?php
static $price=0;
if(isset($_POST['submititem']))
{
$TEMPITEM=$_POST['ITEM'];
if(isset($TEMPITEM))
{
//echo"THE ITEM YOU'VE SELECTED IS= ".$TEMPITEM;   //**  item
echo'<br>';
$sql ="SELECT price FROM `items` WHERE `item`='".$TEMPITEM."'"; 

$r=@mysqli_query($dbc,$sql);
$row=mysqli_fetch_array($r);
$price=$row[0];           //**  price
//echo"the price:".$price;

$QUANTITY=$_POST['quantity'];    //** quantity
echo'<br>';
//echo"Quantity=".$QUANTITY;
$total=$price*$QUANTITY;         //** total
//echo'<h2>TOTAL: '.$total;
echo'</h2>';

// echo'<p><b>Do you want to continue?</b> <input type="radio" name="confirm" value="Y"> YES <input type="radio" name="confirm" value="N"> NO</p>';
// echo'<div align="center"><input type="submit" name="confirmsubmit" value="ADD ITEM"></div>';
 // if(isset($_POST['confirmsubmit']))
 // {
 // $con=$_POST['confirm'];
 // if($con=='Y')
 // {
    $sql ="SELECT shop FROM `items` WHERE `item`='".$TEMPITEM."'";
    $result = $dbc->query($sql);
    $row=mysqli_fetch_array($result);
    $SHOP=$row[0];
	$bal=0;
   /*echo '<h2>logged in as '.'  '.$_SESSION['first_name'].' User ID= '.$_SESSION['user_id'].'</h2><br>';*/
    $id=$_SESSION['user_id'];
    $sql ="SELECT balance FROM `users` WHERE `user_id`='".$id."'";
	$result = $dbc->query($sql);
    $row=mysqli_fetch_array($result);
    $bal=$row[0];
	if($bal<$total)
	{
	 echo '<h3>Low Balance Pls Recharge, Available Balance: Rs '.$bal.'</h3><br>';
	 }
   else{
   echo '<h3>'."The shop=".$SHOP.'<br>';
   echo 'Item: '.$TEMPITEM.'<br>';
   echo 'Price: '.$price.'<br>';
   echo 'Quantity:'.$QUANTITY.'<br>';
   echo 'Total: '.$total.'<br></h3>';
   
   if($bal>=$total)
   {
   $q="INSERT INTO bhishmaraj (user_id,item,shop,quantity,price,total,dateandtime) VALUES ('$id','$TEMPITEM','$SHOP','$QUANTITY','$price','$total',NOW())";
   $r=mysqli_query($dbc,$q) or trigger_error("Query :$q\n<br>MySQL Error: ".mysqli_error($dbc));
   $bal=$bal-$total;
   $q="UPDATE users SET balance=$bal WHERE user_id=$id";
   $r=mysqli_query($dbc,$q);
   if(mysqli_affected_rows($dbc)==1)
   {
   echo'<h2> Thank you, Your balance is now Rs.'.$bal.'</h2>';
   echo'<a  href="add.php"><button ><span style="cursor:pointer"> Add Entry +</span></button></a>';
   }
   else{
   echo'<h2> System Error</h2><br>';
   }
   }
   // else
   // {
     // echo"<h3>Low Balance, Balance= Rs".$bal;
   // echo'<br><br><br><br><br><br>';
   // }
   }
   // }
    // else
// {
 // header('location:"add.php"');
// }
 }

 
 

else
{
echo'<p class="error">item entered but not set</p>';
}
}
//}

?>

</FORM>
<?php
mysqli_close($dbc);
include('includes/footer.html');
?>

  
<!doctype html>
<html lang="en">
<head>

    <title>Welcome to SNU mess expense manager</title>
        <link rel="stylesheet" href="/includes/css.css">
	</head>
<body>
<?php
ob_start();
session_start();
require_once('includes/config.inc.php');   //include the configuration file
if(isset($_SESSION['first_name']))         //check whether the user is logged in
{
echo ",{$_SESSION['first_name']}!";
header('location:DispTable.php');
}
?>
<div class="mainheading">
    <div class="splash">
        <h1 class="splash-head">SNU mess card manager</h1>
        <p class="splash-subhead">
            works around the way you eat and spend
        </p>
        <p>
            <a href="login.php" class="pure-button pure-button-primary">Login</a>
			<a href="register.php" class="pure-button pure-button-primary">Register</a>
        </p>
    </div>
</div>

<div class="content-wrapper">
    <div class="content">
        <h2 class="content-head is-center">what's an expense manager?</h2>

        <div class="pure-g">
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">

                <h3 class="content-subhead">
                    Get Started Quickly
                </h3>
                <p>
                    It calculates our day-to-day expenses and will keep track of our money.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    User-friendly Interface
                </h3>
                <p>
                  It works similar to an expense manager but is aimed for students using culinary card to keep track of their expensess  
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    Tabular
                </h3>
                <p>
                   Gives your usage in a tabular format
                </p>
            </div>
    

    <div class="ribbon l-box-lrg pure-g">
        <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
            <img class="pure-img-responsive" alt="File Icons" width="300" src=dollar-sign-vector-918725.jpg>
        </div>
        <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">

            <h2 class="content-head content-head-ribbon">keep track of your money</h2>

            <p>
                The expense manager is a very useful application for keeping track of your use of culinary card in the campus.it makes a log of your card and gives you the exact amount of money left with you
            </p>
        </div>
    </div>
            <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
                <h4>Contact Us</h4>
                <p>
                    Any problem with the expense manager,feel free to contact us
                </p>

                
            </div>
        </div>

    </div>

    <div class="footer l-box is-center">
               Project done by group I-cse
    </div>

</div>
</body>
</html>
<?php ob_end_flush(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Summary</title>
    <link rel="stylesheet" type="text/css" href="css/pgResponse.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
    <header>
        <nav id="header-nav" class="navbar">
            <div class="navbar-header">
                <a href="../index.php" class="">
                    <div id="logo-img"></div>
                </a>
                <!--<div id="search">
                    <form autocomplete="off" id="form">
                        <input type="text" id="search_box" placeholder="Search for Medicines/Healthcare Products" size="70">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        <div class="search_list" id="output"></div>
                    </form>
                </div><br>-->
                <!--<button id="navbarToggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>			
                </button>-->
            </div>
            <!--navbar-header-->
            <div id="navl">
                <?php session_start(); ?>
                <form action="cartDetails.php" method="get">
                    <div id="nav-3">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        <input type="submit" name="userID" value="Cart" id=""
                            style="background:none; border:none; color: white; font-size: 19px; font-weight: 100; cursor: pointer;">
                    </div>
                </form>
                <?php            
                if(key_exists('loggedIn', $_SESSION)) { 
                    if($_SESSION['loggedIn']==true)
                        echo '<div href="about.html" id="navl">USER:'.$_SESSION['userName'].'</div>';
                }
                else {
                    //  "<a href='./login.php'><button>SignUp</button></a>";
                    echo '<div href="about.html" id="navl"><i class="fa fa-sign-in" aria-hidden="true"></i><a href="./login.php" style="text-decoration: none; color: white;"> Login/Signup</a></div>';
                }
                ?>
            </div>
            <!--navl-->
            <form method="get" action="./categories.php">
                <div id="nav-list">
                    <a href="./categories.php">
                        <div><i class="fa fa-shopping-bag" aria-hidden="true"></i> Shop From Us</div>
                    </a>
                </div>
            </form>
        </nav>
        <!--nav-->
    </header>
    <?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


// if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS" && isset($_POST) && count($_POST)>0) { 

		// THE ORDER IS SUCCESSFUL
		require "../dbcon.php";
		$orderID = $_POST['ORDERID'];
		$userID = $_SESSION["userID"];
		$orderAmount=$_POST['TXNAMOUNT'];

		$sql ="INSERT INTO `orders` ( `userID`, `orderID`, `orderAmount`) VALUES ( '".$_SESSION["userID"]."', $orderID, $orderAmount)" ; 
		
		$result = mysqli_query($conn, $sql);

		$sql = "UPDATE usercart set ORDERED=1, orderID=$orderID where userID=$userID and ordered=0";
		
		$result = mysqli_query($conn, $sql);
		echo $sql;
		echo var_dump($result);
		//echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		?>
    <fieldset>
        <legend><img src="./Images/tick mark.jpg" alt="Success" width="100px" height="100px"></legend>
        <h1 class="status">Your order has been placed successfully :)</h1>
        <p class="p-tag">Order ID: <br> <span class="span-tag"><?php echo $_POST['ORDERID'] ?></span> </p>
        <p class="p-tag">Payment Method: <br> <span class="span-tag"><?php echo $_POST['GATEWAYNAME'] ?></span> </p>
        <p class="p-tag">Total Amount: <br> <span class="span-tag">&#x20B9; <?php echo $_POST['TXNAMOUNT'] ?></span>
        </p>
        <p class="p-tag">Transaction Date: <br> <span class="span-tag"><?php echo $_POST['TXNDATE'] ?></span> </p>
        <form action="../index.php">
            <input class="back-btn" type="submit" value="Go Back" />
        </form>
    </fieldset>

    <?php

	}
	else {
		echo "<fieldset style='height:100px;'><strong class='p-tag'>Transaction status is failure</strong>" . "<br/>
		<form action='../index.php'>
		<input class='back-btn' type='submit' value='Go Back' />
	</form> </fieldset>";
	}		
// }

?>
    <footer class="panel-footer">
        <div class="row">
            <section id="C-S">
                <span>Company</span><br>
                Career<br>
                Partner With Medizap<br>
                <a href="about.html">About Us</a><br>
                <span>Our Services</span><br>
                Order Medicines<br>
                Healthcare Products<br>
                Wellness Products
            </section>
            <section id="FC">
                <span>Featured Categories</span><br>
                Personal Career<br>
                Ayurvedic Store<br>
                Mother & Baby care<br>
                Diabetic Care<br>
                Skin Care
            </section>
            <section id="NH">
                <span>Need Help</span><br>
                Browse All Medicines<br>
                Browse All Molecules<br>
                FAQ<br>
            </section>
            <section id="F">
                <span>Whatsapp Us</span><br>
                <i class="fa fa-whatsapp" aria-hidden="true"></i> 9087654321<br>
                <span>FOLLOW US</span><br>
                <a href="https://www.facebook.com/" class="button" target="_blank"><i
                        class="fa fa-facebook-official w3-hover-opacity"></i></a>
                <a href="https://www.instagram.com/" class="button" target="_blank"><i
                        class="fa fa-instagram w3-hover-opacity"></i></a>
                <a href="https://www.snapchat.com/" class="button" target="_blank"><i
                        class="fa fa-snapchat w3-hover-opacity"></i></a>
                <a href="https://www.pinterest.com/" class="button" target="_blank"><i
                        class="fa fa-pinterest-p w3-hover-opacity"></i></a>
                <a href="https://www.twitter.com/" class="button" target="_blank"><i
                        class="fa fa-twitter w3-hover-opacity"></i></a>
                <a href="https://www.linkedin.com/" class="button" target="_blank"><i
                        class="fa fa-linkedin w3-hover-opacity"></i></a>
            </section>
        </div>
        <div class="reserved"> Copyright &copy; 2020 Medizap. All Rights Reserved</div>
        </div>
    </footer>
</body>

</html>
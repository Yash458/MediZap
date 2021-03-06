<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
    <title>MediZap</title>
</head>

<body>
    <header>
        <nav id="header-nav" class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <a href="index.html" class="">
                        <div id="logo-img"></div>
                    </a>
                    <div id="search">
                        <form>
                            <input type="text" placeholder="   Search for Medicines/Healthcare Products" size="70">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div><br>
                    <!--<button id="navbarToggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>          
                    </button>-->
                </div>
                <!--navbar-header-->
                <div id="collapsable-nav" class="navbar-collapse">
                    <div id="nav-list">
                        <div id="nav1">Order Medicine</div>
                        <div id="nav2">Healthcare Products</div>
                    </div>
                    <div id="navl">
                        <div id="nav-4"><i class="fa fa-sign-in" aria-hidden="true"></i> Login/Signup</div>
                        <div id="nav-3"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</div>
                    </div>
                    <!--navl-->
                </div>
                <!--collapseable-navbar-->
            </div>
            <!--container-->
        </nav>
        <!--nav-->
    </header>
    <?php
        session_start();
        $itemID=$_GET['itemID'];
        
        if( $_SERVER["REQUEST_METHOD"]=="GET")
        {   
                require "./dbcon.php";
                global $itemID;
                $itemID=$_GET['itemID'];
                //$userID=$_SESSION['userID'];
                // for getting the stock
                $sql = "SELECT * from items where itemID=".$_GET['itemID'];
                $result = mysqli_query($conn, $sql);
                $row=mysqli_fetch_assoc($result);
                global $stock;
                $stock=$row['stock'];
            }
            if( $_SERVER["REQUEST_METHOD"]=="POST")
            {   
                require "./dbcon.php";

                // if($_SESSION['loggedIn']==false)
                // {
                //     // echo $_SESSION;
                //     echo "<script>alert('Please login first');</script>";
                // }
                $hi=$_POST['addToCart'];
                echo "<script>console.log('HI'+$hi);</script>";
                
                $sql = "SELECT * from items where itemID=".$_GET['itemID'];
                $result = mysqli_query($conn, $sql);
                $row=mysqli_fetch_assoc($result);
                $stock=$row['stock'];
                if($stock>0)
                {
                    $userID=$_SESSION['userID'];
                    echo var_dump($_POST['addToCart']);
                    $sql="INSERT INTO `usercart`(`userID`, `itemID`) VALUES ('$userID',$itemID)";
                    
                    
                    $result = mysqli_query($conn, $sql);
                    
                    echo mysqli_error($conn);
                    // updating the stock of the item
                    $stock-=1;
                    $sql = "UPDATE items set stock=$stock where itemID=$itemID";
                    
                    $result = mysqli_query($conn, $sql);
                    
                    echo mysqli_error($conn);
                header('location: catergory_productList.php');

                    
                }
                else
                {
                    echo "<script>alert('ITEM IS UNAVAILABLE CURRENTLY');</script>";
                    echo "<script>alert($stock);</script>";
                    echo "<script>alert($itemID);</script>";
                    

                }
            }
        
        // }     
    ?>
    <form action="product_detail.php" method="GET">
    </form>
    <?php
        $id = $_GET['itemID'];
        $sql = "SELECT * from items where itemID=".$_GET['itemID'];
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        echo '<div class="rowp">';
        echo '<div class="columnp" ">';
        echo '<img height="250" src="data:image/jpeg;base64,'.base64_encode( $row['itemImage'] ).'" alt="">';
        //echo "<br>";   
        echo'</div>';
        echo'<div class="columnp">';
        echo nl2br($row['itemName']);
        echo "<br>";
        // echo ($row['stock']);
        echo "<br>";
        echo "₹".($row['price']);
        echo "<br>";       
       echo '<form action="addToCart.php" method="POST">';
       
       echo '<input type="hidden" value="'.$id.'" name="itemID">';
       //echo '<input type="hidden" value="'.$userID.'" name="userID">';

       echo "<input class='cartb' type='submit' value='Add To Cart'/>";
       
       echo '</form>';
       echo '</div>';
       echo '</div>';
       echo '<hr>';
       echo '<div class="description">';
       echo nl2br($row['description']);
       echo '<hr> </div> ';
       echo '<div class=features>';
       echo nl2br($row['features']);
       echo'</div>';
       ?>

    <hr style="background-color: #d9e7ef;">
    <div class="rowus">
        <div class="columnus">
            <i class="fa fa-certificate" aria-hidden="true"></i><br>
            <h3> 2 Lakh+ Products</h3><br>
            We maintain strict quality <br> controls on all our partner<br> retailers,
            so that you always <br>get standard quality <br>products
        </div>

        <div class="columnus">
            <i class="fa fa-shield" aria-hidden="true"></i><br>
            <h3>Secure Payment</h3><br>
            100% secure and trusted<br>
            payment protection
        </div>

        <div class="columnus">
            <i class="fa fa-calendar-o" aria-hidden="true"></i><br>
            <h3>Easy Return</h3><br>
            We have a new and dynamic<br>
            return window policy for<br>
            medicines and healthcare<br>
            items. Refer FAQs section for<br>
            more details.
        </div>
    </div>
    <footer class="panel-footer">
        <div class="container">
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
                </section>
            </div>
            <div class="reserved"> Copyright &copy; 2020 Medizap. All Rights Reserved</div>
        </div>
    </footer>
</body>

</html>
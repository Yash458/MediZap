<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medizap</title>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="./css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
</head>

<body>
    <header>
        <nav id="header-nav" class="navbar">

            <div class="navbar-header">
                <a href="index.php" class="">
                    <div id="logo-img"></div>
                </a>
                <div id="search">
                    <form autocomplete="off" id="form">
                        <input type="text" id="search_box" placeholder="Search for Medicines/Healthcare Products"
                            size="70">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        <div class="search_list" id="output"></div>
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
            <div id="navl">
                <?php 
    session_start();
    ?>
                <form action="cart.php" method="get">

                    <div id="nav-3"><i class="fa fa-cart-plus" aria-hidden="true"></i> <input type="submit"
                            name="userID" value="Cart" id="" style="background:none; border:none; color: white; font-size: 19px;
  font-weight: 100;
  cursor: pointer;
"></div>
                </form>
                <form action="orders.php" method="get">
                    <input type="submit" value="Orders">
                </form>

                <?php 
                  
       if(key_exists('loggedIn', $_SESSION))
     { if($_SESSION['loggedIn']==true)
         echo '<div href="about.html" id="nav-4">USER:'.$_SESSION['userName'].'</div>';
     }
         else{
              
            //  "<a href='./login.php'><button>SignUp</button></a>";
            echo '<div href="about.html" id="nav-4"><i class="fa fa-sign-in" aria-hidden="true"></i><a href="./login.php"> Login/Signup</a></div>';
        }
     ?>
            </div>
            <!--navl-->
            <div id="nav-list">
                <div id="nav1">Order Medicine</div>
                <div id="nav2">Healthcare Products</div>
            </div>
        </nav>
        <!--nav-->
    </header>
    <br><br><br>
    <div class="jumbotron">
        <div class="slideshow-container"><br><br><br><br><br>

            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="images/med-ad1.png" style="width:100%;height:auto;">
                <div class="text"></div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="images/med-ad2.png" style="width:100%;height:auto;">
                <div class="text"></div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="images/med-ad3.png" style="max-width:100%;height:auto;">
                <div class="text"></div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <!--End slideshow container-->
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <script type="text/javascript" src="js/script.js"></script>
        <!--End slideshow-->

        <div class="row1">
            <div id="main-content" class="container">
                <div id="order" class="row">
                    <div class="">
                        <div class="column1" style="background-color: white">
                            <div id="order-med"><button>Order Now</button><span>Order Medicines</span></div>
                        </div>
                        <div class="column1" style="background-color: white">
                            <div id="order-hp"><button>Order Now</button></div>
                        </div>
                        <div class="column1" style="background-color: white">
                            <div id="order-hw"><button>Order Now</button><span>Health & Wellness</span></div>
                        </div>

                    </div>


                </div>
                <!--<div id="ad">
			<div id="ad1">Medizap </div>
			<div id="ad2">Save up to 10% Extra & enjoy FREE delivery on your first order</div>
		</div>-->
            </div><!-- End Main content-->
        </div>

        <div class="row">
            <div class="column" style="background-color: white;">
                <div id="fb">
                    <h2 id="fbh">Featured Brands</h2>
                    <div id="fb1"><img src="images/covid-kit.png" alt="covid-kit" style="max-width:100%;height:auto;">
                    </div>
                    <div id="fb1"><img src="images/ensure.png" alt="Ensure" style="max-width:100%;height:auto;"></div>
                    <div id="fb1"><img src="images/revital.png" alt="Revital" style="max-width:100%;height:auto;"></div>
                    <div id="fb1"><img src="images/dettol.png" alt="Dettol" style="max-width:100%;height:auto;"></div>
                    <div id="fb1"><img src="images/depura.png" alt="Depura" style="max-width:100%;height:auto;"></div>
                    <div id="fb1"><img src="images/hansaplast.png" alt="Hansaplast" style="max-width:100%;height:auto;">
                    </div>
                    <div id="fb1"><img src="images/sebamed.png" alt="Sebamed" style="max-width:100%;height:auto;"></div>
                </div>
            </div>

            <div class="column" style="background-color: white">
                <div id="tc">
                    <h2 id="tch">Top Categories</h2>
                    <form action="category_productList.php" method="GET">
                        <?php
  require "./dbcon.php";
  $sql = "SELECT * from CATEGORIES ";
  $result = mysqli_query($conn, $sql);
  while ($var=mysqli_fetch_assoc($result)) {
    // echo var_dump($var);
    $id=$var["catID"];
    // height="20"
    echo '<button value="'.$id.'" name="categoryID">  <div id="tc1"><img id="tc1" style="max-width:100px;height:auto;"  src="data:image/jpeg;base64,'.base64_encode( $var['catImage'] ).'" alt=""></div></button> ';
    // echo "<figcaption>".$var["catName"]."</figcaption>";
}
  ?>
                    </form>



                </div>
            </div>
        </div>

        <!--<div id="about"> <h2 style="font-size:1vw;">Stay Healthy with Medizap: Your Favourite Online Pharmacy and Healthcare Platform </h2>
		<p style="font-size:0.5vw;">Medizap is India's leading digital healthcare platform.  The online pharmacy: we have it all covered for you. Having delivered over 2.9 orders in 5000+ cities till date, we are on a mission to bring "care" to "health" to give you a flawless healthcare experience.</p>
		<h3 style="font-size:1vw;">We Bring Care to Health.</h3>
		<p style="font-size:0.5vw;">Medizap is India's leading online chemist with over 2 lakh medicines available at the best prices. We are your one-stop destination for other healthcare products as well, such as over the counter pharmaceuticals, healthcare devices and homeopathy and ayurveda medicines.</p>

		<p style="font-size:0.5vw;">With Medizap, you can buy medicines online and get them delivered at your doorstep anywhere in India! But, is ordering medicines online a difficult process? Not at all! Simply search for the products you want to buy, add to cart and checkout. Now all you need to do is sit back as we get your order delivered to you.</p>
		<p style="font-size:0.5vw;">Now, isn't that easy? Why go all the way to the medicine store and wait in line, when you have Medizap Pharmacy at your service.</p>
		<h3 style="font-size:1vw;">The feathers in Our Cap</h3>
		<P style="font-size:0.5vw;">At Medizap, our goal is to make healthcare understandable, accessible and affordable in India. We set out on our journey in 2018. Along the way, we have been conferred with prestigious titles like Best Online Pharmacy in India Award and Top 50 venture in The Smart CEO-Startup50 India. We have been selected as the only company from across the globe for SD#3 "Health & Well Being for all" by Unreasonable group, US State Department. In 2019 alone we received three awards including the BMW Simply Unstoppable Award.</P>
		<h3 style="font-size:1vw;">The Service We Offer</h3>
		<P style="font-size:0.5vw;">Medizap is India's leading digital healthcare platform, where you can buy medicines online with discount. Buy medicine online in Delhi, Mumbai, Bangalore, Hyderabad, Pune, Gurgaon, Noida, Kolkata, Chennai, Ahmedabad, Lucknow and around a 1000 more cities. Besides delivering your online medicine order at your doorstep, we provide accurate, authoritative & trustworthy information on medicines and help people use their medicines effectively and safely.</P>
		<p style="font-size:0.5vw;">Visit our online medical store now, and avail online medicine purchase at a discount.
		Stay Healthy!</p>
		</div><!-End about -->
        <div class="container-2">
            <p style="font-size: 35px ; text-align: center;padding-top: 30px; padding-bottom: 20px;  color: #00746a;">
                Stay Healthy with Medizap</p>
            <p style=" margin: 10px 60px;font-size: 20px;">Medizap is India's leading digital healthcare platform. The
                online pharmacy: we have it all covered for you. Having delivered over 2.9 orders in 5000+ cities till
                date, we are on a mission to bring "care" to "health" to give you a flawless healthcare experience.</p>
        </div>
        <div class="container-3">
            <p style="font-size: 35px ; text-align: center;padding-top: 30px; padding-bottom: 20px;  color: #00746a;">We
                Bring Care to Health</p>
            <p style=" margin: 10px 60px;font-size: 20px;">Medizap is India's leading online chemist with over 2 lakh
                medicines available at the best prices. We are your one-stop destination for other healthcare products
                as well, such as over the counter pharmaceuticals, healthcare devices and homeopathy and ayurveda
                medicines.</p>
        </div>
        <div class="container-4">
            <p style="font-size: 35px ; text-align: center;padding-top: 30px; padding-bottom: 20px;  color: #00746a;">
                The Feathers in Our Cap</p>
            <p style=" margin: 10px 60px;font-size: 20px;">At Medizap, our goal is to make healthcare understandable,
                accessible and affordable in India. We set out on our journey in 2018. Along the way, we have been
                conferred with prestigious titles like Best Online Pharmacy in India Award and Top 50 venture in The
                Smart CEO-Startup50 India. We have been selected as the only company from across the globe for SD#3
                "Health & Well Being for all" by Unreasonable group, US State Department. In 2019 alone we received
                three awards including the BMW Simply Unstoppable Award.</p>
        </div>
        <div class="container-5">
            <p style="font-size: 35px ; text-align: center;padding-top: 30px; padding-bottom: 20px;  color: #00746a;">
                The Service We Offer</p>
            <p style=" margin: 10px 60px;font-size: 20px;">Medizap is India's leading digital healthcare platform, where
                you can buy medicines online with discount. Buy medicine online in Delhi, Mumbai, Bangalore, Hyderabad,
                Pune, Gurgaon, Noida, Kolkata, Chennai, Ahmedabad, Lucknow and around a 1000 more cities. Besides
                delivering your online medicine order at your doorstep, we provide accurate, authoritative & trustworthy
                information on medicines and help people use their medicines effectively and safely.</p>
        </div>

        <br>
        <div class="row">
            <div class="column">
                <div class="card">
                    <p style="font-size:0.5vw;"><i><img src="images/families.svg"
                                style="max-width:100%;height:auto;"></i></p>
                    <h3>90 Lakh +</h3>
                    <p>Families Served</p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <p style="font-size:0.5vw;"><i><img src="images/delivered.svg"
                                style="max-width:100%;height:auto;"></i></p>
                    <h3>2.9 Crore +</h3>
                    <p>Orders Delivered</p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <p style="font-size:0.5vw;"><i><img src="images/pincodes.svg"
                                style="max-width:100%;height:auto;"></i></p>
                    <h3>920000+</h3>
                    <p>Pincodes Served</p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <p style="font-size:0.5vw;"><i><img src="images/medicines.svg"
                                style="max-width:100%;height:auto;"></i></p>
                    <h3>2 Lakh +</h3>
                    <p>Medicines</p>
                </div>
            </div>
            <!--End Row-->


        </div><!-- End jumbotron-->
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script>
    form = document.getElementById("form")
    search_input = document.getElementById("search_box")
    output = document.getElementById("output")
    form.addEventListener("submit", (e) => {
        e.preventDefault()
    })
    search_input.addEventListener("keyup", (e) => {
        q = e.target.value
        const xhr = new XMLHttpRequest()
        xhr.open('GET', 'search.php?q=' + q, true)
        xhr.onload = function() {
            if (xhr.status == 200) {
                output.style.display = "block"
                output.innerHTML = ``
                output.innerHTML = xhr.responseText
            }
        }
        if (q.length >= 1) {
            xhr.send()
        }
        if (q.length == 0) {
            output.innerHTML = ``
            output.style.display = "none"
        }
    })
    </script>
</body>

</html>
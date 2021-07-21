<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/s.css">
    <title>MediZap</title>
</head>
<style>
table,
th,
td {
    border: 0px solid black;
}
</style>

<body>
    <?php
        session_start();
        require "dbcon.php";
        if( $_SERVER["REQUEST_METHOD"]=="PUT")
        {
            // $itemID = $_POST['itemID'];
            // echo "<script>console.log($itemID);</script>";
            $itemID = ($_GET['itemID']);
            $incr = ($_GET['incr']);
            $itemQuantity = ($_GET['itemQuantity'])+$incr;
            $userID=$_SESSION['userID'];
            if($itemQuantity==0)
            {
            $sql = "DELETE from USERCART where itemID=$itemID and userID=$userID and ORDERED=0;";

            }
            else{
            $sql="UPDATE USERCART set itemQuantity=$itemQuantity where itemID=$itemID and userID=$userID and ORDERED=0";
            }
            $result = mysqli_query($conn, $sql);
            // echo mysqli_error($conn);

            $sql = "UPDATE items set stock=stock-$incr where itemID=$itemID";
            $result = mysqli_query($conn, $sql);
            // echo mysqli_error($conn);


            // echo var_dump($result);
        }
    ?>

    <?php
        require "dbcon.php";
        
        if( $_SERVER["REQUEST_METHOD"]=="GET") 
        { ?>

    <!--echo '<table border="1">
            <thead>
                <th>IMAGE</th>
                <th>NAME</th>
                <th>QUANTITY(COUNTER)</th>
                <th>PRICE(FOR 1)</th>
                <th>TOTAL PRICE</th>
        
            </thead>';-->

    <?php $userID = $_SESSION['userID'];
                    // CHange sql
                    $sql = "SELECT distinct(itemID), itemQuantity from USERCART where userID=$userID and ORDERED=0 and itemQuantity>0";
                    $finalAmount = 0;
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)==0){
                        echo "<strong>Your cart is empty</strong>";
                    }
                    else{
                        echo '
                        <div class="shopping-cart">
                            <!-- Title -->
                            <div class="title">
                                Cart
                            </div>
                            <table style="width:100%">
                                <tr>
                                    <th width="100">Image</th>
                                    <th>Product Name</th>
                                    <th style="text-align: left;">Quantity</th>
                                    <th>Price(FOR 1)</th>
                                    <th>Total Price</th>
                                </tr>';
                    while ($row=mysqli_fetch_assoc($result)) {
                        $itemID=$row['itemID'];
                        $sql = "SELECT * from items where itemID=$itemID";

                        $result2 = mysqli_query($conn, $sql);

                        $row2 =  mysqli_fetch_assoc($result2);
                        $itemName =$row2['itemName'];
                        $price =$row2['price'];
                        $itemQuantity =$row['itemQuantity'];
                        $totalPrice = $price * $itemQuantity;
                        $finalAmount += $totalPrice;
                        ?>

    <tr id="<?php echo $itemID ?>">
        <td>
            <?php echo '<img src="data:image;base64,'.base64_encode($row2['itemImage']).'" alt="" width="100" height="75" class="center" />' ?>
        </td>
        <td width="200" style="text-align: center;"><?php echo $itemName ?></td>
        <td id='<?php echo $itemID."Data" ?>'>
            <div class="quantity">
                <button class="plus-btn" type="button" name="button"
                    onclick='decrQuantity(<?php echo $itemID ?>,<?php echo $itemQuantity ?>,<?php echo $price ?>)'>
                    <img src="Images/minus.png" width="18" height="18" alt="" />
                </button>
                <span><?php echo $itemQuantity ?></span>
                <button class="minus-btn" type="button" name="button"
                    onclick='incrQuantity(<?php echo $itemID ?>,<?php echo $itemQuantity ?>, <?php echo $price ?>)'>
                    <img src="Images/p.png" width="18" height="18" alt="" />
                </button>
        <td style="text-align: center;"><?php echo $price ?></td>
        <td id='<?php echo $itemID."totalPrice" ?>' style="text-align: center;"><?php echo $totalPrice ?></td>
        </div>
        </td>
    </tr>
    <?php } ?>
    </table>

    <h3 style="text-align: center">TOTAL PRICE: <?php echo "$finalAmount"?> </h3>
    <!-- <form action="file:///C:/Users/patel/OneDrive/Desktop/checkout.html">
        <input type="submit" value="Proceed to checkout" class="btn">
    </form> -->



    <form method="post" action="paytm_gateway/pgRedirect.php">

        <?php 
            $sql = "SELECT MAX(orderID) from orders";
            $result = mysqli_query($conn, $sql);
            if($result==false)
            {
                $orderID = 11;
            }
            else{
                $row =  mysqli_fetch_assoc($result);
            }     
            $orderID = (rand(0,9999999));
            
            ?>

        <input id="ORDER_ID" type="hidden" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off"
            value="<?php echo  $orderID?>">
        <input id="CUST_ID" type="hidden" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off"
            value=<?php echo $userID;?> />
        <input title="TXN_AMOUNT" type="hidden" tabindex="10" name="TXN_AMOUNT" value="<?php echo "$finalAmount";?>">
        <input type="submit" value="Proceed to checkout" class="btn">

    </form>




    </div>
    <?php }
        }
    ?>
</body>

</html>
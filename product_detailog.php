<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediZap</title>
</head>

<body>
    <?php
        session_start();
        $itemID=$_GET['itemID'];
        
        if( $_SERVER["REQUEST_METHOD"]=="GET")
        {   
                require "./dbcon.php";
                global $itemID;
                $itemID=$_GET['itemID'];
                $userID=$_SESSION['userID'];
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
        echo ($row['itemName']);
        echo "<br>";
        // echo ($row['stock']);
        // echo "<br>";
        echo "PRICE:".($row['price']);
        echo "<br>";
       echo '<img height="100" src="data:image/jpeg;base64,'.base64_encode( $row['itemImage'] ).'" alt="">';
       echo "<br>";
       echo '<form action="addToCart.php" method="POST">';
       echo '<input type="hidden" value="'.$id.'" name="itemID">';
       echo '<input type="hidden" value="'.$userID.'" name="userID">';

       echo "<input type='submit' value='addToCart'/>";
       echo "</form>";
       
       ?>

</body>

</html>
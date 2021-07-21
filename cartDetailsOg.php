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
        require "dbcon.php";
        if( $_SERVER["REQUEST_METHOD"]=="PUT")
{
        // $itemID = $_POST['itemID'];
        // echo "<script>console.log($itemID);</script>";
        $itemID = ($_GET['itemID']);
        $incr = ($_GET['incr']);
        $itemQuantity = ($_GET['itemQuantity'])+$incr;


        $userID=$_SESSION['userID'];
        $sql="UPDATE USERCART set itemQuantity=$itemQuantity where itemID=$itemID and userID=$userID and ORDERED=0";

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
        echo '<table border="1">
            <thead>
                <th>IMAGE</th>
                <th>NAME</th>
                <th>QUANTITY(COUNTER)</th>
                <th>PRICE(FOR 1)</th>
                <th>TOTAL PRICE</th>
        
            </thead>';
    {    $userID = $_SESSION['userID'];
           // CHange sql
           $sql = "SELECT distinct(itemID), itemQuantity from USERCART where userID=$userID and ORDERED=0 and itemQuantity>0";

           $result = mysqli_query($conn, $sql);

            while ($row=mysqli_fetch_assoc($result)) {
                $itemID=$row['itemID'];
                $sql = "SELECT * from items where itemID=$itemID";

                $result2 = mysqli_query($conn, $sql);

                $row2 =  mysqli_fetch_assoc($result2);
                $itemName =$row2['itemName'];
                $price =$row2['price'];
                $itemQuantity =$row['itemQuantity'];
                $totalPrice = $price * $itemQuantity;


               
                echo '<tr id="'.$itemID.'"><td><img height="100" src="data:image/jpeg;base64,'.base64_encode( $row2['itemImage'] ).'" alt=""></td>';
                echo "<td>$itemName</td>";
                echo "<td id='".$itemID."Data'><button onclick='decrQuantity($itemID,$itemQuantity, $price)'>-</button>$itemQuantity <button onclick='incrQuantity($itemID,$itemQuantity,$price)'>+</button></td>";
                echo "<td>$price</td>";
                echo "<td id='".$itemID."totalPrice'>$totalPrice<td></tr>";

            }
    }
    ?>
    </table>
</body>

</html>
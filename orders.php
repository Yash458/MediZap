<?php


session_start();
require "dbcon.php";
if( $_SERVER["REQUEST_METHOD"]=="GET")
{                    
    $userID = $_SESSION['userID'];
    $sql = "SELECT * from orders where userID=$userID";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result )==0)
    {
        echo "ORDER KARO JALDI";
    }
    else{
        
        while ($row=mysqli_fetch_assoc($result)) {
            $orderID=$row['orderID'];
            $orderAmount=$row['orderAmount'];
            $sql = "SELECT * from usercart where orderID=$orderID";
            $result1 = mysqli_query($conn, $sql);
            
            echo "ITEMNS OF THIS ORDER with orderID = ".$orderID."finalAmount=".$orderAmount;
            echo "<table>";
            while ($row1=mysqli_fetch_assoc($result1)) {
                $itemID = $row1['itemID'];
                $sql = "SELECT * from items where itemID=$itemID";
                
                $result2 = mysqli_query($conn, $sql);

                $row2 =  mysqli_fetch_assoc($result2);
                $itemName =$row2['itemName'];
                $price =$row2['price'];
                $itemQuantity =$row1['itemQuantity'];
                $totalPrice = $price * $itemQuantity;
          ?> <td>
    <?php echo '<img src="data:image;base64,'.base64_encode($row2['itemImage']).'" alt="" width="100" height="75" class="center" />' ?>
</td>
<td width="200" style="text-align: center;"><?php echo $itemName ?></td>
<td id='<?php echo $itemID."Data" ?>'>
    <div class="quantity">
        <?php echo $itemQuantity; ?>
    </div>
</td>
<td><?php $price?></td>
<td id='<?php echo $itemID."totalPrice" ?>' style="text-align: center;"><?php echo $totalPrice ?></td>


<?php
        }
        echo "</table>";
        }
        }
        }


        ?>
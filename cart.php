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
        if( $_SERVER["REQUEST_METHOD"]=="GET")
        {
            
        }
            
        ?>
    <div id="cart">
    </div>
    <script>
    function displayContent() {
        // window.alert(); 
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cart").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "cartDetails.php", true);
        xhttp.send();
    }
    displayContent();

    function delRow(itemID) {


    }

    function modifyRow(itemID, itemQuantity, price) {
        //INCR COUNT //Also check if stock is there
        // TODO CHECK ANBOUT STOCK TOO!
        // console.log(document.getElementById(itemID + "Data").innerHTML);'
        document.getElementById(itemID + "Data").innerHTML =
            "   <div class='quantity'><button class='plus-btn' type='button' onclick='decrQuantity(" + itemID +
            "," + itemQuantity + "," + price +
            ")'><img src='Images/minus.png' width='18' height='18' alt='' /></button>" +
            itemQuantity + " <button class='minus-btn' type='button' name='button' onclick='incrQuantity(" + itemID +
            "," + itemQuantity + "," + price +
            ")'><img src='Images/p.png' width='18' height='18' alt='' /></button>";
        let totalPrice = itemQuantity * price;
        console.log(totalPrice, itemQuantity, price);
        document.getElementById(itemID + "totalPrice").innerHTML = totalPrice;
        if (itemQuantity <= 0)
            location.reload();
    }

    function decrQuantity(itemID, itemQuantity, price) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // document.getElementById(itemID + "Data").innerHTML = itemQuantity +
                //     " <button onclick='incrQuantity(" + itemID +
                //     "," + itemQuantity +
                //     ")'>+</button>";
                modifyRow(itemID, itemQuantity - 1, price);
                // 

            }
        };
        xhttp.open("PUT", "cartDetails.php?itemID=" + itemID + "&itemQuantity=" + itemQuantity + "&incr=" + -1, true);
        xhttp.send();
    }

    function incrQuantity(itemID, itemQuantity, price) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // document.getElementById(itemID + "Data").innerHTML = itemQuantity +
                //     " <button onclick='incrQuantity(" + itemID +
                //     "," + itemQuantity +
                //     ")'>+</button>";
                modifyRow(itemID, itemQuantity + 1, price);
                // 

            }
        };
        xhttp.open("PUT", "cartDetails.php?itemID=" + itemID + "&itemQuantity=" + itemQuantity + "&incr=" + 1, true);
        xhttp.send();

        // $.ajax({
        //     url: 'cartDetails.php', //This is the current doc
        //     type: "POST",
        //     dataType: 'json', // add json datatype to get json
        //     data: ({
        //         itemID: 145
        //     }),
        //     success: function(data) {
        //         console.log(data);
        //     }
        // });
        // displayContent();
        // console.log(document.getElementById(itemID + "Data").innerHTML);

        // console.log(document.getElementById(123455).innerHTML);
        // modifyRow(itemID, itemQuantity + 1);

    }
    </script>
</body>

</html>
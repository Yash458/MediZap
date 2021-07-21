<link rel="stylesheet" href="./search.css">
<?php 
session_start();
?>
<?php
include_once "dbcon.php";
if (isset($_GET['q'])) {
    $q = $_GET['q'];
    $q = htmlentities($q);
    $q = mysqli_real_escape_string($conn, $q);
?>
<form method="GET" action="product_detail.php">
    <?php
    $sql = "Select * from items where itemName = '$q' or itemName like '%$q' or itemName like '$q%' or itemName like '%$q%'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) { 
?>
    <div class="container">
        <?php while($x = mysqli_fetch_assoc($res)) 
            { 
                $itemID = $x['itemID']
            ?>
        <a href="product_detail.php?itemID='<?php echo $itemID ?>'">
            <p><?php echo $x['itemName']?></p>
        </a>

        <?php
        }
        ?>
    </div>
</form>
<?php
   
}
else { ?>
<div class="container">
    <?php echo "<p>Product Unavailable</p>"; ?>
</div>
<?php
    }
}
?>
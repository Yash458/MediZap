<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medizap</title>
</head>

<body>
    <?php
require "./dbcon.php";
$sql = "SELECT catName from categories where catID=".$_GET['categoryID'];
$result = mysqli_query($conn, $sql);
while ($var=mysqli_fetch_assoc($result)) {
    echo "Category Name:".($var['catName']);
}
// echo "<br>";
?>
    <nav></nav>
    <div class="productList">
        <table>
            <thead>
                <td></td>
                <td></td>

            </thead>
            <form action="product_detail.php" method="GET">

                <?php
$sql = "SELECT * from ITEMS where categoryID=".$_GET['categoryID'];
// echo $sql;
$result = mysqli_query($conn, $sql);
// echo var_dump($result);
// echo "FETCH".mysqli_fetch_assoc($result);

echo "PRODUCTS:";
while ($var=mysqli_fetch_assoc($result)) {
$id=$var['itemID'];
// echo "<br>";
echo '<tr><td><button value="'.$id.'" name="itemID"><img height="20" src="data:image/jpeg;base64,'.base64_encode( $var['itemImage'] ).'" alt=""></button>'. "<figcaption>".($var['itemName'])." <br>Rs:".($var['price'])."</figcaption> </td>";
if($var=mysqli_fetch_assoc($result)){
$id=$var['itemID'];

echo '<td><button value="'.$id.'" name="itemID"><img height="20" src="data:image/jpeg;base64,'.base64_encode( $var['itemImage'] ).'" alt=""></button>'. "<figcaption>".($var['itemName'])." <br>Rs:".($var['price'])."</figcaption></td></tr>";
}

}
    ?>
            </form>
        </table>
    </div>
</body>

</html>
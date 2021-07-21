<?php
if( $_SERVER["REQUEST_METHOD"]=="POST")
{
        session_start();
        require "./dbcon.php";

// if($_SESSION['loggedIn']==false)
// {
// // echo $_SESSION;
// echo "<script>
// alert('Please login first');
// </script>";
// }
$userID=$_POST['userID'];
// echo $hi    ;
$itemID=$_POST['itemID'];

// echo "<script>
// console.log('HI' + $hi);
// </script>";

$sql = "SELECT * from items where itemID=".$itemID;
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$stock=$row['stock'];
if($stock>0)
{
$userID=$_SESSION['userID'];
$sql="INSERT INTO `usercart`(`userID`, `itemID`) VALUES ('$userID',$itemID)";


$result = mysqli_query($conn, $sql);

echo mysqli_error($conn);
// updating the stock of the item
$stock-=1;
$sql = "UPDATE items set stock=$stock where itemID=$itemID";

$result = mysqli_query($conn, $sql);

echo mysqli_error($conn);

echo "<script>
alert('ITEM ADDED TO YOUR CART');
</script>";
header('location: index.php');

}
else
{
echo "<script>
alert('ITEM IS UNAVAILABLE CURRENTLY');
</script>";
header('location: index.php');




}
}
?>
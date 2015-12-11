<?php

session_start();

include '../inc/connect.php';

$email = $_SESSION['Email'];
$productID = $_GET['pid'];
$quantity = $_GET['qua'];


/*Check if product exist in basket*/
$query  = "SELECT * FROM baskettable WHERE producttable_ID = '$productID' AND usertable_Email = '$email' ";
$result = mysqli_query( $conn, $query );

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$basketID = $row["ID"];


/*If user inserts a url var that doesnt exist*/
if (!$row) {
  header( "Location: ../basket.php" );
} else {
  $query = "UPDATE baskettable SET Quantity = '$quantity' WHERE ID = '$basketID'";
  $result = mysqli_query( $conn, $query );
  header( "Refresh: ../basket.php" );
}

echo $quantity;

 ?>

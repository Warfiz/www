<?php

  session_start();
  include '../inc/connect.php';

  //Session and get varibles
  $email = 	$_SESSION['Email'];
  $orderID = $_GET['oid'];

  //Get order rows for specified order
  $query = "SELECT * FROM produktorders WHERE OrderID = '$orderID' AND usertable_Email = '$email'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  //Check if order is already sent and exists
  if ($row && !$row['Sent']) {
    //Remove order
    $query = "DELETE FROM produktorders WHERE OrderID = '$orderID' AND usertable_Email = '$email'";
    $result = mysqli_query($conn, $query);
  } else {
    header('Location: ../userOrders.php');
  }

  header('Location: ../userOrders.php');


?>

<?php

  include 'connect.php';

  $email = 	$_SESSION['Email'];

  /*get products form basket*/
  $query  = "SELECT quantity FROM baskettable WHERE usertable_Email = '$email' ";
  $result = mysqli_query( $conn, $query );

  $productCounter = 0;

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $productCounter += $row['quantity'];
  }

?>

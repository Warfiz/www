<?php

  session_start();

  include '../inc/connect.php';

  $email = $_SESSION['Email'];
  $productID = $_GET['pid'];

  echo $email;
  echo $productID;

  /*Check if product exist in basket*/
  $query  = "SELECT * FROM baskettable WHERE producttable_ID = '$productID' AND usertable_Email = '$email' ";
  $result = mysqli_query( $conn, $query );

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $basketID = $row["ID"];
  echo $basketID;

  /*If user inserts a url var that doesnt exist*/
  if (!$row) {
    header( "Location: ../basket.php" );
  } else {
    $query = "DELETE FROM baskettable WHERE ID = '$basketID'";
    $result = mysqli_query( $conn, $query );
    header( "Location: ../basket.php" );
  }






?>

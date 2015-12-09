<?php

  session_start();

  include '../inc/connect.php';

  $email     = $_SESSION["Email"];
  $quantity  = $_POST["quantity"];
  $productID = $_GET["pid"];



  /*Checks inputfield*/
  if($quantity == null){
    $quantity = 1;
  }
  elseif ($quantity == 0) {
    header( "Location: ../products.php" );
  }

  echo 'Quantity: '.$quantity.'<br>';
  echo 'ID: '.$productID.'<br>';
  echo 'Email: '.$email.'<br>';


  /*Check if product exists in basket table*/
  $query  = "SELECT ID FROM baskettable WHERE producttable_ID = '$productID' AND usertable_Email = '$email'";
  $result = mysqli_query( $conn, $query );
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $basketID = $row['ID'];

  /*If product exists add to quantity, else add product to basket*/
  if ($row) {
      $query = "UPDATE baskettable SET quantity=quantity + '$quantity' WHERE ID = '$basketID'";
      $result = mysqli_query( $conn, $query );
  } else {
    /*Insert product into basket table*/
    $query =
    "
    INSERT INTO baskettable (producttable_ID, quantity, usertable_Email)
    VALUES ('$productID', '$quantity', '$email');
    ";
    $result = mysqli_query( $conn, $query );
  }

  /*Error handling*/
	if( !$result ) {
		die( mysqli_error( $conn ) . 'Could not enter data: ' );
	}

  header( "Location: ../products.php" );


?>

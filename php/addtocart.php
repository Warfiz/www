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

  $query =
  "
  INSERT INTO baskettable (producttable_ID, quantity, usertable_Email)
  VALUES ('$productID', '$quantity', '$email');
  ";

  $retval = mysqli_query( $conn, $query );

	if( !$retval ) {
		die( mysqli_error( $conn ) . 'Could not enter data: ' );
	}

  header( "Location: ../products.php" );


?>

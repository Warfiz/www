<?php

  include '/inc/connect.php';

  $productID = $_GET['pid'];

  $query  = "SELECT * FROM producttable WHERE ID = '$productID' ";
  $result = mysqli_query( $conn, $query );

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  /*If user inserts a url var that doesnt exist*/
  if (!$row) {
    header( "Location: ../filenotfound.php" );
  }

  /*Look if there is a discount on the price*/
  $price 			    = $row["Price"];
  $discount       = $row["Discount"];

  if ($discount == 0) {
    $finalPrice = (float)$price;
  } else {
    $finalPrice = (1-$discount)*$price;
  }



  $meatName	 	    = $row["Meatname"];
  $description 		= $row["Description"];
  $imgPath		  	= $row["Imgpath"];
  $quantity		   	= $row["Quantity"];

  mysqli_close( $conn );

?>

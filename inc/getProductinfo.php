<?php

  include '/inc/connect.php';

  $productID = $_GET['pid'];

  $query  = "SELECT * FROM producttable WHERE ID = '$productID' ";
  $result = mysqli_query( $conn, $query );

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if (!$row) {
    header( "Location: ../filenotfound.php" );
  }

  $meatName	 	    = $row["Meatname"];
  $price 			    = $row["Price"];
  $description 		= $row["Description"];
  $imgPath		  	= $row["Imgpath"];
  $quantity		   	= $row["Quantity"];

  mysqli_close( $conn );

?>

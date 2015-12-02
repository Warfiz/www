<?php

	include '../inc/connect.php';

  $meatName			= $_POST["Meatname"];
	$price	    	= $_POST["Price"];
  $description	= $_POST["Description"];
/*  $imgPath			= $_POST["Imgpath"];*/
  $quantity	 	  = $_POST["Quantity"];



  $query =
  "
  INSERT INTO producttable (Meatname, Price, Description, Imgpath, Quantity)
  VALUES ('$meatName', '$price', '$description', 'null', '$quantity');
  ";

  $retval = mysqli_query( $conn, $query );

	if( !$retval ) {
		die( mysqli_error( $conn ) . 'Could not enter data: ' );
	}

  header( "refresh:1;url= ../addproducts.php" );
  mysqli_close( $conn );

?>

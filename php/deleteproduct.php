<?php

	include '../inc/connect.php';


  $productID         = $_POST["MeatID"];

  $query ="DELETE FROM producttable
  WHERE ID = '$productID'
  ";

  $retval = mysqli_query( $conn, $query );

	if( !$retval ) {
		die( mysqli_error( $conn ) . 'Could not enter data: ' );
	}

	header( "Location: ../deleteproduct.php" );

  mysqli_close( $conn );

?>

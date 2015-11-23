<?php

  session_start();

	$conn = mysqli_connect( 'localhost', 'web-client', 'web-client2k15', 'meatmarket' );

	if ( !$conn ) {
		die( 'Could not connect: ' . mysqli_connect_error() );
	}

	/*echo 'Connected successfully ';*/

	$var_Uname 			= $_SESSION['Uname'];

	$var_email 			= $_POST["Email"];

	$var_fname 			= $_POST["Fname"];
	$var_lname 			= $_POST["Lname"];
	$var_password	 	= $_POST["Password"];


	$query  = " UPDATE usertable SET Fname = '$var_fname' WHERE Uname = '$var_Uname' ";


	$result = mysqli_query( $conn, $query );

	if( !$result ) {
		die( mysqli_error( $conn ) . 'Could not enter data: ' );
	}

	echo "Account info updated!\n";

	header( "refresh:5;url= ../account.php" );

	mysqli_close( $conn );
?>

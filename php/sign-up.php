<?php

	include '../inc/connect.php';

	/*echo 'Connected successfully ';*/


	$var_user 			= $_POST["Uname"];
	$var_password	 	= $_POST["Password"];
	$var_fname 			= $_POST["Fname"];
	$var_lname 			= $_POST["Lname"];
	$var_email 			= $_POST["Email"];




	$query =
	'
	INSERT INTO usertable (Email, Uname, Fname, Lname, Password)
	VALUES ("'.$var_email.'", "'.$var_user.'", "'.$var_fname.'", "'.$var_lname.'", "'.$var_password.'");
	';

	$retval = mysqli_query( $conn, $query );

	if( !$retval ) {
		die( mysqli_error( $conn ) . 'Could not enter data: ' );
	}

	echo "Signup successful. Looks like meat is back on the menu, boys!\n";

	header( "refresh:5;url= ../index.php" );

	mysqli_close( $conn );
?>

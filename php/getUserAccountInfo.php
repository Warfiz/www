
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>


<?php
	
	$conn = mysqli_connect( 'localhost', 'web-client', 'web-client2k15', 'meatmarket' );  

	if ( !$conn ) {
		die( 'Could not connect: ' . mysqli_connect_error() );
	}

	//echo 'Connected successfully ';



	//session_start();   //starting the session for user profile page


	$var_Uname 			= $_SESSION['Uname'];

	$query  = "SELECT *  FROM usertable WHERE Uname = '$var_Uname' ";


	$retval = mysqli_query( $conn, $query );

	$row 	= mysqli_fetch_array($retval, MYSQLI_ASSOC);	


	
	$var_Password	 	= $row["Password"];
	$var_Fname 			= $row["Fname"];
	$var_Lname 			= $row["Lname"];
	$var_Email 			= $row["Email"];

	






mysqli_close( $conn ); 
?>


</body>
</head>



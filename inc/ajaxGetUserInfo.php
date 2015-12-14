<?php

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}


	include 'connect.php';


	$var_Uname 			= $_SESSION['Uname'];

	$query  = "SELECT * FROM usertable WHERE Uname = '$var_Uname' ";
	$retval = mysqli_query( $conn, $query );
	$row 	= mysqli_fetch_array($retval, MYSQLI_ASSOC);

	$var_Password	 		= $row["Password"];
	$var_Fname 				= $row["Fname"];
	$var_Lname 				= $row["Lname"];
	$var_Email 				= $row["Email"];
	$var_Address			= $row["Address"];
	$var_City					= $row["City"];
	$var_PhoneNumber	= $row["PhoneNumber"];


	$arr = array('fName'=>$var_Fname, 'lName'=>$var_Lname, 'email'=>$var_Email, 'address'=>$var_Address, 'city'=>$var_City, 'phoneNumber'=>$var_PhoneNumber);
	echo json_encode($arr);


?>

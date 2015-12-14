<?php

  session_start();

  function updateAccount($name, $value){
    include '../inc/connect.php';
    $var_Uname 			    = $_SESSION['Uname'];
    $query = " UPDATE usertable SET ".$name." = '$value' WHERE Uname = '$var_Uname' ";
    $result = mysqli_query( $conn, $query );
    if( !$result ) {
  		die( mysqli_error( $conn ) . 'Could not enter data: ' );
  	}
  }


	$var_email 			    = $_POST["Email"];

  $var_password	 	    = $_POST["Password"];
  $var_conPassword	 	= $_POST["conPassword"];

	$var_fname 			    = $_POST["Fname"];
	$var_lname 			    = $_POST["Lname"];

  $var_address        = $_POST["Address"];
  $var_city           = $_POST["City"];
  $var_phoneNumber    = $_POST["PhoneNumber"];

  foreach ($_POST as $name => $value) {
    if(!empty($value)){
     updateAccount($name, $value);
    }
  }







	echo "Account info updated!\n";

	header( "Location: /account.php" );

	mysqli_close( $conn );



?>


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

	/*echo 'Connected successfully ';*/

	
	$var_Uname			= $_POST["Uname"];
	$var_password	 	= $_POST["Password"];


/*session_start();   //starting the session for user profile page*/


if(!empty($_POST['Uname']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	
	$query = "SELECT *  FROM usertable WHERE Uname = '$var_Uname' AND Password = '$var_password'";


	$retval = mysqli_query( $conn, $query );
	
	$row = 		mysqli_fetch_array($retval, MYSQLI_ASSOC);	
	
	if(!empty($row['Uname']) AND !empty($row['Password']))
	{
		
		$_SESSION['Uname'] = $row['Uname'];
		$_SESSION['authenticated'] = 'yes';
	}
	else
	{
		echo "SORRY... YOU ARE A FAILURE OF A HUMAN BEIN...";
	}
}

	header( "Location: /products.php" );
	#header( "refresh:1;url=../products.php" );
	
	mysqli_close( $conn ); 
	
	

?>







</body>
</head>


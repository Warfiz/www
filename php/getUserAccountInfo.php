<?php

	include '../inc/connect.php';

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

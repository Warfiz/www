<?php

session_start();
include '../inc/connect.php';



$email = 	$_SESSION['Email'];
$productID = $_POST['pid'];
$com   = $_POST['com'];

//Check if costumer has comment/rated on this product before
$query = "SELECT Comment
FROM reviewtable
WHERE usertable_Email = '$email' AND producttable_ID = '$productID'";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$existingComment = $row['Comment'];

//If costumer already commented
$commentError = 0;

if(!$row){
  $query = "INSERT INTO
  reviewtable (Comment, usertable_Email, producttable_ID)
  VALUES ('$com', '$email', '$productID')";
  $result = mysqli_query($conn, $query);
}
elseif($existingComment == null) {
  $query = "UPDATE reviewtable
  SET Comment = '$com'
  WHERE usertable_Email = '$email' AND producttable_ID = '$productID'";
  $result = mysqli_query($conn, $query);
} else {
 $commentError = 1;
}

//select username
$query  = "SELECT Uname FROM usertable WHERE Email = '$email'";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user   = $row['Uname'];

$arr = array('comment'=>$com, 'user'=>$user,  'commentError'=>$commentError);
echo json_encode($arr);

?>

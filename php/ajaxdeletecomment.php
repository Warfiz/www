<?php
  session_start();

  include '../inc/connect.php';

  $email = $_SESSION['Email'];
  $productID = $_POST['pid'];
  $success = 0;


  //check if comment exist
  $query = "SELECT Comment
  FROM reviewtable
  WHERE usertable_Email = '$email' AND producttable_ID = '$productID'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if($row){
    $query = "UPDATE reviewtable
    SET Comment = null
    WHERE usertable_Email = '$email' AND producttable_ID = '$productID'";
    $result = mysqli_query($conn, $query);
    $success = 1;
  } else {
    $success = 0;
  }


  $arr = array('success'=>$success);
  echo json_encode($arr);


?>

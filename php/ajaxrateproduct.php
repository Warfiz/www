<?php


  session_start();
  include '../inc/connect.php';



  $email = 	$_SESSION['Email'];
  $productID = $_POST['pid'];

  //Check if costumer has comment/rated on this product before
  $query = "SELECT Rating
  FROM reviewtable
  WHERE usertable_Email = '$email' AND producttable_ID = '$productID'";

  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $rating = $row['Rating'];

  if(!$row){
    //Insert rating
    $query = "INSERT INTO
    reviewtable (Rating, usertable_Email, producttable_ID)
    VALUES ('1', '$email', '$productID')";
    $result = mysqli_query($conn, $query);
  }
  elseif ($rating == 0) {
    $query = "UPDATE reviewtable
    SET Rating = '1'
    WHERE usertable_Email = '$email' AND producttable_ID = '$productID'";
    $result = mysqli_query($conn, $query);
  } else {
    $query = "UPDATE reviewtable
    SET Rating = 'NULL'
    WHERE usertable_Email = '$email' AND producttable_ID = '$productID'";
    $result = mysqli_query($conn, $query);
  }

  //Count ratings and return JSON
  $query = "SELECT * FROM reviewtable WHERE Rating = '1' AND producttable_ID = '$productID'";
  $result = mysqli_query($conn, $query);
  $ratingCount = mysqli_num_rows($result);
  $arr = array('ratingCount'=>$ratingCount);
  echo json_encode($arr);





?>

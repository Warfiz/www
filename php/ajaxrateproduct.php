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
    VALUES ('0', '$email', '$productID')";
    $result = mysqli_query($conn, $query);
  }
  elseif ($rating == null) {
    $query = "UPDATE reviewtable
    SET Rating = '0'
    WHERE usertable_Email = '$email' AND producttable_ID = '$productID'";
    $result = mysqli_query($conn, $query);
  }
  elseif ($rating == 5) {
    $query = "UPDATE reviewtable
    SET Rating = NULL
    WHERE usertable_Email = '$email' AND producttable_ID = '$productID'";
    $result = mysqli_query($conn, $query);
  } else {
    $query = "UPDATE reviewtable
    SET Rating = Rating + 1
    WHERE usertable_Email = '$email' AND producttable_ID = '$productID'";
    $result = mysqli_query($conn, $query);
  }

  //get users rating
  $query = "SELECT Rating FROM reviewtable WHERE producttable_ID = '$productID' AND usertable_Email = '$email'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $ratingCount = $row['Rating'];


  //calculate meatscore
  $query = "SELECT Rating FROM reviewtable WHERE producttable_ID = '$productID' AND Rating IS NOT NULL";
  $result = mysqli_query($conn, $query);
  $numOfRows = mysqli_num_rows($result);

  if ($numOfRows != 0) {
    $totRating = 0;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      (float)$rating = $row['Rating'];
      $totRating = $totRating + $rating;
    }
    $meatScore = round($totRating/$numOfRows, 1);

    //update meatscore
    $query = "UPDATE producttable
    SET Meatscore = '$meatScore'
    WHERE ID = '$productID'";
    $result = mysqli_query($conn, $query);
  } else {
    $meatScore = 0;
    $query = "UPDATE producttable
    SET Meatscore = '$meatScore'
    WHERE ID = '$productID'";
    $result = mysqli_query($conn, $query);
  }




  $arr = array('ratingCount'=>$ratingCount, 'meatScore'=>$meatScore);
  echo json_encode($arr);





?>

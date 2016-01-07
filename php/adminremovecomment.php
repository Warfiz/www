<?php

  include '../inc/connect.php';
  session_start();

  $admin = 	$_SESSION['Admin'];

  if (!isset($admin)) {
    header("Location: ../filenotfound.php");
  } else {
    $commentID = $_GET['cid'];
    $productID = $_GET['pid'];

    $query = "UPDATE reviewtable
    SET Comment = null
    WHERE ID = '$commentID'";
    $result = mysqli_query($conn, $query);

    header('Location: /productinfo.php?pid='.$productID);
  }
?>

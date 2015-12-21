<?php

  include '../inc/connect.php';

  $commentID = $_GET['cid'];
  $productID = $_GET['pid'];

  $query = "UPDATE reviewtable
  SET Comment = null
  WHERE ID = '$commentID'";
  $result = mysqli_query($conn, $query);

  header('Location: /productinfo.php?pid='.$productID);

?>

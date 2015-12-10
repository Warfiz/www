<?php

  include '/inc/connect.php';

  /*$query  = "SELECT * FROM baskettable;";
  "SELECT * FROM baskettable;"
  "SELECT * FROM producttable;"*/

  $email = 	$_SESSION['Email'];


  $query= "SELECT *
  FROM baskettable
  INNER JOIN producttable
  ON baskettable.producttable_ID=producttable.ID
  WHERE baskettable.usertable_Email = '$email';";


  $result = mysqli_query( $conn, $query );

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $productID      = $row["ID"];
    $meatname	 	    = $row["Meatname"];
    $price 			    = $row["Price"];
    $description 		= $row["Description"];
    $imgPath		  	= $row["Imgpath"];
    $quantity		   	= $row["quantity"];

    echo '<li>

    <div class="item">
        <h4>'.$meatname.'</h4>
        <div class="quantity">
          <a href="#">+</a>
          <span>'.$quantity.'</span>
          <a href="#">-</a>
        </div>
        <div class="price">'.$price.'kr</div>
        <a href="/php/removeproduct.php?pid='.$productID.'">❌</a>
    </div>



    </li>';


  }

  mysqli_close( $conn );

?>

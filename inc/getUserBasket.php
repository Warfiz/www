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

  /*Keeps track of total price*/
  $totalPrice = 0;

  /*Check if basket is empty*/
  $basketIsEmpty = true;

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $productID         = $row["ID"];
    $meatname	 	       = $row["Meatname"];
    $price 			       = $row["Price"];
    $description 	  	 = $row["Description"];
    $imgPath		    	 = $row["Imgpath"];
    $quantity		     	 = $row["quantity"];

    $basketIsEmpty = false;

    $totalProductPrice = $price*$quantity;
    $totalPrice += $price*$quantity;

    echo '
    <div class="item">
        <img src="img/placeholder-image.png" alt="" />
        <div class="product-info">
          <h3>'.$meatname.'</h3>
          <div class="price">Price: '.$price.'kr</div>
          <div class="quantity">
            Quantity: <input type="text" name="name" value="'.$quantity.'">
          </div>
          <hr>
          <div class="total-product-price">Total: '.$totalProductPrice.'kr</div>
        </div>

        <a id="remove-item" href="/php/removeproduct.php?pid='.$productID.'">❌</a>
    </div>
      ';

  }

  mysqli_close( $conn );

?>

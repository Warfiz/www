<?php

  include '/inc/connect.php';

  $query  = "SELECT * FROM producttable;";
  $result = mysqli_query( $conn, $query );

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $productID      = $row["ID"];
    $meatname	 	    = $row["Meatname"];
    $price 			    = $row["Price"];
    $description 		= $row["Description"];
    $imgPath		  	= $row["Imgpath"];
    $quantity		   	= $row["Quantity"];

    echo '<li>
      <div class="product-card">
        <div class="product-img"></div>
        <div class="product-info">
          <h3>'.$meatname.'</h3>
          <p>'.$description.'</p>
          <a class="button-small" href="productinfo.php?pid='.$productID.'">More info</a>
          <span>In stock: '.$quantity.'</span>
          <form action="/php/addtocart.php?pid='.$productID.'" method="post">
            Quantity: <input type="number" name="quantity" value="">
            <button type="submit" id="buy">Add to cart</button>
          </form>

        </div>
      </div>
    </li>';
  }

  mysqli_close( $conn );

?>

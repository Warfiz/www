<?php

  include '/inc/connect.php';

  $query  = "SELECT * FROM producttable";
  $result = mysqli_query( $conn, $query );

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $productID      = $row["ID"];
    $meatname	 	    = $row["Meatname"];
    $price 			    = $row["Price"];
    $description 		= $row["Description"];
    $imgPath		  	= $row["Imgpath"];
    $quantity		   	= $row["Quantity"];

    echo '<li>
      <a href="productinfo.php?pid='.$productID.'">
        <div class="product-card">
          <div class="product-img"></div>
          <div class="product-info">
            <h3>'.$meatname.'</h3>
            <p>'.$description.'</p>
            <div class="button-small">More info</div>
            <span>In stock: '.$quantity.'</span>
            <button id="buy">Buy</button>
          </div>
        </div>
      </a>
    </li>';
  }

  mysqli_close( $conn );

?>

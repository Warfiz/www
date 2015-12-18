<!DOCTYPE html>

<?php
  session_start();
  if(!isset($_SESSION['authenticated'])) {
    header( "Location: index.php" );
  };
  include 'inc/basketCount.php';

  include '/inc/connect.php';

  $email = 	$_SESSION['Email'];
  $orderID = $_GET['od'];

  $query= "SELECT produktorders.Quantity , produktorders.OrderID, producttable.Meatname, producttable.Price
  FROM produktorders
  INNER JOIN producttable
  ON produktorders.producttable_ID=producttable.ID
  WHERE produktorders.usertable_Email = '$email' AND OrderID = '$orderID'";


  $result = mysqli_query( $conn, $query );



  /*Keeps track of total price*/
  $totalPrice = 0;




?>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MeatMarket</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" charset="utf-8">
    <link rel="stylesheet" href="css/orderdetails.css" charset="utf-8">

  </head>

  <body>

    <div class="sidebar">
      <div class="navigation-links">
        <ul>
          <li><a href="account.php">Account</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="basket.php">Basket</a><span class="in-basket"><?=$productCounter?></span></li>
          <li><a href="reviews.php">Reviews</a></li>
          <?php
          if(isset($_SESSION['Admin'])){
            echo '<li><a href="addproducts.php">Add Products</a></li>';
          }
          ?>
          <li><a href="php/logout.php">Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="wrapper">

     <a class="menu-button" onclick="expandMenu()"></a>

      <header>
        <div class="company-title">
          <a href="index.php">
            <h1>Meat<span>Market</span></h1>
            <h3>고기와 비스킷 초콜릿 의 흔적을 포함 할 수있다</h3>
          </a>
        </div>
      </header>

      <section class="order-details">
        <div class="receipt">
          <h1>Receipt</h1>
          <h3>Order - <?=$orderID?></h3>
          <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              $meatname	 	       = $row["Meatname"];
              $price 			       = $row["Price"];
              $quantity		     	 = $row["Quantity"];



              $totalProductPrice = $price*$quantity;
              $totalPrice += $price*$quantity;

              echo '
              <div class="item">
                <ul>
                  <li><b>'.$meatname.'</b></li>
                  <li>Price: '.$price.'Kr</li>
                  <li>Quantity: '.$quantity.'</li>
                  <li>Subtotal: '.$totalProductPrice.'kr</li>
                </ul>
              </div>
              ';

            }

          ?>
        <hr>
        <h2>Total: <?=$totalPrice?>kr</h2>

        </div>
      </section>

    </div>


    <script type="text/javascript" src="js/min_nav.js"></script>
  </body>
</html>

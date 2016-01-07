<!DOCTYPE html>

<?php
  session_start();
  if(!isset($_SESSION['authenticated'])) {
    header( "Location: index.php" );
  };
  include 'inc/basketCount.php';

  include '/inc/connect.php';

  $email = 	$_SESSION['Email'];

  $query = "SELECT  * FROM produktorders WHERE usertable_Email = '$email' group by orderID ";
  $result = mysqli_query( $conn, $query );


?>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MeatMarket</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" charset="utf-8">
    <link rel="stylesheet" href="css/basket.css" charset="utf-8">
    <link rel="stylesheet" href="css/userOrders.css" charset="utf-8">

  </head>

  <body>

    <div class="sidebar">
      <div class="navigation-links">
        <ul>
          <li><a href="account.php">Account</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="basket.php">Basket</a><span class="in-basket"><?=$productCounter?></span></li>

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

      <section class="orders">

      <?php

        $haveOrders = false;

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

          $haveOrders = true;
          $OrderID = $row['OrderID'];
          $sent    = $row['Sent'];

          $sent = ($sent == 0 ? "Pending" : "Sent");

          echo '
            <div class="item">
              <div class="info">
                <h3>Order: '.$OrderID.'</h3>
                Status: '.$sent.'
              </div>
              <div class="buttons">
                <a class="button-big" href="orderdetails.php?od='.$OrderID.'">Details</a>
                <a class="button-big cancel" href="php/cancelOrder.php?oid='.$OrderID.'">Cancel order</a>
              </div>
            </div>
          ';

        }

        if (!$haveOrders) {
          echo '<h1 style="text-align: center; color: #FFF; margin-bottom: 40px;">You have no orders</h1>';
        }
      ?>

      </section>

    </div>


    <script type="text/javascript" src="js/min_nav.js"></script>
  </body>
</html>

<!DOCTYPE html>

<?php
  session_start();
  if(!isset($_SESSION['authenticated'])) {
    header( "Location: http://localhost/index.php" );
  };

  include 'inc/basketCount.php';
?>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MeatMarket</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" charset="utf-8">
    <link rel="stylesheet" href="css/basket.css" charset="utf-8">

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

      <section class="basket">

        <?php
          include 'inc/getUserBasket.php';
        ?>

        <?php if(!$basketIsEmpty){
          echo '<div class="basket-summary">
                  <h4>Total Price: '.$totalPrice.'kr</h4>
                </div>';
        } ?>

        <?php if(!$basketIsEmpty){
          echo '<div class="checkout">
                  <button  id="show-checkout-button" class="button-big">Checkout</button>
                </div>';
        } ?>

        <?php if($basketIsEmpty){
          echo '<h1 style="text-align: center; color: #FFF; margin-bottom: 40px;">Cart is empty</h1>';
        } ?>

      </section>

      <section class="checkout-form">

        <h2>Checkout</h2>
          <form class="checkout-form" action="#" method="post">



            Use account information<input id="use-info" type="checkbox" name="use-info">


            <div class="stored-info">
              <label for="fName">Name</label>
              <input id="fName" type="text" name="name" value="" required>

              <label for="lName">Last name</label>
              <input id="lName" type="text" name="lastName" value="" required>


              <label for="address">Address</label>
              <input id="address" type="text" name="address" value="" required>

              <label for="city">City</label>
              <input id="city" type="text" name="city" value="" required>

              <label for="phoneNumber">Phone number</label>
              <input id="phoneNumber" type="text" name="phoneNumber" value="" required>
            </div>

            <h3>Billing information</h3>
            <label for="card-number">Card number</label>
            <input id="card-number" type="text" name="card-number" value="" required>

            <label for="cvc">CVC</label>
            <input id="cvc" type="text" name="cvc" value="" required>

            <label for="card-date">Card </label>
            <input id="card-date" type="text" name="card-date" value="" required>

            <a href="">Terms and service</a>

            <input id="accept-condition" type="checkbox" name="accept-condition" value=""> I agree

            <button id="confirm" type="submit" name="submit" disabled>Confirm</button>
            <button id="cancel" href="">Cancel</button>


          </form>
      </section>



    </div>


    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="js/min_nav.js"></script>
    <script src="js/updateQuantity.js" charset="utf-8"></script>
    <script src="js/show-checkout.js" charset="utf-8"></script>
  </body>

</html>

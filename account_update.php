<?php

  session_start();

  if(!isset($_SESSION['authenticated'])) {
    header( "Location: http://localhost/index.php" );
  };

  include 'inc/getUserAccountInfo.php';

?>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MeatMarket</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" charset="utf-8">

  </head>

  <body>



    <div class="sidebar">
      <div class="navigation-links">
        <ul>
          <li><a class="button-small"    href="account.php">Account</a></li>
          <li><a class="button-small"    href="products.php">Products</a></li>
          <li><a class="button-small"    href="basket.php">Basket</a></li>
          <li><a class="button-small"    href="reviews.php">Reviews</a></li>
          <li><a class="button-small" href="php/logout.php">Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="wrapper">

      <header>
        <div class="company-title">
          <a href="index.php">
            <h1>Meat<span>Market</span></h1>
            <h3>고기와 비스킷 초콜릿 의 흔적을 포함 할 수있다</h3>
          </a>
        </div>
      </header>



      <div class="row-3">

          <div class="col">


              <div class="product-info">

              <h3>Change Account Info For <?php echo " $var_Uname " ?></h3>
              <div class="navigation-links" >


              <ul>

              <form action="php/updateUserAccountInfo.php" method="post" onsubmit="return myFunction()">


              <li><input id="email"     type="text" name="Email" placeholder="meat@mail.com" > </li>
              <li><input id="firstName" type="text" name="Fname" placeholder="firstname" ></li>
              <li><input id="lastName"  type="text" name="Lname" placeholder="lastname" ></li>

              <li><input id="password"    type="Password" name="Password" placeholder="new meatpass" ></li>
              <li><input id="conPassword" type="Password" name="conPassword" placeholder="Confirm meatpass"></li>

              <li><button type="submit" name="submit">Save changes</button></li>
              </form>



                    </ul>
                  </div>

                </div>


          </div>








  </body>
</html>

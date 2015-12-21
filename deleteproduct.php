<!DOCTYPE html>

<?php
  session_start();
  /*If user in NOT logged in*/
  if(!isset($_SESSION['authenticated'] ))
  {
    header( "Location: index.php" );
  };
  /*If user is NOT an Admin*/
  if(!isset($_SESSION['Admin']))
  {
    header( "Location: products.php" );
  }

  include 'inc/basketCount.php';
?>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MeatMarket</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" charset="utf-8">
    <link rel="stylesheet" href="css/addproducts.css" charset="utf-8">


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


    <div class="add-products">
      <div class="card-form">
        <form action="php/deleteproduct.php" method="post">
          <input type="text"         name="MeatID"      placeholder="Meat ID" required>


          <button type="submit" name="Delete"> Delete </button>
        </form>
      </div>
    </div>

    </div>
  </body>
</html>

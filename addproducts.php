<!DOCTYPE html>

<?php
  session_start();
  if(!isset($_SESSION['authenticated'] ))
  {
    header( "Location: index.php" );
  };
  if(!isset($_SESSION['Admin']))
  {
    header( "Location: products.php" );
  }
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


    <div class="add-products">
      <div class="card-form">
        <form action="php/addproducts.php" method="post">
          <input type="text"         name="Meatname"    placeholder="Meatname" required>
          <input type="text"         name="Price"       placeholder="Price" required>
          <textarea name="Description" rows="5"></textarea>
          <input type="text"         name="Quantity"    placeholder="Quantity">
          <button type="clear" name="reset">Clear</button>
          <button type="submit" name="Addproduct">Add Product</button>
        </form>
      </div>
    </div>

    </div>
  </body>
</html>

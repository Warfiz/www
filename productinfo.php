<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['authenticated'])) {
    header( "Location: index.php" );
  };

  include 'inc/getProductInfo.php';
  include 'inc/basketCount.php';
  include 'inc/connect.php';

  $email = $_SESSION['Email'];

  //Get raitings
  $query = "SELECT Rating FROM reviewtable WHERE producttable_ID = '$productID' AND usertable_Email = '$email'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $ratingCount = $row['Rating'];

  //Get comments
  $query = "SELECT usertable.Uname, reviewtable.Comment
  FROM usertable
  INNER JOIN reviewtable
  ON usertable.Email=reviewtable.usertable_Email
  WHERE reviewtable.producttable_ID = '$productID'";
  $result = mysqli_query($conn, $query);

?>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MeatMarket</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" charset="utf-8">
    <link rel="stylesheet" href="css/productinfo.css" charset="utf-8">

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

      <div class="info-product">

        <img src="/img/placeholder-image.png" alt="">

        <div class="info">
          <h3><?=$meatName?></h3>
          <a id="rating" data-id=<?=$productID?> class="rating">+<?=$ratingCount?></a>
          <h2>Your Meatscore</h2>
          <p><?=$description?></p>
          <div class="price"><?=$finalPrice?>kr</div>
          <div class="quantity">Quantity: <?=$quantity?></div>
          <a href="#" class="button-big">Add to cart</a>
        </div>

      </div>

      <section class="reviews">
        <h2>Comments</h2>
        <div class="comments">
          <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $comment = $row['Comment'];
              $user    = $row['Uname'];
              if ($comment != NULL) {
                echo '
                  <div class="comment">
                    <h3>'.$user.'</h3>
                    <p>'.$comment.'</p>
                  </div>
                ';
              }
            }
          ?>
        </div>

        <div class="writereview">
          <h2>Leave a comment on product</h2>
          <textarea id="comment"></textarea>
          <button id="submitComment" data-id=<?=$productID?> >Submit review</button>
          <div id="error-message"></div>
          <button id="deleteComment" data-id=<?=$productID?> >Delete comment</button>
        </div>

      </section>

    </div>

    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="js/min_nav.js"></script>
    <script src="js/rating.js" charset="utf-8"></script>
    <script src="js/comment.js" charset="utf-8"></script>

  </body>
</html>

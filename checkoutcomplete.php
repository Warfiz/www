<!DOCTYPE html>


<!--

SKRIV UT KVITTO PÅ KÖPET

-->


<?php
  session_start();
  if(!isset($_SESSION['authenticated'])) {
    header( "Location: http://localhost/index.php" );
  };

  include 'inc/connect.php';


  $email = 	$_SESSION['Email'];
  $name = $_POST['name'];
  $lastName = $_POST['lastName'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $phoneNumber = $_POST['phoneNumber'];
  $cardNumber = $_POST['cardNumber'];
  $cvc = $_POST['cvc'];
  $cardDate = $_POST['cardDate'];


  //Create order details from inputed information
  $query= "INSERT INTO orderdetails (Fname, Lname, Address, City, PhoneNumber) VALUES ('$name', '$lastName', '$address', '$city', '$phoneNumber')";
  $result = mysqli_query( $conn, $query );
  $orderdetailsID = mysqli_insert_id($conn);


  //Select information from basket and product, for insertion into produktorders
  $query= "SELECT * FROM baskettable WHERE usertable_Email = '$email'";
  $result = mysqli_query( $conn, $query );
  //Create OrderID
  $firstInsert = true;
  $productsorderID = mysqli_insert_id($conn);
  $orderID = 'M'.$orderdetailsID;

  //Loop through basket and insert into produktorders
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $quantity           = $row['quantity'];
      $producttable_ID    = $row['producttable_ID'];
      $sent               = 0;

    //  echo $orderID.'<br>'.$sent.'<br>'.$quantity.'<br>'.$email.'<br>'.$orderdetailsID.'<br>';

      $queryy= "INSERT INTO produktorders (OrderID, Sent, Quantity, usertable_Email, producttable_ID, orderdetails_ID) VALUES ('$orderID', '$sent', '$quantity', '$email', '$producttable_ID', '$orderdetailsID')";

      $resultt = mysqli_query( $conn, $queryy );

      if(!$resultt){
        die('Could not enter data: ' . mysqli_error($conn));

      }



    }

    //Delete everything from users basket
    $query = "DELETE FROM baskettable WHERE usertable_Email = '$email'";
    $result = mysqli_query( $conn, $query );

    include 'inc/basketCount.php';


?>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MeatMarket</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" charset="utf-8">
    <link rel="stylesheet" href="css/checkoutcomplete.css" charset="utf-8">

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

      <section class="order-complete">
        <h1>Thank you for your purchase  ;)</h1>

        <a class="button-big receipt" href="orderdetails.php?od=<?=$orderID?>">Your receipt</a>

        <a class="button-big" href="products.php">Keep Shopping</a>
      </section>



    </div>


    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="js/min_nav.js"></script>

  </body>

</html>

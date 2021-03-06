<!DOCTYPE html>

<?php
  session_start();
  if(isset($_SESSION['authenticated'])) {
    header( "Location: products.php" );
  };
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

    <header>
      <div class="company-title">
        <a href="index.php">
          <h1>Meat<span>Market</span></h1>
          <h3>고기와 비스킷 초콜릿 의 흔적을 포함 할 수있다</h3>
        </a>
      </div>
    </header>

    <div class="sign-in">
      <div class="card-form">
        <form action="php/login.php" method="post">
          <input type="text" name="Uname" placeholder="Username" required>
          <input type="password" name="Password" placeholder="Password" required>
          <button type="submit" name="submit">Login</button>
          <a href="sign-up.html" class="button-big">Sign up</a>
        </form>
        <a id="forgot-pass" href="products.html">Forgot your meatpassword?</a>
      </div>
    </div>

  </body>
</html>

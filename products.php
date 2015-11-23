<!DOCTYPE html>

<?php
  session_start();
  if(!isset($_SESSION['authenticated'])) {
    header( "Location: http://localhost/index.php" );
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

    <div class="sidebar">
      <div class="navigation-links">
        <ul>
          <li><a class="button-small"    href="account.php">Account</a></li>
          <li><a class="button-small"    href="products.php">Products</a></li>
          <li><a class="button-small"    href="basket.php">Basket</a></li>
          <li><a class="button-small"    href="reviews.php">Reviews</a></li>
          <li><a class="button-small" href="logout.php">Log out</a></li>
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

      <div class="products">

        <div class="row-3">

          <div class="col">
            <a href="#">
              <div class="product-card">
                <div class="product-img"></div>
                <div class="product-info">
                  <h3>Kött</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                  <div class="button-small">More info</div>
                  <span>In stock: 30</span>
                  <button id="buy">Buy</button>
                </div>
              </div>
            </a>
          </div>


          <div class="col">
            <a href="#">
              <div class="product-card">
                <div class="product-img"></div>
                <div class="product-info">
                  <h3>Kött</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                  <div class="button-small">More info</div>
                  <span>In stock: 30</span>
                  <button id="buy" >Buy</button>
                </div>
              </div>
            </a>
          </div>

          <div class="col">
            <a href="#">
              <div class="product-card">
                <div class="product-img"></div>
                <div class="product-info">
                  <h3>Kött</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                  <div class="button-small">More info</div>
                  <span>In stock: 30</span>
                  <button id="buy" >Buy</button>
                </div>
              </div>
            </a>
          </div>

        </div>


        <div class="row-3">

            <div class="col">
              <a href="#">
                <div class="product-card">
                  <div class="product-img"></div>
                  <div class="product-info">
                    <h3>Kött</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <div class="button-small">More info</div>
                    <span>In stock: 30</span>
                    <button id="buy">Buy</button>
                  </div>
                </div>
              </a>
            </div>


            <div class="col">
              <a href="#">
                <div class="product-card">
                  <div class="product-img"></div>
                  <div class="product-info">
                    <h3>Kött</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <div class="button-small">More info</div>
                    <span>In stock: 30</span>
                    <button id="buy" >Buy</button>
                  </div>
                </div>
              </a>
            </div>

            <div class="col">
              <a href="#">
                <div class="product-card">
                  <div class="product-img"></div>
                  <div class="product-info">
                    <h3>Kött</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <div class="button-small">More info</div>
                    <span>In stock: 30</span>
                    <button id="buy" >Buy</button>
                  </div>
                </div>
              </a>
            </div>

        </div>

      </div>
    </div>

  </body>
</html>

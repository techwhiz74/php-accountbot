<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Website with Login & Registration Form</title>
  <!-- menunavbar -->
  <link rel="stylesheet" href="assets/explore.css" />
  <link rel="stylesheet" href="../assets/nav.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="products.css" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <div class="product-container">
    <div class="card">
      <div class="shoeBackground">
        <div class="gradients">
          <div class="gradient second" color="blue"></div>
          <div class="gradient" color="red"></div>
          <div class="gradient" color="green"></div>
          <div class="gradient" color="orange"></div>
          <div class="gradient" color="black"></div>
        </div>
        <img src="../images/Logonetflix.png" alt="" class="productlogo">
      </div>
      <div class="info">
        <div class="shoeName">
          <h3 class="title">Product Info:</h3>
          <h3 class="small">Bally Sports+ is a subscription streaming platform with live game telecasts, replays, studio programs, outdoor shows, and syndicated content from regional sports networks.</h3>
        </div>
        <h3 class="title" style="color: #de1fea;">Select Plan <span class="stock">109 in stock</span></h3>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.14.0/css/all.css">
        <div class="selectcard">
          <div class="content">
            <form action="add_order" method="POST">
              <input type="radio" name="plan" id="one" value="4.99" checked>
              <input type="radio" name="plan" id="two" value="9.99">
              <input type="radio" name="plan" id="three" value="14.99">
              <input type="radio" name="plan" id="four" value="19.99">
              <label for="one" class="box first">
                <div class="plan">
                  <span class="circle"></span>
                  <span class="yearly">1 Month</span>
                </div>
                <span class="price">$4.99</span>
              </label>
              <label for="two" class="box second">
                <div class="plan">
                  <span class="circle"></span>
                  <span class="yearly">3 Months</span>
                </div>
                <span class="price">$9.99</span>
              </label>
              <label for="three" class="box third">
                <div class="plan">
                  <span class="circle"></span>
                  <span class="yearly">6 Months</span>
                </div>
                <span class="price">$14.99</span>
              </label>
              <label for="four" class="box last">
                <div class="plan">
                  <span class="circle"></span>
                  <span class="yearly">1 Year</span>
                </div>
                <span class="price">$19.99</span>
              </label>
              <div class="buy-price">
                <div class="addcart">
                  <input class="product-qty" type="number" name="product-qty" min="1" value="1" style="width: 109px; text-align: center; padding: 11px; font-size: 18px; font-weight: 600; border-radius: 10px; border: 2px solid #de1fea;">
                </div>
                <button type="submit" class="buy">Buy Now!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once './menu2.php'; ?>
</body>

</html>

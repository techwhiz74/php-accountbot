<?php
session_start();
include '../system/config.php';

// Define base URL
$baseUrl = "http://localhost/"; // Adjust this if your project is in a subdirectory

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$products = $conn->prepare("SELECT product_stock FROM products WHERE product_name = 'Netflix'");
if ($products) {
  $products->execute();
  $result = $products->get_result();
  $products_data = $result->fetch_all(MYSQLI_ASSOC);

  // Check if data is available and loop through it
  if (!empty($products_data)) {
    foreach ($products_data as $product) {
      $at_count = substr_count($product['product_stock'], '@');
    }
  } else {
    echo "No data found.";
  }

  $products->close();
} else {
  $error_message = "Error preparing statement.";
}

$conn->close();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <?php if ($at_count == 0) : ?>
          <h3 class="title" style="color: #de1fea;">Select Plan <span class="stock">OUT OF STOCK</span></h3>
        <?php else : ?>
          <h3 class="title" style="color: #de1fea;">Select Plan <span class="stock"><?php echo htmlspecialchars($at_count); ?> Stock</span></h3>
        <?php endif ?>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.14.0/css/all.css">
        <div class="selectcard">
          <div class="content">
            <form id="productForm" action="add_order" method="POST">
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
                <div>
                  <a href="#" id="cartIcon" class="buy"><i class="fa-solid fa-cart-shopping"></i></a>
                  <button type="submit" class="buy">Buy Now!</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <form id="cartForm" action="cart" method="POST" style="display: none;">
    <input type="hidden" name="plan" id="cartPlan">
    <input type="hidden" name="product-qty" id="cartQty">
  </form>

  <script>
    document.getElementById('cartIcon').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default anchor behavior

      var form = document.getElementById('productForm');
      var cartForm = document.getElementById('cartForm');

      // Get selected plan and quantity from the main form
      var selectedPlan = form.querySelector('input[name="plan"]:checked').value;
      var productQty = form.querySelector('input[name="product-qty"]').value;

      // Set values to hidden form fields
      document.getElementById('cartPlan').value = selectedPlan;
      document.getElementById('cartQty').value = productQty;

      // Submit the hidden form
      cartForm.submit();
    });
  </script>

  <?php require_once './menu2.php'; ?>
</body>

</html>
<?php
session_start();
require '../vendor/autoload.php'; // Make sure to include the Composer autoloader

include '../system/config.php';

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $randomUrl = $_GET['id'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT total, paid FROM orders WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("s", $randomUrl);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Fetch the data
            $stmt->bind_result($total, $paid);
            $stmt->fetch();
        } else {
            $error_message = "URL not found.";
        }

        $stmt->close();
    } else {
        $error_message = "Error preparing statement.";
    }
} else {
    $error_message = "No URL specified.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Plans</title>
    <link rel="stylesheet" href="../assets/explore.css">
    <link rel="stylesheet" href="../assets/nav.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="products.css">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .box { display: inline-block; margin: 10px; }
        .circle { border-radius: 50%; width: 20px; height: 20px; background: #ccc; display: inline-block; margin-right: 5px; }
    </style>
</head>
<body>
    <div class="product-container">
        <div class="card">
            <div class="info">
                <div class="shoeName" style="margin: 2rem 0;">
                    <h1>Select Payment Method</h1>
                </div>
                <p><?php echo htmlspecialchars($randomUrl); ?></p>
                <h2 style="padding: 1rem 0;">Total: $<?php echo htmlspecialchars($total); ?></h2>
                <div class="selectcard">
                    <div class="content">
                        <form action="" method="POST">
                            <input type="radio" name="payment-method" id="one-method">
                            <input type="radio" name="payment-method" id="two-method">
                            <input type="radio" name="payment-method" id="three-method">
                            <input type="radio" name="payment-method" id="four-method">
                            <input type="radio" name="payment-method" id="five-method">
                            <label for="one-method" class="box first">
                                <div class="plan">
                                    <span class="circle"></span>
                                    <span class="yearly">PayPal</span>
                                </div>
                                <img src="../images/paypal.png" alt="PayPal">
                            </label>
                            <label for="two-method" class="box second">
                                <div class="plan">
                                    <span class="circle"></span>
                                    <span class="yearly">Debit/Credit, Apple Pay</span>
                                </div>
                                <div style="display: flex;">
                                    <img src="../images/stripe-amex.png" alt="PayPal">
                                    <img src="../images/stripe-discover.png" alt="PayPal">
                                    <img src="../images/stripe-mastercard.png" alt="PayPal">
                                    <img src="../images/stripe-visa.png" alt="PayPal">
                                </div>
                            </label>
                            <label for="three-method" class="box third">
                                <div class="plan">
                                    <span class="circle"></span>
                                    <span class="yearly">Crypto Currency</span>
                                </div>
                                <div style="display: flex;">
                                    <img src="../images/coinbase-btc.png" alt="PayPal">
                                    <img src="../images/coinbase-eth.png" alt="PayPal">
                                </div>
                            </label>
                            <label for="four-method" class="box four">
                                <div class="plan">
                                    <span class="circle"></span>
                                    <span class="yearly">Debit/Credit, Apple Pay</span>
                                </div>
                                <div style="display: flex;">
                                    <img src="../images/stripe-visa.png" alt="PayPal">
                                    <img src="../images/stripe-mastercard.png" alt="PayPal">
                                    <img src="../images/lex-apple.png" alt="PayPal">
                                </div>
                            </label>
                            <label for="five-method" class="box last">
                                <div class="plan">
                                    <span class="circle"></span>
                                    <span class="yearly">Balance</span>
                                </div>
                                <img src="../images/balance.png" alt="PayPal">
                            </label>
                            <div class="buy-price">
                                <button type="submit" class="payment">Continue to Payment <span class="fa fa-arrow-right ml-2 mr-1"></span></button>
                                <a href="/buy/order_info.php?id=<?php echo htmlspecialchars($randomUrl); ?>" style="text-decoration: none;">Cancel and go back to order</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once './menu2.php'; ?>

    <?php if (isset($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
</body>
</html>

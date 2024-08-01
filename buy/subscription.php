<?php
session_start();
include '../system/config.php';

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $order_randomUrl = $_GET['id'];

    // Prepare the SQL statement
    $orders = $conn->prepare('SELECT orders_id, cost FROM `order` WHERE id = ?');
    if ($orders) {
        $orders->bind_param("s", $order_randomUrl);
        $orders->execute();
        $orders->store_result();

        if ($orders->num_rows > 0) {
            // Fetch the data
            $orders->bind_result($orders_id, $cost);
            $orders->fetch();
        } else {
            $error_message = "URL not found.";
        }

        $orders->close();
    } else {
        $error_message = "Error preparing statement.";
    }

    $conn->close();
} else {
    $error_message = "No URL specified.";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
    <link rel="stylesheet" href="assets/explore.css">
    <link rel="stylesheet" href="../assets/nav.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="./products.css">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<style>
    .subscription-info {
        display: flex;
        border-bottom: 1px solid #ccc;
        padding: 30px;
        gap: 50px;
    }

    .sub-productlogo {
        width: 200px;
        border-radius: 10px;
        padding: 70px 0;
    }

    .subscription-text {
        margin: auto;
        margin-left: 0;
    }

    .support {
        background-color: #ffc107;
        border: none;
        padding: 12px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        color: white;
    }

    .subscription-button {
        padding-top: 20px;
    }

    a {
        text-decoration: none;
    }
</style>

<body>
    <div class="product-container" style="margin-top: 100px;">
        <div class="card">
            <div class="info">
                <div class="shoeName order-info">
                    <h1>Subscription</h1>
                </div>
                <div class="subscription-info">
                    <a href=""><img src="../images/Logonetflix.png" alt="" class="sub-productlogo"></a>
                    <div class="subscription-text">
                        <p><?php echo htmlspecialchars($order_randomUrl) ?></p><br>
                        <a href="">
                            <h1 style="color: #007bff;">NETFLIX</h1><br>
                        </a>
                        <h2>
                            <?php
                            switch ($cost) {
                                case 4.99:
                                    echo "1 Month";
                                    break;
                                case 9.99:
                                    echo "3 Months";
                                    break;
                                case 14.99:
                                    echo "6 Months";
                                    break;
                                case 19.99:
                                    echo "1 Year";
                                    break;
                                default:
                                    echo "Unknown duration";
                                    break;
                            }
                            ?>
                        </h2><br>
                        <p>UNPAID</p>
                    </div>
                </div>
                <div class="subscription-button">
                    <a href="/buy/info.php?id=<?php echo htmlspecialchars($orders_id); ?>"><button class="payment"><i class="fa-solid fa-credit-card"></i> Order</button></a>
                    <a href=""><button class="support"><i class="fa-solid fa-life-ring"></i> Support</button></a>
                </div>
            </div>
        </div>
    </div>

    <?php require_once './menu2.php'; ?>

    <?php if (isset($error_message)) : ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
</body>

</html>
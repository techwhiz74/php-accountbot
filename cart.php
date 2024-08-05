<?php
session_start();

require 'vendor/autoload.php'; // Make sure to include the Composer autoloader

use Ramsey\Uuid\Uuid;

include 'system/config.php';

if (!isset($_SESSION['SESSION_EMAIL'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

// Fetch user ID if not set in session
if (!isset($_SESSION['USER_ID'])) {
    $email = $_SESSION['SESSION_EMAIL'];
    $cart = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $cart->bind_param("s", $email);
    $cart->execute();
    $cart->bind_result($userId);
    $cart->fetch();
    $cart->close();

    if ($userId) {
        $_SESSION['USER_ID'] = $userId;
    } else {
        die("User ID not found.");
    }
} else {
    $userId = $_SESSION['USER_ID'];
}

// Initialize variables
$ordercart_data = [];
$itemCount = 0;
$subTotal = 0;
$subAmount = 0;
$multiBuy = 0;
$payTotal = 0;

// Handle delete request for a single item
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    // Prepare and execute the delete statement
    $deleteStmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
    $deleteStmt->bind_param("ii", $deleteId, $userId);

    if ($deleteStmt->execute()) {
        // Redirect to avoid re-execution on refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error deleting item: " . $deleteStmt->error;
    }

    $deleteStmt->close();
}

// Handle delete all request
if (isset($_GET['delete_all']) && $_GET['delete_all'] == 'true') {
    $deleteAllStmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
    $deleteAllStmt->bind_param("i", $userId);

    if ($deleteAllStmt->execute()) {
        // Redirect to avoid re-execution on refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error deleting all items: " . $deleteAllStmt->error;
    }

    $deleteAllStmt->close();
}

// Check if form is submitted and get the selected plan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['plan'])) {
        $selectedPlan = $_POST['plan'];
        $product_qty = $_POST['product-qty'];
        $total = $selectedPlan * $product_qty;

        // Prepare and bind the main order insert
        $cart = $conn->prepare("INSERT INTO cart (user_id, cost, quantity, total) VALUES (?, ?, ?, ?)");
        $cart->bind_param("isis", $userId, $selectedPlan, $product_qty, $total);

        if ($cart->execute()) {
            // Item added successfully
        } else {
            echo "Error inserting into orders: " . $cart->error;
        }

        $cart->close();
    } else {
        echo "No plan selected.";
    }
}

// Prepare and bind the insert for each product quantity
$ordercart = $conn->prepare("SELECT id, cost, quantity, total FROM cart WHERE user_id = ?");
$ordercart->bind_param("i", $userId);

if ($ordercart) {
    $ordercart->execute();
    $result = $ordercart->get_result();
    $ordercart_data = $result->fetch_all(MYSQLI_ASSOC);

    // Initialize subTotal and subAmount
    foreach ($ordercart_data as $item) {
        $subTotal += $item['total'];
        $subAmount += $item['quantity'];
    }
    $itemCount = count($ordercart_data);
    $multiBuy = $subTotal / 20;
    $payTotal = $subTotal - $multiBuy;

    $ordercart->close();
} else {
    echo ("No Order");
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
    <link rel="stylesheet" href="/assets/explore.css">
    <link rel="stylesheet" href="/assets/nav.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="/buy/products.css">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        #reload-icon {
            cursor: pointer;
        }

        a {
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="product-container">
        <div class="card">
            <div class="info">
                <h1>Cart</h1>
                <?php if ($itemCount != 0) : ?>
                    <table>
                        <tr>
                            <th>#</th>
                            <th>Subscription</th>
                            <th>Amount</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th style="color: #007bff;">
                                <a><i class="fa-solid fa-rotate reload-icon" id="cart-reload-icon"></i></a>
                            </th>
                            <th style="color: #007bff;">
                                <a href="?delete_all=true" style="color: #dc3545;"><i class="fa-solid fa-trash"></i></a>
                            </th>
                        </tr>
                        <?php if (!empty($ordercart_data)) : ?>
                            <?php $counter = 1; ?>
                            <?php foreach ($ordercart_data as $order) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($counter++); ?></td>
                                    <td style="color: #007bff;">
                                        <?php
                                        switch ($order['cost']) {
                                            case 4.99:
                                                echo "NETFLIX - 1 Month";
                                                break;
                                            case 9.99:
                                                echo "NETFLIX - 3 Months";
                                                break;
                                            case 14.99:
                                                echo "NETFLIX - 6 Months";
                                                break;
                                            case 19.99:
                                                echo "NETFLIX - 1 Year";
                                                break;
                                            default:
                                                echo "Unknown duration";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                                    <td style="color: #28a745 ;">$<?php echo htmlspecialchars($order['cost']); ?></td>
                                    <td style="color: #28a745 ;">$<?php echo htmlspecialchars($order['total']); ?></td>
                                    <td></td>
                                    <td><a href="?delete_id=<?php echo htmlspecialchars($order['id']); ?>" style="color: #dc3545 ;"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if ($itemCount == 1) : ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo htmlspecialchars($subAmount); ?></td>
                                    <td style="color: #007bff;"><br>Subtotal:<br><br>Total:<br></td>
                                    <td style="color: #28a745; font-weight:bold;"><br>$<?php echo htmlspecialchars($subTotal); ?><br><br>$<?php echo htmlspecialchars($subTotal); ?><br></td>
                                    <td></td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo htmlspecialchars($subAmount); ?></td>
                                    <td style="color: #007bff;"><br>Subtotal:<br><br>Multibuy:<br><br>Total:<br><br></td>
                                    <td style="color: #28a745; font-weight:bold;"><br>$<?php echo htmlspecialchars($subTotal); ?><br><br>$<?php echo htmlspecialchars($multiBuy); ?> (-5%)<br><br>$<?php echo htmlspecialchars($payTotal); ?><br><br></td>
                                    <td></td>
                                </tr>
                            <?php endif; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">No orders found.</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                    <div style="margin-top: 20px; float:right;">
                        <a href="/buy/add_cart.php" class="payment"><i class="fa-solid fa-cart-shopping"></i> Checkout</a>
                    </div>
                <?php else : ?>
                    <div style="margin-top: 50px; display:flex; justify-content:space-between;">
                        <h2>No cart</h2>
                        <a href="/buy/netflix.php" class="payment">Explore</a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('cart-reload-icon').addEventListener('click', function() {
            location.reload();
        });
    </script>

    <?php require_once 'menu.php'; ?>
</body>

</html>
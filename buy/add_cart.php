<?php
session_start();

require '../vendor/autoload.php'; // Make sure to include the Composer autoloader

use Ramsey\Uuid\Uuid;

include '../system/config.php';

if (!isset($_SESSION['SESSION_EMAIL'])) {
    // Redirect to login page
    header("Location: ../login.php");
    exit();
}

// Fetch user ID if not set in session
if (!isset($_SESSION['USER_ID'])) {
    $email = $_SESSION['SESSION_EMAIL'];
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($userId);
    $stmt->fetch();
    $stmt->close();

    if ($userId) {
        $_SESSION['USER_ID'] = $userId;
    } else {
        die("User ID not found.");
    }
} else {
    $userId = $_SESSION['USER_ID'];
}

function generateRandomUUID()
{
    return Uuid::uuid4()->toString();
}

$ordercart = $conn->prepare("SELECT id, cost, quantity, total FROM cart WHERE user_id = ?");
$ordercart->bind_param("i", $userId);

if ($ordercart) {
    $ordercart->execute();
    $result = $ordercart->get_result();
    $ordercart_data = $result->fetch_all(MYSQLI_ASSOC);

    // Initialize subTotal and subAmount
    $subTotal = 0;
    $subAmount = 0;

    foreach ($ordercart_data as $item) {
        $subTotal += $item['total'];
        $subAmount += $item['quantity'];
    }
    $multiBuy = $subTotal / 20;
    $payTotal = $subTotal - $multiBuy;
    
    $randomUrl = generateRandomUUID();

    // Prepare and bind the main order insert
    $stmt = $conn->prepare("INSERT INTO orders (id, user_id, total, paid, created_date, updated_date) VALUES (?, ?, ?, 'UNPAID', NOW(), NOW())");
    $stmt->bind_param("sdd", $randomUrl, $userId, $payTotal);

    if ($stmt->execute()) {

        $orderStmt = $conn->prepare("INSERT INTO `order` (id, orders_id, user_id, cost, paid, created_date, updated_date) VALUES (?, ?, ?, ?, 'UNPAID', NOW(), NOW())");

        foreach ($ordercart_data as $item) {
            for ($i = 0; $i < $item['quantity']; $i++) {
                $orderRandomUrl = generateRandomUUID();
                $orderStmt->bind_param("ssis", $orderRandomUrl, $randomUrl, $userId, $item['cost']);

                if (!$orderStmt->execute()) {
                    echo "Error inserting into `order`: " . $orderStmt->error;
                    $orderStmt->close();
                    $stmt->close();
                    $conn->close();
                    exit();
                }
            }
        }

        // Delete all items from the cart after successful order creation
        $deleteCartStmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $deleteCartStmt->bind_param("i", $userId);
        if (!$deleteCartStmt->execute()) {
            echo "Error deleting cart items: " . $deleteCartStmt->error;
        }
        $deleteCartStmt->close();

        $orderStmt->close();
        header("Location: /buy/order.php?id=$randomUrl");
        exit();
    } else {
        echo "Error inserting into orders: " . $stmt->error;
    }
} else {
    echo ("No Order");
}

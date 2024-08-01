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

// Check if form is submitted and get the selected plan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['plan'])) {

        $selectedPlan = (float)$_POST['plan'];
        $product_qty = (int)$_POST['product-qty'];
        $total = $selectedPlan * $product_qty;

        // Generate the random URL for the main order
        $randomUrl = generateRandomUUID();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind the main order insert
        $stmt = $conn->prepare("INSERT INTO orders (id, user_id, cost, quantity, total, paid, created_date, updated_date) VALUES (?, ?, ?, ?, ?, 'UNPAID', NOW(), NOW())");
        $stmt->bind_param("sdddd", $randomUrl, $userId, $selectedPlan, $product_qty, $total);

        if ($stmt->execute()) {
            // Prepare and bind the insert for each product quantity
            $orderStmt = $conn->prepare("INSERT INTO `order` (id, orders_id, user_id, cost, paid, created_date, updated_date) VALUES (?, ?, ?, ?, 'UNPAID', NOW(), NOW())");

            for ($i = 0; $i < $product_qty; $i++) {
                $orderRandomUrl = generateRandomUUID();
                $orderStmt->bind_param("ssdd", $orderRandomUrl, $randomUrl, $userId, $selectedPlan);

                if (!$orderStmt->execute()) {
                    echo "Error inserting into `order`: " . $orderStmt->error;
                    $orderStmt->close();
                    $stmt->close();
                    $conn->close();
                    exit();
                }
            }
            $orderStmt->close();
            header("Location: /buy/order.php?id=$randomUrl");
            exit();
        } else {
            echo "Error inserting into orders: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "No plan selected.";
    }
} else {
    echo "Invalid request.";
}
?>

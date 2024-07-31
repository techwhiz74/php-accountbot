<?php
session_start();
include '../system/config.php';

function generateRandomString($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

// Check if form is submitted and get the selected plan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['plan'])) {

        $selectedPlan = $_POST['plan'];
        $product_qty = $_POST['product-qty'];
        $total = $selectedPlan * $product_qty;
        
        // Generate the random URL
        $randomUrl = generateRandomString();
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO random_urls (id, total, paid, created_date, updated_date) VALUES (?, ?, 'UNPAID', NOW(), NOW())");
        $stmt->bind_param("sd", $randomUrl, $total);
        
        if ($stmt->execute()) {
            // Redirect to the new random URL page
            header("Location: /buy/order_pay.php?id=$randomUrl");
            exit();
        } else {
            echo "Error: " . $stmt->error;
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

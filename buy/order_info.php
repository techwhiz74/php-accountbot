<?php
session_start();
include '../system/config.php';

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $randomUrl = $_GET['id'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT total, paid FROM random_urls WHERE id = ?");
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

    $orders = $conn->prepare('SELECT id, total, paid FROM random_urls');
    if ($orders) {
        $orders->execute();
        $result = $orders->get_result();
        $orders_data = $result->fetch_all(MYSQLI_ASSOC);
        $orders->close();
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
    <link rel="stylesheet" href="assets/explore.css">
    <link rel="stylesheet" href="../assets/nav.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="products.css">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <style>
        .box {
            display: inline-block;
            margin: 10px;
        }

        .circle {
            border-radius: 50%;
            width: 20px;
            height: 20px;
            background: #ccc;
            display: inline-block;
            margin-right: 5px;
        }

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
    </style>
</head>

<body>
    <div class="product-container" style="margin-top: 100px;">
        <div style="display: grid; gap: 20px;">
            <div class="card">
                <div class="info">
                    <div class="shoeName" style="margin: 2rem 0;">
                        <h1>UNPAID</h1>
                    </div>
                    <h3>ID: <?php echo htmlspecialchars($randomUrl); ?></h3>
                    <h3 style="padding: 1rem 0;">Total: $<?php echo htmlspecialchars($total); ?></h2>
                </div>
            </div>
            <div class="card">
                <div class="info">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Expires</th>
                            <th>Price</th>
                        </tr>
                        <?php if (!empty($orders_data)) : ?>
                            <?php foreach ($orders_data as $order) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($order['id']); ?></td>
                                    <td>
                                        <?php
                                        switch ($order['total']) {
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
                                                echo "Unknown Duration";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($order['paid']); ?></td>
                                    <td>$<?php echo htmlspecialchars($order['total']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">No orders found.</td>
                            </tr>
                        <?php endif; ?>
                    </table>
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
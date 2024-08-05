<?php
session_start();
include './system/config.php';

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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

// Prepare the SQL statement to fetch all orders for the user
$orders = $conn->prepare('SELECT id, total, paid, created_date FROM orders WHERE user_id = ? ORDER BY created_date DESC');
$orders->bind_param("i", $userId); // Bind parameters

if ($orders) {
    $orders->execute();
    $result = $orders->get_result();
    $orders_data = $result->fetch_all(MYSQLI_ASSOC);
    $orders->close();
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
    <link rel="stylesheet" href="./assets/explore.css">
    <link rel="stylesheet" href="./assets/nav.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="./buy/products.css">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

        #reload-icon {
            cursor: pointer;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="product-container">
        <div class="card">
            <div class="info">
                <h1>Orders</h1>
                <table>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Paid</th>
                        <th>Created</th>
                        <th><i class="fa-solid fa-rotate reload-icon" id="reload-icon"></i></th>
                    </tr>
                    <?php if (!empty($orders_data)) : ?>
                        <?php $counter = 1; ?>
                        <?php foreach ($orders_data as $order) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($counter++); ?></td>
                                <td><?php echo htmlspecialchars($order['id']); ?></td>
                                <td>$<?php echo htmlspecialchars($order['total']); ?></td>
                                <td><?php echo htmlspecialchars($order['paid']); ?></td>
                                <td>
                                    <?php
                                    // Format the created_at date
                                    $date = new DateTime($order['created_date']);
                                    echo htmlspecialchars($date->format('d.m.Y H:i'));
                                    ?>
                                </td>
                                <td><a href="<?php echo htmlspecialchars("/order/" . $order['id'] . "/info"); ?>" style="color: #007bff;"><i class="fa-solid fa-circle-info"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6">No orders found.</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>

    <?php require_once './menu.php'; ?>

    <script>
        document.getElementById('reload-icon').addEventListener('click', function() {
            location.reload();
        });
    </script>
</body>

</html>

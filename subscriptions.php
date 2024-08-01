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

// Prepare the SQL statement with LIMIT, OFFSET, and ORDER BY
$orders = $conn->prepare('SELECT id, orders_id, cost FROM `order` WHERE user_id = ?');

if ($orders) {
   $orders->bind_param("i", $userId); // Bind parameters
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
      .subscription {
         margin-top: 100px;
         display: grid;
         grid-template-columns: auto auto auto auto auto auto;
         gap: 30px;
         padding: 40px 100px;
      }

      .subscription_card {
         background-color: white;
         border: 1px solid #ddd;
         border-radius: 10px;
         text-align: center;
      }

      .sub-productlogo {
         width: 200px;
         border-radius: 10px;
         padding: 70px 0;
      }

      .subscription_info {
         text-align: left;
         padding: 20px 30px;
      }
   </style>
</head>

<body>
   <div class="subscription">
      <?php foreach ($orders_data as $order) : ?>
         <div class="subscription_card">
            <img src="../images/Logonetflix.png" alt="" class="sub-productlogo">
            <div class="subscription_info">
               <h1>NETFLIX</h1><br>
               <h2>
                  <?php
                  switch ($order['cost']) {
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
               <p>Unpaid</p><br>
            </div>
            <div>
               <a href="/buy/subscription.php?id=<?php echo htmlspecialchars($order['id']); ?>"><button class="payment" style="width: 100%;">Get Account</button></a>
            </div>
         </div>
      <?php endforeach; ?>

   </div>

   <?php require_once './menu.php'; ?>

   <?php if (isset($error_message)) : ?>
      <div class="error-message"><?php echo $error_message; ?></div>
   <?php endif; ?>

</body>

</html>
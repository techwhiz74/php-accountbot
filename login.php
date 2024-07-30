<?php
    session_start(); 
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include './system/config.php';
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: index.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
                $_SESSION['SESSION_EMAIL'] = $email;
                $_SESSION['AccountID'] = $row['AccountID'];
                header("Location: index.php");
            } else {
                $_SESSION['SESSION_EMAIL'] = $email;
                $_SESSION['AccountID'] = $row['AccountID'];
                header("Location: index.php");
            } 
            

        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website with Login & Registration Form</title>
   <!-- menunavbar -->
    <link rel="stylesheet" href="assets/register.css" />
    <link rel="stylesheet" href="assets/nav.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  </head>
  <body>

 
    <!-- login -->
     
    <section class="w3l-mockup-form">
      <div class="container">
          <!-- /form -->
          <div class="workinghny-form-grid">
              <div class="main-mockup">
                 
                  <div class="content-wthree">
                      <h2>Login Now</h2>
                     <!--   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>-->
                      <?php echo $msg; ?>
                      <form action="" method="post">
                          <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                          <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                          <p><a href="reset-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                          <button name="submit" name="submit" class="btn" type="submit">Login</button>
                      </form>
                      <div class="social-icons">
                          <p>Create Account! <a href="register.php">Register</a>.</p>
                      </div>
                  </div>
              </div>
          </div>
          <!-- //form -->
      </div>
  </section>
  <!-- //form section start -->

   

  <script src="js/jquery.min.js"></script>
  <script>
      $(document).ready(function (c) {
          $('.alert-close').on('click', function (c) {
              $('.main-mockup').fadeOut('slow', function (c) {
                  $('.main-mockup').remove();
              });
          });
      });
  </script>

 <!-- menu inc -->
 <?php require_once 'menu.php'; ?>
  </body>
</html>
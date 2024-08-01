<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: index.php");
  die();
}

//Load Composer's autoloader
require 'vendor/autoload.php';

include './system/config.php';
$msg = "";

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));
  $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
  $code = mysqli_real_escape_string($conn, md5(rand()));
  $AccountID = mysqli_real_escape_string($conn, md5(rand()));

  if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
    $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
  } else {
    if ($password === $confirm_password) {
      $sql = "INSERT INTO users (name, email, password, code, AccountID) VALUES ('{$name}', '{$email}', '{$password}', '{$code}', '{$AccountID}')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo "<div style='display: none;'>";
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
          //Server settings
          $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'ssl://smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'accplugio@gmail.com';                     //SMTP username
          $mail->Password   = 'gngrcryfsqpkrybk';                               //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          //Recipients
          $mail->setFrom('support@accountplug.io', 'AccountPlug');
          $mail->addAddress($email);

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'Email Verification';
          $mail->Body    = '

<html> <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>AccountPlug.io</title>
<style type="text/css">
body {
  font-family:sans-serif;
}
table {
  border-collapse: collapse;
}
.logo {
  background-color:#e540f4;
  color:#ffffff;
  text-align:center;
}
.content {
  background-color:#f5f5f5;
  color:#424242;
}
.paste-link {
  color:#0b0e6f;
}
.pad-out {
  width:30px;
}
.linky {
  text-transform:uppercase;
  background-color:#e540f4;
  padding:8px 20px;
  color:white;
  text-decoration:none;
  font-weight:bold;
}
  .content{
 
  max-width: 500px;
  margin: auto;
}
                    }
</style>
  </head>
  <body><div class="content">
<table style="width:550px;">
  <tr>
    <td colspan="3" class="logo">AccountPlug.io</td>
  </tr>
  <tr>
    <td class="pad-out content"></td>
    <td class="content">
            <br />

      <p>Hi <b>user</b>,</p><p>Welcome to AccountPlug.io! Please verify your email address below.</p>

      <br />
      <div style="text-align:center;"><a class="linky" href="http://localhost/login.php/?verification=' . $code . '">Verify email</a></div>
      <br />
 
      <br />
      <p>Or paste this link into your browser:</p>
      
      <p class="paste-link">http://localhost/login.php/?verification=' . $code . '</p>
      
      <p>Thanks.<br /><b></b></p>
              <br />

    </td>
    <td class="pad-out content"></td>
  </tr>
  <tr>
    <td colspan="3" class="logo">&nbsp;</td>
  </tr>
</table></div>
</body>
  </html>
';

          $mail->send();
          echo 'Message has been sent';
        } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "</div>";
        $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
      } else {
        $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
      }
    } else {
      $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
    }
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
  <link rel="stylesheet" href="assets/nav.css" />
  <link rel="stylesheet" href="assets/register.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>

  <!-- register -->

  <section class="w3l-mockup-form">
    <div class="container">
      <!-- /form -->
      <div class="workinghny-form-grid">
        <div class="main-mockup">

          <div class="content-wthree">
            <h2>Register Now</h2>
            <!--   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>-->
            <?php echo $msg; ?>
            <form action="" method="post">
              <input type="text" class="name" name="name" placeholder="Enter Your Name" value="<?php if (isset($_POST['submit'])) {
                                                                                                  echo $name;
                                                                                                } ?>" required>
              <input type="email" class="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])) {
                                                                                                      echo $email;
                                                                                                    } ?>" required>
              <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
              <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
              <button name="submit" class="btn" type="submit">Register</button>
            </form>
            <div class="social-icons">
              <p>Have an account! <a href="login.php">Login</a>.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- //form -->
    </div>
  </section>
  <!-- //form section start -->
  <!-- menu inc -->
  <?php require_once 'menu.php'; ?>

  <script src="js/jquery.min.js"></script>
  <script>
    $(document).ready(function(c) {
      $('.alert-close').on('click', function(c) {
        $('.main-mockup').fadeOut('slow', function(c) {
          $('.main-mockup').remove();
        });
      });
    });
  </script>




</body>

</html>
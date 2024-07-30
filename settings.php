<?php
session_start(); 
if (empty($_SESSION['AccountID'])) {
    header("Location: login.php");
    die();
}

include("./system/config.php");

$msg1="";
$msg2="";

// ////// //// /// /// /// /// ///
 
$user_id = $_SESSION['AccountID'];


if(isset($_POST['update'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   



   $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE AccountID = ?");
   $update_profile->execute([$name, $email, $user_id]);


   if(!empty($name)){
    $msg1 = "<div class='success'>Profile updated successfully</div>";
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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link
    href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet"href="assets/settings.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>

.success {
   background: #D4EDDA;
   color: #40754C;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   text-align: center;
   margin-bottom: 10px;

}
  </style>
  </head>
  <body>
    

  <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action1" 
                            href="settings.php" style="background: #f3f3f3 !important;
    border-radius: 6px;
    z-index: 0 !important;
        color: #de1fea !important;
    font-weight: 600 !important;
    border-left: 4px solid #de1fea !important;" >General</a>
                        <a class="list-group-item list-group-item-action2" 
                            href="security.php" style="font-weight: 500 !important;"  >Change password</a>
                        
                        <a class="list-group-item list-group-item-action3" 
                            href="balance.php" style="font-weight: 500 !important;">Balance</a>
                       
                        <a class="list-group-item list-group-item-action4" 
                            href="referrals.php" style="font-weight: 500 !important;">Referrals</a>
                    </div>
                    
                </div>
                
                <div class="col-md-9">
                    <div class="tab-content">
                       
                           <form method="post" enctype="multipart/form-data">
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                <?php 
if ($msg1)
 {
    echo "$msg1";
 }
elseif ($msg2)
 {
     echo "$msg2";
 }

?>  
                                    <label class="form-label">Account ID</label>
                                    <h1 type="text" class="form-controlnontype mb-1" ><?php 
           if(isset($_SESSION['AccountID'])){
           $id=$_SESSION['AccountID'];
           $query=mysqli_query($conn, "SELECT * FROM users WHERE Accountid='$id'");
           while($row=mysqli_fetch_array($query)){
            echo $row['AccountID'];
            }
             } ?></h1>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text"  name="name" class="form-control" required value="<?php 
           if(isset($_SESSION['AccountID'])){
           $id=$_SESSION['AccountID'];
           $query=mysqli_query($conn, "SELECT * FROM users WHERE Accountid='$id'");
           while($row=mysqli_fetch_array($query)){
            echo $row['name'];
            }
             } ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="email" name="email" class="form-control mb-1" required value="<?php 
           if(isset($_SESSION['AccountID'])){
           $id=$_SESSION['AccountID'];
           $query=mysqli_query($conn, "SELECT * FROM users WHERE Accountid='$id'");
           while($row=mysqli_fetch_array($query)){
            echo $row['email'];
            }
             } ?>">
                                   
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Registered</label>
                                    <h1 type="text" class="form-controlnontype"><?php 
           if(isset($_SESSION['AccountID'])){
           $id=$_SESSION['AccountID'];
           $query=mysqli_query($conn, "SELECT * FROM users WHERE Accountid='$id'");
           while($row=mysqli_fetch_array($query)){
            echo $row['time'];
            }
             } ?></h1>
                                </div>
                            </div>
                       
          
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" name="update" class="btn btn-primary">Save changes</button>&nbsp;
            
            <a href="https://www.freecodecamp.org/">
            <button type="button" class="btn btn-default">Cancel</button></a>
        </div></form> 
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
  
    

<!-- menu inc -->
<?php require_once 'menu.php'; ?>

  </body>
</html>
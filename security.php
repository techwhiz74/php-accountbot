<?php
session_start(); 
if (empty($_SESSION['AccountID'])) {
    header("Location: login.php");
    die();
}




if (isset($_SESSION['AccountID'])) {

	include("./system/config.php");

	$msg1="";
$msg2="";
$msg3="";
$msg4="";
$msg5="";


if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
        $msg1 = "<div class='error'>Old Password is required</div>";
        $status= "NOTOK";
    }else if(empty($np)){
        $msg2 = "<div class='error'>New Password is required</div>";
        $status= "NOTOK";
    }else if($np !== $c_np){
        $msg3 = "<div class='error'>The confirmation password does not match</div>";
        $status= "NOTOK";
    }else {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $id = $_SESSION['AccountID'];

        $sql = "SELECT password
                FROM users WHERE 
                AccountID='$id' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users
        	          SET password='$np'
        	          WHERE AccountID='$id'";
        	mysqli_query($conn, $sql_2);
            $msg4 = "<div class='success'>Your password has been changed successfully</div>";
            $status= "OK";

        }else {
            $msg5 = "<div class='error'>Incorrect password</div>";
            $status= "NOTOK";
        }

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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link
    href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet"href="assets/settings.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   text-align: center;
   margin-bottom: 10px;

}

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
                            href="settings.php" style="font-weight: 500 !important;" >General</a>
                        <a class="list-group-item list-group-item-action2" 
                            href="security.php" style="background: #f3f3f3 !important;
    border-radius: 6px;
    z-index: 0 !important;
        color: #de1fea !important;
    font-weight: 600 !important;
    border-left: 4px solid #de1fea !important;"  >Change password</a>
                        
                        <a class="list-group-item list-group-item-action3" 
                            href="balance.php" style="font-weight: 500 !important;">Balance</a>
                       
                        <a class="list-group-item list-group-item-action4" 
                            href="referrals.php" style="font-weight: 500 !important;">Referrals</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                   

<?php 
if ($msg1)
 {
    echo "$msg1";
 }
elseif ($msg2)
 {
     echo "$msg2";
 }
else
 {
echo "$msg3";
 }

?>  

<?php 
if ($msg4)
 {
    echo "$msg4";
 }
elseif ($msg5)
 {
     echo "$msg5";
 }

?>  


        <form method="post">
            
                      
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  name="op" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="np"  class="form-control">
                                </div>


                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password"  name="c_np"  class="form-control">
                                </div>
                            
                  
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
        </form>

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
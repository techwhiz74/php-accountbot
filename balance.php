<?php
session_start(); 
if (empty($_SESSION['SESSION_EMAIL'])) {
    header("Location: login.php");
    die();
}

include("./system/config.php");

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
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet"href="assets/settings.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            href="security.php" style="font-weight: 500 !important;"  >Change password</a>
                        
                        <a class="list-group-item list-group-item-action3" 
                            href="balance.php" style="background: #f3f3f3 !important;
    border-radius: 6px;
    z-index: 0 !important;
        color: #de1fea !important;
    font-weight: 600 !important;
    border-left: 4px solid #de1fea !important;">Balance</a>
                       
                        <a class="list-group-item list-group-item-action4" 
                            href="referrals.php" style="font-weight: 500 !important;">Referrals</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                      
                  
                     
                       
                    <div class="row text-center">
		<div class="col-6">
			<p class="text-muted mb-0">Balance</p>
			<h1 class="text-dark mb-0">$0.00</h1>
		</div>
		<div class="col-6 border-left">
			<p class="text-muted mb-0">Total Spent</p>
			<h1 class="text-dark mb-0">$0.00</h1>
		</div>
	</div>
    <hr>
    <h4 class="text-primarytopup">Topup Balance</h4>

    <form method="POST">
		<div class="input-group input-group-lg">
			<input name="Amount" class="form-control2" type="number" min="0.01" step="0.01" placeholder="$0.00" value="">
			<div class="input-group-append">
				<button type="submit" class="btn btn-primary"  style="z-index: 0;"><h4 class="topup"  style="margin: 0 auto;
    font-size: 23px;" > <i class='fx bx-plus bx-flashing' ></i></i> Topup</h4></button>
			</div>
		</div>
	<input type="hidden" name="csrf" value="c4ef01d6-61e8-dfa6-1bf8-430995b115bd">
</form>
                        
                       



                    </div>
                </div>
            </div>
        </div>
        

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
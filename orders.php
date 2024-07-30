<?php
session_start(); 
if (empty($_SESSION['SESSION_EMAIL'])) {
    header("Location: login.php");
    die();
}
     ?>

     <!DOCTYPE html>
     <html lang="en">
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
     </head>
     <body>
        hi
     </body>
     </html>
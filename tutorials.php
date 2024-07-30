<?php
    session_start(); 
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
  <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet">
    
  <style>
/* FAQ section */

:root{
    /* Primary Text */
    --Very-dark-desaturated-blue: hsl(238, 29%, 16%);
    --Soft-red: hsl(296.45deg 82.86% 51.96%);
    /* BG */
    --Soft-violet: hsl(273, 75%, 66%);
    --Soft-blue: hsl(240, 73%, 65%);
    /*  Neutral Text */
    --Very-dark-grayish-blue: hsl(237, 12%, 33%);
    --Dark-grayish-blue: hsl(240, 6%, 50%);
    /* Dividers */
    --Light-grayish-blue: hsl(240, 5%, 91%);
}

html{
    font-size: 20px;
    font-family: 'Kumbh Sans', sans-serif;
    scroll-behavior: smooth;
}


.main-container {
    display: flex;
    margin-top: 160px;
    margin-left: auto;
    margin-right: auto;
    max-width: 1000px;
    padding: 30px 0;
    background-color: white;
    border-radius: 20px;
    box-shadow: 0 35px 30px -30px rgb(85 83 83);
    background-image: url(images/bg-pattern-desktop.svg);
    background-size: 90%;
    background-repeat: no-repeat;
    background-position: -457px -250px;
}

.faq ,.woman-img{
    flex: 1;
}

.woman-img{
    display: flex;
    align-items: center;
    overflow: hidden;
    position: relative;
}

.box{
    display: block;
    position: absolute;
    transform: translateX(-50%) translateY(85%);
    z-index: 1;
}

.desk-img{
    transform: translateX(-17%);
}

.mob-img{
    display: none;
}

.faq{
    padding: 30px 30px;
}

.faq h1{
  text-transform: uppercase;
    font-size: 37px;
    padding-bottom: 35px;
    text-align: center;

}


.items{
    font-size: 15px;
   

}


.item{
    border-bottom:var(--Light-grayish-blue) 1px solid;
    padding:10px 10px 10px 10px;    
}

.item-link{
    text-decoration: none;
    color: black;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
    transition: 0.2s;
}

.item-link:hover{
    color: var(--Soft-red);
}

.answer{
    max-height: 0;
    overflow: hidden;
    position: relative;
    transition: max-height 1s;

    color: var(--Dark-grayish-blue);
    font-size: 12px;
    line-height: 20px;

}

.item:target .answer{
    max-height: 100px;
    padding: 5px 0;
    font-size: 15px;
}

.item:target .item-link{
    font-weight: 700;
    font-size: 18px;
} 

.item:target .arrow img{
    transform: rotate(180deg);
    transition: transform 0.6s ease-in-out;
}


@media (max-width: 1155px){
    .desk-img{
        display: none;
    }

    .box{
        display: none;
    }

    .mob-img{
        display: block;
        position: relative;
        left: -10px;
        top: -40px;
        margin: 0 auto;
    }

    .woman-img{
        overflow: visible;
        height: 0;

    }

    .main-container{
        background-image: none;
        display: block;
        margin-top: 180px;
    }

    .items {
        padding-right: 0;
    }

    .answer p{
        padding-right: 50px;
    }

    .faq h1{
        text-align: center;
    }

   

}

@media (max-width: 1155px){


.main-container{
  margin: 10px;
  margin-top: 160px;
}

}

@media (max-width: 450px){
.faq h1{
  font-size: 29px;
}
}


</style>
  </head>
  <body>
    

    <div class="main-container">

    <div class="faq">
      <h1>frequently asked questions</h1>
      <div class="items">
        <div class="item" id="q1">
          <a class="item-link" href="#q1">How do I purchase accounts from the shop?
            <i class="arrow"><img src="./images/icon-arrow-down.svg" alt=""></i>
          </a>
          <div class="answer">
            <p> Head over to the 'Products' page, select your product and subscription and you'll be redirected to the purchase gateway. When your payment is completed.</p>
          </div>
        </div>

        <div class="item" id="q2">
          <a class="item-link" href="#q2"> Is the payment instant?
            <i class="arrow"><img src="./images/icon-arrow-down.svg" alt=""></i></a>
          <div class="answer">
            <p>Yes, all purchases are instant. Transactions via cryptocurrency will be confirmed as soon as the confirmations on the transaction are received.</p>
          </div>
        </div>

        <div class="item" id="q3">
          <a class="item-link" href="#q3">I paid and haven't received my subscription. What should I do?
            <i class="arrow"><img src="./images/icon-arrow-down.svg" alt=""></i></a>
          <div class="answer">
            <p>If your payment is already confirmed, you should have the subscription. If not, contact support immediately with your purchase information.</p>
          </div>
        </div>

        <div class="item" id="q4">
          <a class="item-link" href="#q4">My account does not work anymore. What do I do?
            <i class="arrow"><img src="./images/icon-arrow-down.svg" alt=""></i></a>
          <div class="answer">
            <p>Just click the "Replace" button on your subscription page to generate a replacement account instantly.</p>
          </div>
        </div>

        <div class="item" id="q5">
          <a class="item-link" href="#q5">How can I make these accounts last longer?
            <i class="arrow"><img src="./images/icon-arrow-down.svg" alt=""></i></a>
          <div class="answer">
            <p>Avoid logging in from too many devices, or changing any credentials (profiles, passwords, settings, billing info. etc). The more you are cautious with the account, the longer it lasts</p>
          </div>
        </div>

        
        

      </div>
    </div>
  </div>
  
  <!-- menu inc -->
  <?php require_once 'menu.php'; ?>
  </body>
</html>
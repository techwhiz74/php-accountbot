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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/index.css">
  </head>
  <body>
   


  <div class="header-place-bg">
  <div class="header-place-bg2">
 <div class="header-place">
 <img class="netflixicon" src="./images/netflixicon.png">
 <img class="nordvpnicon" src="./images/nordvpnicon.png">

 <img class="onlyfansicon" src="./images/onlyfansicon.png">
 <img class="spotifyicon" src="./images/spotifyicon.png">


 <div class="search-bar-box">

 
<div class="header-text">
<span class="headerexplore">Explore</span> All Products & 
<h2 class="header2" >Reach the Next level !</h2>
</div>
<div class="search-bar">
   
  <a href=explore.php>
   <button class="explorebutton">
    <span>Explore Now</span>
  </button></a>
</div></div>   </div> </div></div><!-- searchform -->

     
<!-- infitine slider -->

<div class="wrapper">
  <div class="item item1">ACCOUNTPLUG.IO</div>
  <div class="item item2">ACCOUNTPLUG.IO</div>
  <div class="item item3">ACCOUNTPLUG.IO</div>
  <div class="item item4">ACCOUNTPLUG.IO</div>
  <div class="item item5">ACCOUNTPLUG.IO</div>
  <div class="item item6">ACCOUNTPLUG.IO</div>
  <div class="item item7">ACCOUNTPLUG.IO</div>
  <div class="item item8">ACCOUNTPLUG.IO</div>
</div>
     <!-- our services --> 
     <div class="services-text">
     Our <span class="headerservices">Services</span>
     </div>
     <div class="card-bg">
     <div class="card">
        <div class="face front">
            <div class="icon"><i class="fa-solid fa-percent"></i></div>
            <h3>Immense Discounts</h3>
            <p>We offer subscriptions at over 90%+ off compared to the actual price. Cheapest prices on the market.</p>
        </div>
       
    </div>

    <div class="card">
        <div class="face front">
            <div class="icon"><i class="fa-solid fa-robot"></i></div>
            <h3>Auto Replacement</h3>
            <p>We are the only website offering an auto-replacement system to ensure you have a working account 24/7.</p>
        </div>
       
    </div>

    <div class="card">
        <div class="face front">
            <div class="icon"><i class="fa-solid fa-headset"></i></div>
            <h3>Live Support</h3>
            <p>We have a dedicated support team working around the clock to make sure all our customers are satisfied.</p>
        </div>
       
    </div></div>

<!-- platforms --> 
<div class="services-text">
Platforms<span class="headerplatforms">We offer services for over 50+ platforms currently, including the following sites:</span>
     </div>
 <div class="marquee-bg">
<div class="marquee">
  <div class="marquee__group">
    <img src='images/netflix-logo-drawing-png-19.png' alt=''>
    <img src='images/Spotify_logo_with_text.svg.png' alt=''>
    <img src='images/disneyplatforms.png' alt=''>
    <img src='images/ipvanishplatforms.png' alt=''>
    <img src='images/nordvpnplatforms.png' alt=''>
  </div>

  <div aria-hidden="true" class="marquee__group">
  <img src='images/netflix-logo-drawing-png-19.png' alt=''>
    <img src='images/Spotify_logo_with_text.svg.png' alt=''>
    <img src='images/disneyplatforms.png' alt=''>
    <img src='images/ipvanishplatforms.png' alt=''>
    <img src='images/nordvpnplatforms.png' alt=''>
  </div>
</div>

<div class="marquee marquee--reverse">
  <div class="marquee__group">
    <img src='images/onlyfansplatforms.png' alt=''>
    <img src='images/pornhubplatforms.png' alt=''>
    <img src='images/chatgptplatforms.png' alt=''>
    <img src='images/crunchyrollplatforms.png' alt=''>
    <img src='images/huluplatforms.png' alt=''>
  </div>

  <div aria-hidden="true" class="marquee__group">
  <img src='images/onlyfansplatforms.png' alt=''>
    <img src='images/pornhubplatforms.png' alt=''>
    <img src='images/chatgptplatforms.png' alt=''>
    <img src='images/crunchyrollplatforms.png' alt=''>
    <img src='images/huluplatforms.png' alt=''>
  </div>
</div>
</div>

<div class="platforms-textexplore"><a href="explore.php" class="textexplore2"
">
Explore All</a>
     </div>






<!-- footer start -->
<div class="footer">
  
  
  <div class="copyright">
    <div class="container">
      <div class="row align-items-center" style="
    align-items: center;
    display: ruby-text;
">
        <div class="col-md-6">
          <div class="copy-text">
            <p>&copy; <a href="#">Account Plug</a>. All Rights Reserved.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="copy-menu">
            <a href="">Terms</a>
            <a href="">Privacy</a>
            <a href="https://htmlcodex.com">Author</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


      <!-- menu inc -->
    <?php require_once 'menu.php'; ?>


<script>
let focus = document.querySelector(".header-place-bg2");
    
    document.addEventListener("mousemove",function(e)
    {
        let x = e.pageX;
        let y = e.pageY;
      
        focus.style.background = "radial-gradient(circle at "+x+"px "+y+'px ,rgb(15 140 140 / 20%), transparent 40%)'; 
       
    })
</script>
  </body>
</html>
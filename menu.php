<?php

include("./system/config.php");

?>


<nav>
  <div class="logo">
    <div class="balanceshow"><i class='wl bxs-wallet'></i></div>
    <i class="bx bx-menu menu-icon"></i>
    <a href="index.php">
      <img class="logopng1" src="images/logo.png"></a>
  </div>
  <div class="sidebar">
    <div class="logo">
      <i class="bx bx-menu menu-icon"></i>
      <a class="logolink" href="index.php">
        <img class="logopng" src="images/logo.png"></a>

    </div>
    <div class="sidebar-content">
      <ul class="lists">


        <li class="list">
          <a href="explore.php" class="nav-link">
            <div class="uricon"> <i class='bx bx-store-alt icon'></i></div>
            <span class="link">Explore</span>
          </a>
        </li>
        <?php if (!isset($_SESSION['SESSION_EMAIL'])) { ?>
        <?php } else { ?>

          <li class="list">
            <a href="subscriptions.php" class="nav-link">
              <div class="uricon"> <i class='bx bx-task icon'></i></div>
              <span class="link">Subscriptions</span>
            </a>
          </li>
          <li class="list">
            <a href="orders.php" class="nav-link">
              <div class="uricon"> <i class='bx bx-collection icon'></i></div>
              <span class="link">Orders</span>
            </a>
          </li>
          <li class="list">
            <a href="/cart.php" class="nav-link">
              <div class="uricon"> <i class='bx bx-cart icon'></i></div>
              <span class="link">Cart</span>
            </a>
          </li>


        <?php } ?>

        <!--   <li class="list">   
              <a href="#" class="nav-link">
              <div class="uricon">      <i class='bx bx-cool icon'></i></div>
                <span class="link">Other services</span>
              </a>
            </li>-->
        <li class="list">
          <a href="#" class="nav-link">
            <div class="uricon"> <i class='bx bx-support icon'></i></div>
            <span class="link">Contact</span>
          </a>
        </li>
        <li class="list">
          <a href="tutorials.php" class="nav-link">
            <div class="uricon"> <i class='bx bx-book icon'></i></div>
            <span class="link">Tutorials</span>
          </a>
        </li>
      </ul>


      <div class="bottom-cotent">
        <div class="line-3"></div>


        <?php if (!isset($_SESSION['SESSION_EMAIL'])) { ?>
          <li class="list">
            <a href="register.php" class="nav-link">
              <div class="uricon"> <i class='bx bx-user-plus icon'></i></div>
              <span class="link">Register</span>
            </a>
          </li>



          <li class="list">
            <a href="login.php" class="nav-link">
              <div class="uricon"> <i class="bx bx-log-in icon"></i></div>
              <span class="link">Login</span>
            </a>
          </li>



        <?php } else { ?>
          <!--user detail, log out and settings -->

          <li class="list">
            <a href="settings.php" class="nav-link">
              <div class="uricon"> <i class="bx bx-cog icon"></i></div>
              <span class="link">Settings</span>
            </a>
          </li>

          <li class="list">
            <a href="logout.php" class="nav-link">
              <div class="logouticon">
                <ia class="bx bx-log-out icon"></ia>
              </div>
              <span class="linklogout">Log out</span>
            </a>
          </li>


          <br>


          <div class="sidebar__account">
            <img src="images/perfil.jpg" alt="sidebar image" class="sidebar__perfil">

            <div class="sidebar__names">
              <h3 class="sidebar__name"><?php
                                        if (isset($_SESSION['AccountID'])) {
                                          $id = $_SESSION['AccountID'];
                                          $query = mysqli_query($conn, "SELECT * FROM users WHERE accountid='$id'");
                                          while ($row = mysqli_fetch_array($query)) {
                                            echo $row['name'];
                                          }
                                        } ?></h3>
              <span class="sidebar__email"> <?php
                                            if (isset($_SESSION['AccountID'])) {
                                              $id = $_SESSION['AccountID'];
                                              $query = mysqli_query($conn, "SELECT * FROM users WHERE accountid='$id'");
                                              while ($row = mysqli_fetch_array($query)) {
                                                echo $row['email'];
                                              }
                                            } ?></span>
            </div>
          </div> <?php } ?>



        <!--user detail end  -->



      </div>
    </div>
  </div>

</nav>
<section class="overlay"></section>
<script src="/assets/style.js"></script>
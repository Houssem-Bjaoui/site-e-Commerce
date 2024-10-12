   <!-- banner bg main start -->
   <div class="banner_bg_main">
        
        <!-- logo section start -->
        <div class="logo_section">
           <div class="container">
              <div class="row">
                 <div class="col-sm-12">
                    <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
                 </div>
              </div>
           </div>
        </div>
        <!-- logo section end -->
        <!-- header section start -->
        <div class="header_section">
           <div class="container">
              <div class="containt_main">
                 
                 
          
                 <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                    </button>
                    
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
   <?php
   foreach ($categories as $categorie) {
      
       print '<a class="dropdown-item" href="#">' . $categorie['nom'] . '</a>';
     }
   ?>
</div>

                 
                 </div>
                 <div class="main">
                    <!-- Another variation with a button -->
                    <form action="index.php" method= "POST">
                    <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search this blog">

                       <div class="input-group-append">
                          <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                          <i class="fa fa-search"></i>
                          </button>
                        
                       </div>
                    </div>
                    </form>


                 </div>
                 <div class="header_box">
                    
                    <div class="login_menu">
                       <ul>
                          <li><a href="panier.php">
                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                             <span class="padding_10">Panier</span></a>
                          </li>
                        <?php if(isset($_SESSION['nom'] )){

                           print ' <li><a href="profile.php">
                           <i class="fa fa-user" aria-hidden="true"></i>
                           <span class="padding_10">profile</span></a>
                        </li>';

                        } else{
                           print'  <li><a href="login.php">
                           <i class="fa fa-user" aria-hidden="true"></i>
                           <span class="padding_10">connexion</span></a>
                        </li>


                        <li><a href="register.php">
                           <i class="fa fa-user" aria-hidden="true"></i>
                           <span class="padding_10">Register</span></a>
                        </li>';
                        }
                        
                        ?>
                        
                       </ul>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <!-- header section end -->
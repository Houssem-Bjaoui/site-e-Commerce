<?php

session_start();


if(isset($_SESSION['nom'])){
   header(('location:profile.php'));
}


include "inc/functions.php";

$showRegistrationAlert = 0 ;
$categories= getAllCategories();

if(!empty($_POST)){ //click sur le bouton sauvegarder
  if(AddVisiteur($_POST)){
   $showRegistrationAlert = 1 ;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Eflyer</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  <link rel="stylesheet" href="css/register.css">
    </head>
   <body>
   <?php

         include "inc/header.php";


   ?>
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="index.php">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="index.php">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="index.php">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
     
     <!-----------register-->
    <div>
   
        <div class="form-box signup">
           
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="register.php" method="post">
                    <div class="input-field">
                        <input type="text" required name="nom">
                        <label>Nom</label>
                    </div>
                    <div class="input-field">
                        <input type="text" required name="prenom">
                        <label>Prenom</label>
                    </div>
                    <div class="input-field">
                        <input type="text" required name="email">
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="text" required name="telephone">
                        <label>Telephone</label>
                    </div>
                    <div class="input-field">
                        <input type="password" required name="mp">
                        <label>Mot de passe</label>
                    </div>
                    
                    <button type="submit">Registre</button>
                </form>
                <div class="bottom-link">
                    Already have an account?
                    <a href="login.php" id="login-link">connexion</a>
                </div>
            </div>
<!---------------------------end register-------------------->
    
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.php"><img src="images/footer-logo.png"></a></div>
           
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2024 All Rights Reserved.</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
     

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <?php
if ($showRegistrationAlert == 1) {
    print "<script>
    swal({
        title: 'success',
        text: 'creation de compte avec succes',
        icon: 'success',
        button: 'ok',
        time: 2000
    });
    </script>";
}
?>

  
     
   </body>
</html>












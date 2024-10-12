<?php
session_start();


if(isset($_SESSION['nom'])){
   header(('location:profile.php'));
}


include "../inc/functions.php";

$user = true;


if (!empty($_POST)) { // click on "connexion"

   $user = connectAdmin($_POST);

   if (is_array($user) && $user) { // if user is found, redirect to profile

      session_start();
      $_SESSION['id'] = $user['id'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['nom'] = $user['nom'];
      
      $_SESSION['mp'] = $user['mp'];
    

       header('Location: profile.php'); // redirection to profile page
       exit(); // stop further execution after redirect
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
  <link rel="stylesheet" href="../css/register.css">
    </head>
   <body>
  
 
     

   <!-- login section -->
   <div>
      <div class="form-box login">
         <div class="form-content">
            <h2>Espace Connexion Admin</h2>
            <form action="login.php" method="post"> <!-- Corrected action for form -->
               <div class="input-field">
                  <input type="text" required name = "email">
                  <label>Email</label>
               </div>
               <div class="input-field">
                  <input type="password" name="mp"  required>
                  <label>Password</label>
               </div>
              
               <button type="submit">Connexion</button>
            </form>
            
         </div>
      </div>
   </div>
   <!-- end login -->


   <!-- Javascript files -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <?php
if (!$user) {
    print "<script>
    swal({
        title: 'Erreur',
        text: 'coordonnees non valide',
        icon: 'error',
        button: 'ok',
        time: 2000
    });
    </script>";
}
?>



  </body>
</html>

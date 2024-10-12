<?php
session_start();
include "../../inc/functions.php";

$categories= getAllCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Proper Bootstrap CSS linking -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: #4723D9;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100;
        }

        *, ::before, ::after {
            box-sizing: border-box;
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s;
        }

        a {
            text-decoration: none;
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s;
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden;
        }

        .header_img img {
            width: 40px;
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed);
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .nav_logo, .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem;
        }

        .nav_logo {
            margin-bottom: 2rem;
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color);
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700;
        }

        .nav_link {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s;
        }

        .nav_link:hover {
            color: var(--white-color);
        }

        .nav_icon {
            font-size: 1.25rem;
        }

        .show {
            left: 0;
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem);
        }

        .active {
            color: var(--white-color);
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color);
        }

        .height-100 {
            height: 100vh;
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: calc(var(--nav-width) + 2rem);
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
            }

            .header_img {
                width: 40px;
                height: 40px;
            }

            .header_img img {
                width: 45px;
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0;
            }

            .show {
                width: calc(var(--nav-width) + 156px);
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px);
            }
        }
    </style>

    <title>Admin Dashboard</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div>
          <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</a>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
    <nav class="nav">
    <div>
        <a href="../index.php" class="nav_logo">
            <i class='bx bxs-paper-plane nav_logo-icon'></i>
            <span class="nav_logo-name">E-flyer</span>
        </a>

        <div class="nav_list">
            <a href="../home.php" class="nav_link">
                <i class='bx bxs-home nav_icon'></i>
                <span class="nav_name">Home</span>
            </a>

            <a href="list.php" class="nav_link active">
                <i class='bx bxs-category nav_icon'></i>
                <span class="nav_name">Categories</span>
            </a>

            <a href="../produits/listp.php" class="nav_link">
                <i class='bx bxs-shopping-bag nav_icon'></i>
                <span class="nav_name">Products</span>
            </a>

            <a href="../users/list.php" class="nav_link">
                <i class='bx bxs-user-detail nav_icon'></i>
                <span class="nav_name">Customers</span>
            </a>

            <a href="../stock/list.php" class="nav_link">
                <i class='bx bxs-file nav_icon'></i>
                <span class="nav_name">Stock</span>
            </a>

            <a href="../profile.php" class="nav_link">
                <i class='bx bxs-bar-chart-alt-2 nav_icon'></i>
                <span class="nav_name">Profile</span>
            </a>
        </div>
    </div>

    <a href="../../deconnexion.php" class="nav_link">
        <i class='bx bx-log-out nav_icon'></i>
        <span class="nav_name">SignOut</span>
    </a>
</nav>

    </div>

    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h2>Liste Des Catégories</h2>

       
        <div>
           

        <!--------------liste des categories----------->
<div>
    <?php
if (isset($_GET['ajout']) && $_GET['ajout'] =="ok"){

    print '<div class="alert alert-success">
    catégorie ajouter avec succees
</div>';
}

    ?>

<?php
if (isset($_GET['delete']) && $_GET['delete'] =="ok"){

    print '<div class="alert alert-success">
    catégorie supprimer avec succees
</div>';
}

    ?>


<?php
if (isset($_GET['edit']) && $_GET['edit'] =="ok"){

    print '<div class="alert alert-success">
    catégorie modifiée avec succées
</div>';
}

    ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $i =0;
foreach($categories as $c){

    $i++;

    print '<tr>
    <th scope="row">'.$i.'</th>
    <td>'.$c['nom'].'</td>
    <td>'.$c['description'].'</td>
    <td>
      <a data-bs-toggle="modal" data-bs-target="#editModal'.$c['id'].'" class="btn btn-success">Modifier</a>
      <a onclick="return PopUpletCategorie()" href="supprimer.php?idc='.$c['id'].'" class="btn btn-danger">Supprimer</a>
    </td>
  </tr> ';
}


?>
  
  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout Categorie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="ajout.php" method="POST">
          <div class="mb-3">
          
            <input type="text" class="form-control" name="nom" placeholder="Enter name category" required>
          </div>
          <div class="mb-3">
           
            <textarea class="form-control" name="description" rows="3" placeholder="Enter description category" ></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
    
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php 
foreach($categories as $index => $categorie){?>

<!-- Modal Modifier -->
<div class="modal fade" id="editModal<?php echo $categorie['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Categorie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="modifier.php" method="POST">

        <input type="hidden" value="<?php echo $categorie['id'] ;  ?>" name="idc" required>
          <div class="mb-3">
            <input type="text" class="form-control" name="nom" value="<?php echo $categorie['nom']; ?>" placeholder="Enter name category" required>
          </div>
          <div class="mb-3">
            <textarea class="form-control" name="description" rows="3" placeholder="Enter description category" required><?php echo $categorie['description']; ?></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
        </form>
    </div>
  </div>
</div>

<?php } ?>



















<script>
document.addEventListener("DOMContentLoaded", function(event) {
   
   const showNavbar = (toggleId, navId, bodyId, headerId) =>{
   const toggle = document.getElementById(toggleId),
   nav = document.getElementById(navId),
   bodypd = document.getElementById(bodyId),
   headerpd = document.getElementById(headerId)
   
   // Validate that all variables exist
   if(toggle && nav && bodypd && headerpd){
   toggle.addEventListener('click', ()=>{
   // show navbar
   nav.classList.toggle('show')
   // change icon
   toggle.classList.toggle('bx-x')
   // add padding to body
   bodypd.classList.toggle('body-pd')
   // add padding to header
   headerpd.classList.toggle('body-pd')
   })
   }
   }
   
   showNavbar('header-toggle','nav-bar','body-pd','header')
   
   /*===== LINK ACTIVE =====*/
   const linkColor = document.querySelectorAll('.nav_link')
   
   function colorLink(){
   if(linkColor){
   linkColor.forEach(l=> l.classList.remove('active'))
   this.classList.add('active')
   }
   }
   linkColor.forEach(l=> l.addEventListener('click', colorLink))
   
    // Your code to run since DOM is loaded and ready
   });

</script>


<script>
   function PopUpletCategorie(){
    return confirm("voulz-vous vraiment supprimer la categorie ?")
   }
</script>
  <!-- Bootstrap JS Bundle -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

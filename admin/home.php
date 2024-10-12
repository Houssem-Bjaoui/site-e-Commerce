<?php
session_start();
include "../inc/functions.php";
$data = getData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Proper Bootstrap CSS linking -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
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
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s;
        }

        a {
            text-decoration: none;
        }

        /* Header Styles */
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

        /* Navbar Styles */
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
        }

        .nav_logo, .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem;
        }

        .nav_logo-icon, .nav_icon {
            font-size: 1.25rem;
            color: var(--white-color);
        }

        .nav_link {
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s;
        }

        .nav_link:hover, .nav_link.active {
            color: var(--white-color);
        }

        .nav_link.active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color);
        }

        /* Body Styles */
        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem);
        }

        .show {
            left: 0;
        }

        /* Card Styles */
        .cardBox {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 30px;
            padding: 20px;
        }

        .card {
            background: var(--white-color);
            padding: 30px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            cursor: pointer;
        }

        .card:hover {
            background: var(--first-color);
        }

        .card:hover .cardInfo, .card:hover .iconBx {
            color: var(--white-color);
        }

        .numbers {
            font-size: 2.5rem;
            font-weight: 500;
            color: var(--first-color);
        }

        .cardName {
            margin-top: 5px;
            font-size: 1.1rem;
            color: var(--first-color-light);
        }

        .iconBx {
            font-size: 3.5rem;
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: calc(var(--nav-width) + 2rem);
            }

            .l-navbar {
                width: calc(var(--nav-width) + 156px);
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px);
            }
        }
    </style>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div>
            <?php echo $_SESSION['nom']; ?>
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
                    <a href="home.php" class="nav_link">
                        <i class='bx bxs-home nav_icon'></i>
                        <span class="nav_name">Home</span>
                    </a>
                    <a href="categories/list.php" class="nav_link">
                        <i class='bx bxs-category nav_icon'></i>
                        <span class="nav_name">Categories</span>
                    </a>
                    <a href="produits/listp.php" class="nav_link">
                        <i class='bx bxs-shopping-bag nav_icon'></i>
                        <span class="nav_name">Products</span>
                    </a>
                    <a href="users/list.php" class="nav_link">
                        <i class='bx bxs-user-detail nav_icon'></i>
                        <span class="nav_name">Customers</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bx bxs-file nav_icon'></i>
                        <span class="nav_name">Reports</span>
                    </a>
                    <a href="commandes/list.php" class="nav_link">
                        <i class='bx bxs-file nav_icon'></i>
                        <span class="nav_name">Orders</span>
                    </a>
                    <a href="profile.php" class="nav_link active">
                        <i class='bx bxs-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Profile</span>
                    </a>
                </div>
            </div>
            <a href="../deconnexion.php" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>

    <div class="height-100 bg-light">
        <h2>HOME</h2>

        <!-- Cards -->
        <div class="cardBox">
            
            <div class="card">
                <div class="cardInfo">
                    <div class="numbers"><?php echo $data['visiteurs']; ?></div>
                    <div class="cardName">clients</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="airplane-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div class="cardInfo">
                    <div class="numbers"><?php echo $data['produits']; ?></div>
                    <div class="cardName">produits</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="bed-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div class="cardInfo">
                    <div class="numbers"><?php  echo $data['categories']; ?></div>
                    <div class="cardName">categories</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.0/ionicons.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggle = document.getElementById('header-toggle'),
                  nav = document.getElementById('nav-bar'),
                  bodypd = document.getElementById('body-pd'),
                  headerpd = document.getElementById('header');

            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    nav.classList.toggle('show');
                    toggle.classList.toggle('bx-x');
                    bodypd.classList.toggle('body-pd');
                    headerpd.classList.toggle('body-pd');
                });
            }

            const linkColor = document.querySelectorAll('.nav_link');

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            }

            linkColor.forEach(l => l.addEventListener('click', colorLink));
        });
    </script>
</body>
</html>

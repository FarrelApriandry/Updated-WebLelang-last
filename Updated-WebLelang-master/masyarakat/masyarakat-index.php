<?php

    session_start();
    include '../config/db.php';

    if(!isset($_SESSION['email'])) {
        header("Location: ./masyarkat-login.php");
        exit();
    }

    $username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - Start your own auction!</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body class="body-index">
    <header id="myHeader">
        <a href="./" class="logo-link">
            <div class="logo">Closion</div>
        </a>
            <nav>
                <ul>
                    <li><a href="./">Home</a></li>
                    <li><a href="#htu-container">How to Use?</a></li>
                    <li><a href="#new-auction-container">Current Auctions</a></li>
                    <li><a href="ended-auctions.php">Ended Auctions</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a class="logout-btn" href="../guest/index.php">
                    <button class="btn-login">LogOut</button>
                </a>
                <!-- <a class="register" href="../masyarakat/masyarakat-register.php">
                    <button class="btn-register">Register</button>
                </a> -->
            </div>
        </header>
        <div class="image-container">
            <img id="background" src="../img/background.svg" alt="Floating image">
            <div class="text-overlay">
                <div class="centered-text">
                    <h1> Your Awesome Clothes Auction! </h1>
                    <p> choose your own style </p>
                    <br><br><br>
                    <br><br><br>
                    <div class="search-input">
                        <input type="text" placeholder="What's your looking for?" autofocus>
                        <button type="submit" class="search-button"> Go!</button>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div id="htu-container">
            <h1>
                How Closion Works
            </h1>
        </div>
        <br><br>
        <br><br>
        <div class="htu-content">
            <div class="htu-main">
                    <span>
                        01
                    </span>
                    <br>
                    <h3>
                        Create your Account
                    </h3>
                <div class="underline">
                </div>
                <h4>
                    create your account and complete your profile
                </h4>
            </div>
            <div class="htu-main">
                    <span>
                        02
                    </span>
                    <br>
                    <h3>
                        Connect
                    </h3>
                <div class="underline">
                </div>
                <h4>
                    Connect your account
                </h4>
            </div>
            <div class="htu-main">
                    <span>
                        03
                    </span>
                    <br>
                    <h3>
                        Participate in the Auction
                    </h3>
                <div class="underline">
                </div>
                <h4>
                    Take part in the auction!
                </h4>
                </div>
                <div class="htu-main">
                    <span>
                        04
                    </span>
                    <br>
                    <h3>
                        Win the Auction
                    </h3>
                <div class="underline">
                </div>
                <h4>
                    then win an auction with your own bid!
                </h4>
            </div>
        </div>
        <br><br><br>
        <br><br><br>
        <div id="new-auction-container">
            <h1>
                Newest Auction
            </h1>
        </div>
        <br><br>
        <br><br>
        <div class="popular-auction-container">
            <br><br>
            <span class="span-product">
                <img class="photo-product" src="../img/product-1.jpeg" alt="">
                <p>Hoodie Fanjack Limited Edition</p>
                <button>Place your own Bid</button>
            </span>
            <br><br>
            <span class="span-product">
                <span>
                <img class="photo-product" src="../img/product-1.jpeg" alt="">
                <p>Hoodie Fanjack Limited Edition</p>
                <button>Place your own Bid</button>
                </span>
            </span>
            <br><br>
            <span class="span-product">
                <img class="photo-product" src="../img/product-1.jpeg" alt="">
                <p>Hoodie Fanjack Limited Edition</p>
                <button>Place your own Bid</button>
            </span>
            <br><br>
            <span class="span-product">
                <img class="photo-product" src="../img/product-1.jpeg" alt="">
                <p>Hoodie Fanjack Limited Edition</p>
                <button>Place your own Bid</button>
            </span>
            <br><br>
            <span class="span-product">
                <img class="photo-product" src="../img/product-1.jpeg" alt="">
                <p>Hoodie Fanjack Limited Edition</p>
                <button>Place your own Bid</button>
            </span>
            <br><br>
        </div>
    </body>
</html>
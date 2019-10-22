<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? 'Disciple, Le blog du serviteur de Dieu' ?></title>
    <!--Bootstrap Css -->
    <link rel="stylesheet" href="/welcome_assets/css/bootstrap.min.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="/welcome_assets/css/main.css">
    <!-- FonteAwesome-->
    <script src="/welcome_assets/js/all.js"></script>
    <!--- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Mr+Dafoe" rel="stylesheet">
    <!-- Magnific popup-->
    <link rel="stylesheet" href="/welcome_assets/magnific-popup/magnific-popup.css">
</head>
<body>
    <div id="top-icons"></div>
   <?php if($view === 'index'): ?>
    <!---- Social icons-->
    <div class="container-fluid info p-3">
        <div class="row">
            <div class="col d-flex justify-content-between align-items-baseline flex-wrap">
                <div class="info-icons p-2">
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-yelp fa-2x"></i></a>
                </div>
                <h2 class="primary-color p-2 text-capitalize">... Si quelqu'un me sert, le pére l'honorera</h2>
            </div>
        </div>
    </div>
    <!---- End social icons -->

    <!---Header section-->
   <header id="header">
        <div class="container">
            <div class="row height-90 align-items-center justify-content-center">
                <div class="col">
                    <div class="banner text-center">
                        
                        <a href="<?= $router->url('home') ?>" class="btn main-btn sushi-btn my-4 text-capitalize">Notre Blog</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#special-items" class="btn header-link primary-color"><i class="fas fa-arrow-down"></i></a>
    </header>
   <?php endif ?>
    <!--- End header section-->
    
    <!--Nav-bar-->

    <nav class="navbar navbar-expand-lg">
        <a href="<?= $router->url('welcome') ?>" class="navbar-brand text-uppercase primary-color">DISCIPLE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
            <div class="toggler-btn">
                <div class="bar bar1"></div>
                <div class="bar bar2"></div>
                <div class="bar bar3"></div>
            </div>
        </button>
        <!--links  -->
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav mx-auto">
                <?php if($view === 'index'): ?>
                <li class="nav-item">
                    <a href="#special-items" class="nav-link text-capitalize">Articles</a>
                </li>
                <li class="nav-item">
                    <a href="#menu" class="nav-link text-capitalize">Quantiques</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link text-capitalize">A propos</a>
                </li>
                <li class="nav-item">
                    <a href="#reviews" class="nav-link text-capitalize">Commentaires</a>
                </li>
                <li class="nav-item">
                    <a href="#team" class="nav-link text-capitalize"> equipe</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link text-capitalize">contact</a>
                </li>
                <?php endif ?>
                <li class="nav-item">
                    <a class="btn nav-btn text-capitalize" href="<?= $router->url('home') ?>" type="button">Notre blog</a>
                    <a class="btn nav-btn text-capitalize" href="<?= $router->url('songs') ?>" type="button">Nos Cantiques</a>
                </li>
            </ul>
        </div>
    </nav>


            
           <div class="main">
           <?= $content ?>
           </div>
    <footer>

    <!---- Social icons-->
    <a href="#top-icons" id="back-to-top" class="p-1"><i class="fas fa-arrow-up primary-color fa-3x"></i></a>
    <div class="container-fluid info p-3">
        <div class="row">
            <div class="col d-flex justify-content-between align-items-baseline flex-wrap">
                <div class="info-icons p-2">
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-yelp fa-2x"></i></a>
                </div>
                <h2 class="primary-color p-2 text-uppercase"> &copy;copyright 2019</h2>
        <p class="copyright">Made With <i class="fas fa-heart"></i>  by Atangana Etoga</p>
            </div>
        </div>
    </div>
    <!---- End social icons -->
    </footer>
    <!-- Jquery-->
    <script src="/welcome_assets/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap Js-->
    <script src="/welcome_assets/js/bootstrap.bundle.min.js"></script>
    <!-- Ripple-->
    <script src="/welcome_assets/js/jquery.ripples-min.js"></script>
    <!-- Magnific popup-->
    <script src="/welcome_assets/magnific-popup/jquery.magnific-popup.js"></script>
    <!-- JS-->
    <script src="/welcome_assets/js/script.js"></script>
</body>
</html>
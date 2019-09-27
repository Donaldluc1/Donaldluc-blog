<?php
use App\Connection;
use App\Table\CommentsTable;
use App\Table\PostTable;
use App\Table\SongTable;

$pdo = Connection::getPDO(); 

$table = new PostTable($pdo);
$posts = $table->sixRows();

$table = new SongTable($pdo);
$songs = $table->sixSongs();

$commentsTable = new CommentsTable($pdo);
$comments = $commentsTable->sixRows(); 
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sushi project Recording</title>
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
    <!---- Social icons-->
    <div class="container-fluid info p-3" id="top-icons">
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
    <!--- End header section-->
    
    <!--Nav-bar-->

    <nav class="navbar navbar-expand-lg">
        <a href="#" class="navbar-brand text-uppercase primary-color">DISCIPLE</a>
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
            </ul>
            <form class="form-inline d-none d-lg-block mr-5">
                <a class="btn nav-btn text-capitalize" href="<?= $router->url('home') ?>" type="button">Notre blog</a>
            </form>
            <form class="form-inline d-none d-lg-block mr-5">
                <a class="btn nav-btn text-capitalize" href="<?= $router->url('songs') ?>" type="button">Nos Cantiques</a>
            </form>
        </div>
    </nav>


    <!-- End nav-bar-->

    <!-- Menu items-->

    <section class="py-5" id="special-items">
        <div class="container my-5">
            <div class="row parent-container">
            <?php foreach($posts as $post): ?>
                <div class="col-10 mx-auto col-sm-6 col-lg-4 my-3">
                    <div class="item-container">
                        <?php if($post->getImages()): ?>
                            <img src="/<?= $post->getImages() ?>" class="img-fluid img-thumbnail item-img">
                            <a href="/<?= $post->getImages() ?>">
                            <h1 class="text-uppercase text-center item-link px-3"><?= $post->getName() ?></h1>
                        </a>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach?>
            </div>
        </div>
    </section>

    <!-- End of Menu items-->

    <!-----menu section--->
    <section id="menu" class="py-5 my-5">
        <div class="container">

                    <!-- title-->
                    <div class="row">
                    <?php foreach($songs as $song): ?>
                     <div class="col-md-6">
                     <!-- single item-->
                    <div class="single-item d-flex justify-content-between my-3 p-3 special">
                            <div class="single-item-text">
                                <h2 class="text-muted text-dark"><?= htmlentities($song->getName())?></h2>
                                <p class="text-uppercase"><?= $song->getExcerpt() ?></p>
                            </div>
                            <a href="<?= $router->url('song', ['id' => $song->getID(), 'slug' => $song->getSlug()]) ?>"><h3 class="special-text text-capitalize">Voir le cantique</h3></a>
                    </div>
                    <!--end single item-->
                    </div>
                    <?php endforeach ?>
                    </div>
               

        </div>
    </section>

    <!-----end menu section--->

    <!--- about-->

    <section id="about" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-4">
                    <h1 class="text-uppercase display-3">about us</h1>
                    <h2 class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem ducimus vitae, omnis alias ad assumenda!</h2>
                    <a href="<?= $router->url('about') ?>" class="btn main-btn my-4 text-capitalize">learn more</a>
                </div>
                <div class="col-md-6 about-pictures my-4 d-none d-lg-block">
                    <img src="/welcome_assets/img/bira.jpg" alt="menu" class="img-1 img-thumbnail about-image">
                    <img src="/welcome_assets/img/fju kn.jpg" alt="menu" class="img-2 img-thumbnail about-image">
                    <img src="/welcome_assets/img/ypg cameroon.jpg" alt="menu" class="img-3 img-thumbnail about-image">
                    <img src="/welcome_assets/img/t56026714442014908.jpg" alt="menu" class="img-4 img-thumbnail about-image">
                    <img src="/welcome_assets/img/t56026714442014908.jpg" alt="menu" class="img-5 img-thumbnail about-image">
                </div>
            </div>
        </div>
    </section>

    <!---end of about-->

    <!-- reviews-->
    <section id="reviews" class="py-5">
        <div id="slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach($comments as $comment): ?>
                <!-- carousel items-->
                <div class="carousel-item <?php if($comment === $comments[0]): ?>active<?php endif ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 mx-auto d-flex justify-content-between review-item py-3">
                                <!-- text-->
                                <div class="review-text px-5">
                                    <h2 class="text-muted mb-3 "><?= htmlentities($comment->getPseudo())?></h2>
                                    <p class="lead text-capitalize"><?= $comment->getFormattedContent() ?></p>
                                </div>
                                <!--image-->
                                <div class="align-self-center ml-3">
                                    <img src="/welcome_assets/img/t56026714442014908.jpg" alt="customer" class="rounded-circle review-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of carousel item-->
                <?php endforeach ?>
            </div>
            <!-- carousel controls-->
            <a href="#slider" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#slider" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>
    <!--end reviews-->

    <!--- team-->

    <section id="team" class="py-5">
        <div class="container">
            <div class="row">
                <!----team member-->
                <div class="col-9 col-sm-6 col-lg-4 mx-auto my-4">
                    <div class="card">
                        <img src="/welcome_assets/img/t56026714442014908.jpg" alt="team member" class="card-img-top">
                        <div class="card-body">
                            <div class="card-title">
                                <h1 class="text-capitalize">Cisse Mariama</h1>
                            </div>
                            <h4 class="primary-color text-capitalize">évangeliste - Rédactrice Web</h4>
                        </div>
                        <div class="card-footer team-icons d-flex justify-content-between">
                            <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                            <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
                            <a href="#"><i class="fab fa-yelp fa-2x"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end of team member-->
                <!----team member-->
                <div class="col-9 col-sm-6 col-lg-4 mx-auto my-4">
                    <div class="card">
                        <img src="/welcome_assets/img/t56026714442014908.jpg" alt="team member" class="card-img-top">
                        <div class="card-body">
                            <div class="card-title">
                                <h1 class="text-capitalize">atangana lucien</h1>
                            </div>
                            <h4 class="primary-color text-capitalize">Evangéliste - Developpeur Web</h4>
                        </div>
                        <div class="card-footer team-icons d-flex justify-content-between">
                            <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                            <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
                            <a href="#"><i class="fab fa-yelp fa-2x"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end of team member-->
                <!----team member-->
                <div class="col-9 col-sm-6 col-lg-4 mx-auto my-4">
                    <div class="card">
                        <img src="/welcome_assets/img/t56026714442014908.jpg" alt="team member" class="card-img-top">
                        <div class="card-body">
                            <div class="card-title">
                                <h1 class="text-capitalize">Lamy franck</h1>
                            </div>
                            <h4 class="primary-color text-capitalize">Ouvrier - Infographe</h4>
                        </div>
                        <div class="card-footer team-icons d-flex justify-content-between">
                            <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                            <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
                            <a href="#"><i class="fab fa-yelp fa-2x"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end of team member-->
            </div>
        </div>
    </section>
    <!---end of team team-->

    <!-- contact section-->

    <section id="contact">
        <div class="container-fluid no-padding">
            <div class="row">
                <div class="col-md-6 my-3">
                    <div class="embed-responsive embed-responsive-21by9 height-60">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1989.816223293607!2d9.646778474668514!3d4.09498818429802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x106111584421d913%3A0x391a46bed6dea0d5!2sMarch%C3%A9+Du+Rail!5e0!3m2!1sfr!2scm!4v1559834375314!5m2!1sfr!2scm" 
                            width="100%" frameborder="0" style="border:0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="col-md-6 my-3 align-self-center">
                    <div class="card text-center">
                        <div class="card-header">
                            <h1 class="text-uppercase">contact list</h1>
                        </div>
                        <div class="card-body">
                            <form>
                                <!-- input group-->
                                <div class="input-group my-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="text" placeholder="enter your name here" class="form-control form-control-lg">
                                </div>
                                <div class="input-group my-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input-phone">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="phone" placeholder="enter your phone here" class="form-control form-control-lg">
                                </div>
                                <div class="input-group my-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input-email">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="email" id="email" placeholder="enter your email here" class="form-control form-control-lg">
                                </div>
                                <button type="submit" class="btn btn-block btn-lg text-uppercase contact-btn">
                                    <i class="far fa-hand-point-right mr-2"></i> click here
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--end of contact section-->

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
                <h2 class="primary-color p-2 text-uppercase">&copy;copyright 2019</h2>
            </div>
        </div>
    </div>
    <!---- End social icons -->
    <a href="#top-icons" id="back-to-top" class="p-1"><i class="fas fa-arrow-up primary-color fa-3x"></i></a>


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
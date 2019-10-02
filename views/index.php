<?php
use App\Connection;
use App\Table\CommentsTable;
use App\Table\PostTable;
use App\Table\SongTable;

$title = 'Disciple, Le guide du serviteur de Dieu';

$pdo = Connection::getPDO(); 

$table = new PostTable($pdo);
$posts = $table->sixRows();

$table = new SongTable($pdo);
$songs = $table->sixSongs();

$commentsTable = new CommentsTable($pdo);
$comments = $commentsTable->sixRows(); 
?>

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
                    <img src="/welcome_assets/img/tfteen.jpeg" alt="menu" class="img-1 img-thumbnail about-image">
                    <img src="/welcome_assets/img/caleb.jpg" alt="menu" class="img-2 img-thumbnail about-image">
                    <img src="/welcome_assets/img/ypg cameroon.jpg" alt="menu" class="img-3 img-thumbnail about-image">
                    <img src="/welcome_assets/img/evangelisation.jpg" alt="menu" class="img-4 img-thumbnail about-image">
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
                        <a href="https://blogs.universal.org/bispomacedo/fr/" target="_blank"><img src="/welcome_assets/img/macedo.jpg" alt="team member" class="card-img-top"></a>
                        <div class="card-body">
                            <div class="card-title">
                                <h1 class="text-capitalize">Edir Macedo</h1>
                            </div>
                            <h4 class="primary-color text-capitalize">fondateur de l'église universelle</h4>
                        </div>
                        <div class="card-footer team-icons d-flex justify-content-between">
                            <a href="https://web.facebook.com/BispoMacedo/" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                            <a href="https://www.instagram.com/bispomacedo/?hl=fr" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                            <a href="https://twitter.com/bispomacedo?lang=fr" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
                            <a href="#"><i class="fab fa-yelp fa-2x"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end of team member-->
                <!----team member-->
                <div class="col-9 col-sm-6 col-lg-4 mx-auto my-4">
                    <div class="card">
                        <a href="https://blogs.universal.org/renatocardoso/fr/" target="_blank"><img src="/welcome_assets/img/renato.jpg" alt="team member" class="card-img-top"></a>
                        <div class="card-body">
                            <div class="card-title">
                                <h1 class="text-capitalize">renato & cristiane</h1>
                            </div>
                            <h4 class="primary-color text-capitalize">the love school</h4>
                        </div>
                        <div class="card-footer team-icons d-flex justify-content-between">
                            <a href="https://web.facebook.com/renatocardoso.fr/" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                            <a href="https://www.instagram.com/renatocardosooficial/?hl=fr" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                            <a href="https://twitter.com/bprenato" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
                            <a href="#"><i class="fab fa-yelp fa-2x"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end of team member-->
                <!----team member-->
                <div class="col-9 col-sm-6 col-lg-4 mx-auto my-4">
                    <div class="card">
                        <a href="https://www.universal.org/templo-de-salomao/" target="_blank"><img src="/welcome_assets/img/salomon.jpg" alt="team member" class="card-img-top"></a>
                        <div class="card-body">
                            <div class="card-title">
                                <h1 class="text-capitalize">temple de salomon</h1>
                            </div>
                            <h4 class="primary-color text-capitalize">siège mondiale de l'universelle</h4>
                        </div>
                        <div class="card-footer team-icons d-flex justify-content-between">
                            <a href="https://web.facebook.com/TemploDeSalomao/" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                            <a href="https://www.instagram.com/templodesalomao/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                            <a href="https://twitter.com/templodesalomao?lang=fr" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1989.9867557156836!2d9.705061070472462!3d4.025817257304421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x106112b94356ab3f%3A0xfdfcde68b5dc9153!2s%C3%89glise%20Universelle%2C%20Douala!5e0!3m2!1sfr!2scm!4v1569926944296!5m2!1sfr!2scm" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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

 
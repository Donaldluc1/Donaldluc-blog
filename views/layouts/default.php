<?php if($view !== 'index'): ?>
<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($title) ? e($title) : 'Mon Site' ?></title>
    <link rel="stylesheet" href="/welcome_assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body style="background:#c9c1ac;" >
    <div class="header"></div>
    <div class="d-flex flex-column h-100">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary top-bar">
                <a href="<?= $router->url('welcome') ?>" class="navbar-brand">Disciple</a>
                <a href="<?= $router->url('home') ?>" class="navbar-brand menu-item">Notre Blog</a>
                <a href="<?= $router->url('songs') ?>" class="navbar-brand">Nos Cantiques</a>
            </nav>
        <?php endif ?>
            
           <div class="main">
           <?= $content ?>
           </div>


        <footer class="bg-light py-4 footer mt-auto">
            <div class="container">
                <?php if(defined('DEBUG_TIME')): ?>
                    Page générée en <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?> ms
                <?php endif?>
            </div>
        </footer>
    </div>
</body>
</html>
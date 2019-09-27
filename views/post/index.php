<?php
use App\Connection;
use App\Table\PostTable;

$title = 'Mon Blog';
$pdo = Connection::getPDO(); 

$table = new PostTable($pdo);
[$posts, $pagination] = $table->findPaginated();

$link = $router->url('home');
?>


    <div class="container">
        <br>
        <br>
        <div class="row">
            <?php foreach($posts as $post): ?>
                    <div class="card-deck col-md-3">
                        <?php require 'card.php'; ?>
                    </div>
            <?php endforeach?>
        </div>
    </div>

<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
</div>
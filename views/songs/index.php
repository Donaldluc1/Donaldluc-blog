<?php
use App\Connection;
use App\Table\SongTable;

$title = 'Mes Cantiques';
$pdo = Connection::getPDO(); 

$table = new SongTable($pdo);
[$songs, $pagination] = $table->findPaginated();

$link = $router->url('songs');
?>


    <div class="container">
        <br>
        <br>
        <div class="row">
            <?php foreach($songs as $song): ?>
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
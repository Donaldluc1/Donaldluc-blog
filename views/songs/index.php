<?php
use App\Connection;
use App\Table\SongTable;

$title = 'Nos Cantiques';
$pdo = Connection::getPDO(); 
$link = $router->url('songs');


if(!empty($_GET['q'])){
    $req = '%' . $_GET['q'] . '%';
    $reqe = htmlentities($_GET['q']);
    $table = new SongTable($pdo);
    [$songsres, $paginationRes] = $table->research($req);
}
$table = new SongTable($pdo);
[$songs, $pagination] = $table->findPaginated();

?>
    <div class="container show">
        <br>
        <br>
        <form action="" class="mb-4">
            <div class="form-group">
                <input type="text" class="form-control" name="q" placeholder="Rechercher un cantique" value="<?= $reqe ?? null ?>">
            </div>
            <button class="btn btn-primary">Rechercher</button>
        </form>
        <br>
        <br>
        <div class="row">
            <?php foreach($songsres ?? $songs as $song): ?>
                <div class="card-deck col-md-3">
                <?php require 'card.php'; ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="d-flex justify-content-between my-4">
        <?php if(isset($paginationRes) && !empty($paginationRes)): ?>
        <?= $paginationRes->previousSearchLink($link, $reqe); ?>
        <?= $paginationRes->nextSearchLink($link, $reqe); ?>
        <?php else: ?>
        <?= $pagination->previousLink($link); ?>
        <?= $pagination->nextLink($link); ?> 
        <?php endif ?>
    </div>
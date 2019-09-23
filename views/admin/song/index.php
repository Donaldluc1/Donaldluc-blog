<?php

use App\Auth;
use App\Connection;
use App\Table\SongTable;

Auth::check();

$title = "Administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_songs');
[$songs, $pagination] = (new SongTable($pdo))->findPaginated();
?>

<?php if(isset($_GET['delete'])): ?>
    <div class="alert alert-success">
        L'enregistrement a bien été supprimé!!!!
    </div>
<?php endif ?>
<?php if(isset($_GET['created'])): ?>
    <div class="alert alert-success">
        Le Cantique a bien été créé!!!!
    </div>
<?php endif ?>

<table class="table">
    <thead>
        <th>#</th>
        <th>Titre</th>
        <th>
            <a href="<?= $router->url('admin_song_new') ?>" class="btn btn-primary">Nouveau</a>
        </th>
    </thead>
    <tbody>
        <?php foreach($songs as $song):?>
        <tr>
            <td>#<?= $song->getID() ?></td>
            <td>
                <a href="<?= $router->url('admin_song', ['id' => $song->getID()]) ?>">
                    <?= e($song->getName()) ?>
                </a>
            </td>
            <td>
                <a href="<?= $router->url('admin_song', ['id' => $song->getID()]) ?>" class="btn btn-primary">
                    Editer
                </a>
                <form action="<?= $router->url('admin_song_delete', ['id' => $song->getID()]) ?>" method="POST"
                    onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')" style="display:inline">
                    <button type="submit"class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
</div>
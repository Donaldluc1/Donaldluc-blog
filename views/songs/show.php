<?php
use App\Connection;
use App\Table\SongTable;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$song = (new SongTable($pdo))->find($id);

if($song->getSlug() !== $slug){
    $url = $router->url('song', ['slug' => $song->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

?>
<br>
<br>
    <div class="container card mb-3">
        <br>
        <br>
        <h1 class="card-title text-center"><?= e($song->getName())?></h1>
        <p class="card-body"><?= $song->getFormattedContent() ?></p>
    </div>

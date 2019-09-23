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

<h1><?= e($song->getName())?></h1>
<p><?= $song->getFormattedContent() ?></p>
